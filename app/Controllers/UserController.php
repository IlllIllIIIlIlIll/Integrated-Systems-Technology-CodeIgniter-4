<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function addUser()
    {
        // Get JSON input as an associative array
        $data = $this->request->getJSON(true);
    
        // Validate input
        if (!isset($data['username']) || !isset($data['password']) || !isset($data['name'])) {
            return $this->response->setJSON([
                'error' => 'Username, Password, and Name are required.'
            ], 400);
        }
    
        $userModel = new UserModel();
    
        // Check if username already exists
        if ($userModel->find($data['username'])) {
            return $this->response->setJSON([
                'error' => 'Username already exists.'
            ], 400);
        }
    
        // Hash password and save user
        $data['password'] = md5($data['password']); // MD5 hashing as per the task
        if ($userModel->insert($data)) {
            return $this->response->setJSON([
                'success' => 'User added successfully.'
            ], 201);
        } else {
            return $this->response->setJSON([
                'error' => 'Failed to add user.'
            ], 500);
        }
    }    

    // Menampilkan nama user dan data customer
    public function viewCustomerData()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();
        $user = $userModel->validateUser($username, $password);

        if ($user) {
            // Jika valid, tampilkan nama user
            return $this->response->setJSON([
                'user' => $user['name'],
                'message' => 'Data retrieved successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'error' => 'Invalid username or password.'
            ], 401);
        }
    }
}