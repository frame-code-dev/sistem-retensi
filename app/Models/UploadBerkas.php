<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadBerkas extends Model
{
    protected $table            = 'upload_berkas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_rekam_medis','status_upload', 'keterangan','created_at','updated_at','deleted_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getAllRekamMedisBerkas() {
        return $this->select('upload_berkas.*, rekam_medis.id as id_rekam, rekam_medis.no_rm,rekam_medis.nik_pasien,
                        rekam_medis.tanggal_pemusnahan,
                        rekam_medis.alamat_lengkap,rekam_medis.status, rekam_medis.nama_pasien,
                        rekam_medis.tanggal_retensi,rekam_medis.diagnosa, rekam_medis.tanggal_kunjungan_terakhir')
                        ->groupBy('upload_berkas.id_rekam_medis')
                        ->join('rekam_medis', 'rekam_medis.id = upload_berkas.id_rekam_medis');
    }
    public function getAllRekamMedisBerkasWithDetail() {
        return $this->select('upload_berkas.*, rekam_medis.id as id_rekam, rekam_medis.no_rm,rekam_medis.nik_pasien,
                        rekam_medis.tanggal_pemusnahan,
                        rekam_medis.alamat_lengkap,rekam_medis.status, rekam_medis.nama_pasien,
                        rekam_medis.tanggal_retensi,rekam_medis.diagnosa, rekam_medis.tanggal_kunjungan_terakhir')
                        ->groupBy('upload_berkas.id_rekam_medis')
                        ->join('rekam_medis', 'rekam_medis.id = upload_berkas.id_rekam_medis');
    }

    public function getFindRekamMedisBerkas($id) {
        return $this->select('upload_berkas.*, rekam_medis.id as id_rekam, 
                        rekam_medis.no_rm, rekam_medis.nama_pasien, rekam_medis.tanggal_kunjungan_terakhir, 
                        rekam_medis.nik_pasien,
                        rekam_medis.tanggal_lahir,
                        rekam_medis.jenis_kelamin,
                        rekam_medis.alamat_lengkap,
                        rekam_medis.diagnosa,')
                    ->join('rekam_medis', 'rekam_medis.id = upload_berkas.id_rekam_medis')
                    ->where('upload_berkas.id',$id)
                    ->first();
    }
}
