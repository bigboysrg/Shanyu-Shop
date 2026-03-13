<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Data to pass to the view
        $data = [
            'brandName'   => "Shàn yú",
            'productPrice' => "$67.67",
            'userCount'    => "100k+",
            'title'        => "Shàn yú - Chinese Listening Platform"
        ];

        // Loading the views
        return view('templates/header', $data)
             . view('landing_page', $data)
             . view('templates/footer', $data);
    }
}