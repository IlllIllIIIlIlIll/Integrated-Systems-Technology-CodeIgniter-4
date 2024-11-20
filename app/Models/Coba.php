<?php
namespace App\Models;
use CodeIgniter\Model;

class Coba extends Model {
    protected $table = 'coba';
    protected $primaryKey = 'id';
    protected $allowedFields = ['value'];

    public function getAllItems() {
        return $this->findAll();
    }

    public function addItem($value) {
        $data = ['value' => $value];
        return $this->insert($data);
    }
}