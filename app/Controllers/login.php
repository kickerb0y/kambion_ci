<?php
namespace App\Controllers;
use App\Models\UserModel;

class login extends BaseController
{
    public function login()
    {
        $data = array();
        helper(['form']);

        if ($this->request->getMethod()=='post') {
            $post = $this->request->getPost(['email','password']);

            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required|valid_email'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ]; 
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $userModel = new \App\Models\UserModel();
                $user = $userModel->where('email',$post['email'])->where('password',sha1($post['password']))->first();

                if (! $user) {
                    $session = session();
                    $session -> setFlashdata('invalid',"Invalid Username or Password, Please try again.");
                } else {
                     $this->setUserSession($user);

                     return redirect()->to('/user/list');
                }
            }
        }
        return view('login',$data);
    }

    public function setUserSession($user) {
        $myFullName = '';
    
        if (empty($user->middle_name)) {
            $myFullName = $user->first_name . " " . $user->last_name;
        } else {
            $myFullName = $user->first_name . " " . $user->middle_name[0] . "." . " " . $user->last_name;
        }
    
        $data = [
            'myUserId' => $user->user_id,
            'myFirstName' => $user->first_name,
            'myMiddleName' => $user->middle_name,
            'myLastName' => $user->last_name,
            'myAge' => $user->age,
            'myEmail' => $user->email,
            'myPassword' => $user->password,
            'myFullName' => $myFullName, 
            'isLoggedIn' => true
        ];

        session()->set($data);
    }
}
