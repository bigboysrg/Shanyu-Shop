<?php

namespace App\Controllers;

class Catalog extends BaseController
{
    public function index()
    {
        return view('user_catalog');
    }
}