<?php

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model
{
    protected $table            = 'log_activity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getAllLog()  {
        return $this->select('log_activity.*,users.nama, users.username')
            ->join('users','users.id = log_activity.user_id')
            ->groupBy('log_activity.user_id')
            ->findAll();
    }

    public function getFindLog($id) {
        return  $this->select('log_activity.*,users.nama, users.username')
                ->join('users','users.id = log_activity.user_id')
                ->orderBy('log_activity.id', 'DESC')
                ->where('user_id', $id)->findAll();
    }

    public function insertLog($data) {
        return $this->db->table($this->table)->insert($data);
    }
}

