<?php
namespace App\Controllers;
use App\Models\Customer;

class CustomerController extends BaseController {
    protected $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
    }

    public function index() {
        $searchTerm = $this->request->getGet('search');
        
        $data = [
            'title' => 'Customer List',
            'customers' => $this->customerModel->getDataCustomer($searchTerm)
        ];

        return view('customer', $data);
    }
}