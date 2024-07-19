<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailUploadBerkas extends Model
{
    protected $table            = 'detail_upload_berkas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_upload_berkas','nama_formulir','nama_file','created_at','updated_at','deleted_at'];

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

    public function getDetailUploadBerkas($id)  {
        return $this->where('id_upload_berkas',$id)->findAll();
        
    }

    public function checkData($id, $status) {
        return $this->where('id_upload_berkas', $id)->where('nama_formulir', $status)->countAllResults() > 0;
        
    }
    public function findData($id, $status) {
        return $this->where('id_upload_berkas', $id)->where('nama_formulir', $status)->first();
        
    }
}
