<?php
namespace App\Controllers;

use App\Models\Coba;

class CobaController extends BaseController {
    public function index() {
        $model = new Coba();
        $data['items'] = $model->getAllItems();
        return view('coba', $data);
    }

    public function add() {
        $model = new Coba();
        $value = $this->request->getPost('value');
        $model->addItem($value);
        return redirect()->to('/coba');
    }
}