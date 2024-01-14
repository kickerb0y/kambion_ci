<?php

namespace App\Controllers;

class user extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $data['users'] = $userModel->findAll();

        return view('user/index',$data);
    }

    public function view($id) {
        $userModel = new \App\Models\UserModel();
        $data['user'] = $userModel->find($id);
        return view('user/view',$data);
    }

    public function add()
    {
        $data = array();
        helper(['form']);
        if($this->request->getMethod() == "post") {
            $post = $this -> request -> getPost(['first_name','middle_name','last_name','age','email','password']);
            
            //Validation for text field
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                'email' => ['label' => 'email','rules' => 'required|valid_email|is_unique[users.email]'],
                'password' => ['label' => 'password', 'rules' => 'required' ],
                'confirm_password' => ['label' => 'confirm passowrd', 'rules' => 'required_with[password]|matches[password]']
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this-> validator;
            } else {
                $post['password'] = sha1($post['password']);

            $userModel = new \App\Models\UserModel();
            $userModel ->save($post);

            $session = session();
            $session -> setFlashdata('success-add-user', "User Saved Successfully");
            return redirect()->to('/user/add'); 
            }           
        }
        return view('/user/add',$data); 
    }

    public function edit($id) {
        $userModel = new \App\Models\UserModel();
        $data['user'] = $userModel->find($id);
    
        helper(['form']); 
    
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age', 'email']);
            
            // Validation for text field
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                'email' => ['label' => 'email','rules' => 'required|valid_email'
                ],
            ]; 
    
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $userModel->update($id, $post);
                $session = session();
                $session->setFlashdata('success-update-user', 'User Updated Successfully');
    
                return redirect()->to('/user/list');
            }            
        }
    
        return view('user/edit', $data);
    }

    public function delete($id) {
        $userModel = new \App\Models\UserModel();
        $data['user'] = $userModel->find($id);
        
        if ($this->request->getMethod()== 'post') {
            $userModel-> delete($id);

            $session = session();
            $session->setFlashdata('success-delete-user','User Successfully Deleted');
            return redirect()->to('/user/list');
        }

        return view('user/delete',$data);
    }
}
