<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function show($id = null)
    {
        $user = $this->model->find($id);
        if ($user) {
            return $this->respond($user);
        } else {
            return $this->failNotFound('User not found');
        }
    }

    public function create()
    {
        $data = $this->request->getPost();
        
        // Validate data
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
            return $this->respond([
                'status' => 400,
                'error' => true,
                'messages' => 'Name, Email, and Password are required'
            ], 400);
        }
    
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Insert the new user
        if ($this->model->insert($data)) {
            return $this->respondCreated([
                'status' => 201,
                'error' => false,
                'messages' => 'User created successfully'
            ]);
        } else {
            return $this->respond([
                'status' => 500,
                'error' => true,
                'messages' => 'Failed to create user'
            ], 500);
        }
    }
    
}
