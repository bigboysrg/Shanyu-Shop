<?php
namespace App\Controllers;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('register_view');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $userModel->save($data);
            return redirect()->to('/login')->with('msg', 'Registration successful!');
        } else {
            return view('register_view', ['validation' => $this->validator]);
        }
    }
}