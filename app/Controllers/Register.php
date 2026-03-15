<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index() {
        return view('register_view');
    }

    public function store() {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]',
        ];

        $errors = [
            'username' => ['is_unique' => 'Sorry, that username is already taken.'],
            'email'    => ['is_unique' => 'This email is already registered. Please sign in instead.'],
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to(site_url('login'))->with('success', 'Account created! You can now sign in.');
    }
}