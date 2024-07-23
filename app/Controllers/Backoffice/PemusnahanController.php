<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\DetailUploadBerkas;
use App\Models\LogActivityModel;
use App\Models\UploadBerkas;
use CodeIgniter\HTTP\ResponseInterface;
use ConvertApi\ConvertApi;
use Jurosh\PDFMerge\PDFMerger;
use setasign\Fpdi\Fpdi;

class PemusnahanController extends BaseController
{
    protected $uploadBerkas;
    protected $detailUploadBerkas;
    protected $helpers = ['form','url'];
    public function __construct(){
        $this->uploadBerkas = new UploadBerkas();
        $this->detailUploadBerkas = new DetailUploadBerkas();
    }
    public function index()
    {
        $param['title'] = 'Data Retensi Pemusnahan';
        $param['data'] = $this->uploadBerkas->getAllRekamMedisBerkas()->findAll();
        return view('backoffice/pemusnahan/index',$param);
    }

    public function show($id) {
        $param['title'] = 'Detail Berkas Nilai Guna';
        $param['data'] = $this->uploadBerkas->getFindRekamMedisBerkas($id);
        $param['detail_file'] = $this->detailUploadBerkas->getDetailUploadBerkas($id);
        $param['id_pdf'] = $id;
        return view('backoffice/pemusnahan/show',$param);
        
    }

    public function uploadEdit($id) {
        $param['title'] = 'Edit Upload Berkas Nilai Guna';
        $param['data'] = $this->uploadBerkas->getFindRekamMedisBerkas($id);
        $param['detail_file'] = $this->detailUploadBerkas->getDetailUploadBerkas($id);
        $param['id_berkas'] = $id;
        return view('backoffice/pemusnahan/edit',$param);
    }

    public function upload($id) {
        $param['title'] = 'Upload Berkas Nilai Guna';
        $param['data'] = $this->uploadBerkas->getFindRekamMedisBerkas($id);
        return view('backoffice/pemusnahan/upload',$param);
        
    }
    public function uploadEditStore($id) {
        try {
            $files = $this->request->getFiles();
            foreach ($files as $key => $value) {
                if ($value->isValid() && !$value->hasMoved()) {
                    $current_data = $this->detailUploadBerkas->findData($id, $key);
                    // Generate a unique name for each file
                    $value->move(ROOTPATH . 'public/berkas/pemusnahan/'.$id, $value->getName());
                    $data = [
                        'id_upload_berkas' => $id,
                        'nama_formulir' => $key,
                        'nama_file' => $value->getName(),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->detailUploadBerkas->update($current_data['id'],$data);
                }
            }
            $result_detail = $this->detailUploadBerkas->checkDataNull(1);
            if ($result_detail == 0) {
                $this->uploadBerkas->update($id,[
                    'status_upload' => 'lengkap',
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);
            }
            $this->uploadBerkas->update($id,[
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            $data = [
                'user_id' => user()->id,
                'action' => 'Mengganti upload nilai guna',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
            session()->setFlashdata("status_success", true);
            session()->setFlashdata('message', 'Data berkas berhasil diganti.');
            return redirect()->to('dashboard/pemusnahan');
        } catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data berkas gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data berkas gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
        
    }
    public function uploadStore($id) {
        try {
            $files = $this->request->getFiles();
            foreach ($files as $key => $value) {
                if ($value->isValid() && !$value->hasMoved()) {
                    // Generate a unique name for each file
                    $value->move(ROOTPATH . 'public/berkas/pemusnahan/'.$id, $value->getName());
                    $data = [
                        'id_upload_berkas' => $id,
                        'nama_formulir' => $key,
                        'nama_file' => $value->getName(),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                }else{
                    $data = [
                        'id_upload_berkas' => $id,
                        'nama_formulir' => $key,
                        'nama_file' => null,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                }
    
                $this->detailUploadBerkas->insert($data);
            }
            $result_detail = $this->detailUploadBerkas->checkDataNull($id);
            if ($result_detail == 0) {
                $this->uploadBerkas->update($id,[
                    'status_upload' => 'lengkap',
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);
            }else{
                $this->uploadBerkas->update($id,[
                    'status_upload' => 'belum-lengkap',
                    'deleted_at' => date('Y-m-d H:i:s'),
                ]);
            }
            $this->uploadBerkas->update($id,[
                'keterangan' => 'PEMUSNAHAN',
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
            $data = [
                'user_id' => user()->id,
                'action' => 'Menambahkan upload nilai guna',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
            session()->setFlashdata("status_success", true);
            session()->setFlashdata('message', 'Data berkas berhasil ditambahkan.');
            return redirect()->to('dashboard/pemusnahan');
        } catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data berkas gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data berkas gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
        
    }

    public function pdf($id_berkas) {
        $data = $this->uploadBerkas->getFindRekamMedisBerkas($id_berkas);
        $detail_files = $this->detailUploadBerkas->getDetailUploadBerkas($id_berkas);
        $filesToMerge = [];
        foreach ($detail_files as $key => $value) {
            if ($value['nama_file'] != null) {
                $filesToMerge[] = ROOTPATH.'/public/berkas/pemusnahan/'.$id_berkas.'/'.$value['nama_file'];
            }
        }

        try {
            ConvertApi::setApiSecret('lnXTYdaNElBhxTrE');
            $result = ConvertApi::convert('merge', [
                    'Files' => $filesToMerge,
                ], 'pdf'
            );
            // Direktori tujuan untuk menyimpan hasil
            $resultDir = ROOTPATH . 'public/uploads/';

            // Simpan hasilnya ke direktori tujuan
            $result->saveFiles($resultDir);

            // Simpan hasilnya ke direktori tujuan
            // Lakukan apa pun yang perlu dilakukan setelah penyimpanan berhasil
            // Misalnya, mengirimkan response JSON dengan URL hasil

            $filename = $result->getFile()->getFilename();
            $filePath = $resultDir . $filename;
    
            // Set header untuk download
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/pdf');
            header('Content-Length: ' . filesize($filePath));
    
            // Outputkan file untuk diunduh
            readfile($filePath);
            exit;
        } catch (\Throwable $e) {
            // Log or handle the exception
            echo 'Error: ' . $e->getMessage();
        }
    }
}
