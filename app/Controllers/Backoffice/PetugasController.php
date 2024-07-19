<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class PetugasController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $userModel;
    protected $groupModel;
   
    public function __construct()
	{
        $this->validation = \Config\Services::validation();
        $this->userModel = new UserModel();
        $this->groupModel = new GroupModel();
		
	}
    public function index()
    {
        $param['title'] = 'List Petugas';
        $param['data'] = $this->userModel->getAllUsers();
        return view('backoffice/petugas/index',$param);
    }

    public function create() {
        $param['title'] = 'Create Petugas';
        return view('backoffice/petugas/create',$param);
    }

    public function store() {
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];
     
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        

		try {
            $nama = $this->request->getPost("nama");
            $username = $this->request->getPost("username");
            $email = $this->request->getPost("email");
            $role = $this->request->getPost("role");
            $password = (string) $this->request->getPost('password');

            $data = [
				"nama" => $nama,
				"email" => $email,
				"username" => $username,
				"password" => $password,
				"active" => 1,
			];
            $user = new User($data);
            $this->userModel->save($user);
            $userId = $this->userModel->getInsertID();
            if ($role == 'administrator') {
                $this->groupModel->addUserToGroup($userId, 1);
            }else{
                $this->groupModel->addUserToGroup($userId, 2);
            }
            $data = [
                'user_id' => user()->id,
                'action' => 'Menambahkan data petugas dengan username : '.$username,
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil ditambahkan.');
			return redirect()->to('dashboard/petugas');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
    }

    public function show($id) {
        $param['title'] = 'Detail Petugas';
        $param['data'] = $this->userModel->getFindUsers($id);
        return view('backoffice/petugas/show',$param);
    }
    public function edit($id) {
        $param['title'] = 'Edit Petugas';
        $param['data'] = $this->userModel->getFindUsers($id);
        return view('backoffice/petugas/edit',$param);
    }
    public function update($id) {
        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'role' => 'required',
            'email'    => 'required|valid_email',
        ];
     
        if (! $this->validate($rules))
        {
            return redirect()->to('dashboard/petugas/edit/'.$id)->withInput()->with('errors', $this->validator->getErrors());
        }
        

		try {
            $param['data'] = $this->userModel->getFindUsers($id);
            $nama = $this->request->getPost("nama");
            $username = $this->request->getPost("username");
            $email = $this->request->getPost("email");
            $role = $this->request->getPost("role");
            $password = (string) $this->request->getPost('password');
            if ($password != '' || $password != null) {
                $data = [
                    "nama" => $nama,
                    "email" => $email,
                    "username" => $username,
                    "password" => $password,
                    "active" => 1,
                ];
            }else{
                $data = [
                    "nama" => $nama,
                    "email" => $email,
                    "username" => $username,
                    "active" => 1,
                ];
            }
           
            $this->userModel->updateUser($id,$data);
            $userId = $id;
            if ($role != $param['data']->role) {
                if ($role == 'administrator') {
                    $this->groupModel->removeUserFromGroup($userId,$param['data']->group_id);
                    $this->groupModel->addUserToGroup($userId, 1);
                }else{
                    $this->groupModel->removeUserFromGroup($userId,$param['data']->group_id);
                    $this->groupModel->addUserToGroup($userId, 2);
                }
            }
            $data = [
                'user_id' => user()->id,
                'action' => 'Mengganti data petugas',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil diganti.');
			return redirect()->to('dashboard/petugas');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diganti, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diganti, <br>' . $e->getMessage());
			return redirect()->back();
		}
    }

    public function destroy($id) {
        $this->userModel->deleteUser($id);
        $data = [
            'user_id' => user()->id,
            'action' => 'Menghapus data petugas',
            'ip_address' => $this->request->getUserAgent(),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $log = new LogActivityModel();
        $log->insertLog($data);
        session()->setFlashdata("status_success", true);
        session()->setFlashdata('message', 'Data user berhasil dihapus.');
        return redirect()->to('dashboard/petugas');
    }

    public function updateStatus() {
        $id = $this->request->getPost("id");
        $user_current = $this->userModel->getFindUsers($id);
        if ($user_current->active == 1) {
            $data =[
                "active" => 0
            ];
        }else{
            $data =[
                "active" => 1
            ];
        }
        $this->userModel->updateUser($id,$data);
        $data = [
            'user_id' => user()->id,
            'action' => 'Update Status data petugas',
            'ip_address' => $this->request->getUserAgent(),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $log = new LogActivityModel();
        $log->insertLog($data);
        session()->setFlashdata("status_success", true);
        session()->setFlashdata('message', 'Data status user berhasil diganti.');
        return redirect()->to('dashboard/petugas');
    }

    public function updatePassword() {
        $param['title'] = 'Update Profile';
        $param['data'] = $this->userModel->getFindUsers(user()->id);
        return view('backoffice/petugas/update-password',$param);
    }

    public function updatePasswordStore() {
        $id = user()->id;
        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'email'    => 'required|valid_email',
        ];
     
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        

		try {
            $param['data'] = $this->userModel->getFindUsers($id);
            $nama = $this->request->getPost("nama");
            $username = $this->request->getPost("username");
            $email = $this->request->getPost("email");
            $password = (string) $this->request->getPost('password');
            if ($password != '' || $password != null) {
                $data = [
                    "nama" => $nama,
                    "email" => $email,
                    "username" => $username,
                    "password" => $password,
                    "active" => 1,
                ];
            }else{
                $data = [
                    "nama" => $nama,
                    "email" => $email,
                    "username" => $username,
                    "active" => 1,
                ];
            }
           
            $this->userModel->updateUser($id,$data);
            
            $data = [
                'user_id' => user()->id,
                'action' => 'Mengganti data petugas',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil diganti.');
			return redirect()->to('/');
		} catch (\Throwable $th) {
            return $th;
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diganti, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
            return $e;
            session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diganti, <br>' . $e->getMessage());
			return redirect()->back();
		}
    }
}
