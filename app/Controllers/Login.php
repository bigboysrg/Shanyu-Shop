<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index() {
        return view('login_view');
    }

    public function authenticate() {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error', 'Incorrect password. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'No account found with that email.');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(site_url('/'));
    }
}