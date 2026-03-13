<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        helper('url');
        $data = [
            'brandName' => "Shàn yú",
            'title' => "Login - Shàn yú"
        ];

        // Reusing your existing header/footer
        return view('templates/header', $data)
             . view('login_view')
             . view('templates/footer');
    }
}