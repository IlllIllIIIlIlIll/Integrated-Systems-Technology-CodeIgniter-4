<?php
namespace App\Models;

use CodeIgniter\Model;

class Coba extends Model {
    protected $table = 'coba'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['value']; 

    public function getAllItems() {
        return $this->orderBy('id', 'ASC')->findAll();
    }

    public function addItem($value) {
        $data = ['value' => $value];
        return $this->insert($data);
    }

    public function updateItem($id, $value) {
        return $this->update($id, ['value' => $value]);
    }

    public function deleteItem($id) {
        return $this->delete($id);
    }
}