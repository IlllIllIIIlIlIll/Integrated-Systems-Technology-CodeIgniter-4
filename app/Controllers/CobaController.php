<?php 
namespace App\Controllers;

use App\Models\Coba;

class CobaController extends BaseController {
    protected $coba;

    public function __construct() {
        $this->coba = new Coba();
    }

    public function index() {
        $data['items'] = $this->coba->getAllItems();
        return view('coba', $data);
    }

    public function add() {
        $value = $this->request->getPost('value');
        
        if (!$value) {
            return $this->response->setJSON(['error' => 'Value is required']);
        }

        $this->coba->addItem($value);
        return redirect()->to('/coba');
    }

    public function update() {
        $id = $this->request->getPost('id');
        $value = $this->request->getPost('value');
        
        if (!$id || !$value) {
            return $this->response->setJSON(['error' => 'ID and Value are required']);
        }

        $this->coba->updateItem($id, $value);
        return redirect()->to('/coba'); 
    }

    public function delete() {
        $id = $this->request->getPost('id');
        
        if (!$id) {
            return $this->response->setJSON(['error' => 'ID is required']);
        }

        $this->coba->deleteItem($id);
        return redirect()->to('/coba');  
    }
}