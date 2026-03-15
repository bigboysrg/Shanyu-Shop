<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $waner = $model->where('name', 'Tangzu Waner S.G. Jade')->first();
        
        $data['productPrice'] = ($waner) ? '$' . number_format($waner['price'], 2) : '$0.00';
        
        return view('landing_page', $data);
    }
}