<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        helper('url');
        $data = [
            'brandName' => "Shàn yú",
            'userCount' => "100k+", // Prevents footer crash
            'title'     => "Join Shàn yú"
        ];

        return view('templates/header', $data)
             . view('register_view')
             . view('templates/footer', $data);
    }
}