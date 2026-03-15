<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        
        // Start building the query
        $builder = $model;

        // 1. Handle Search
        $search = $this->request->getGet('search');
        if ($search) {
            $builder = $builder->like('name', $search);
        }

        // 2. Handle Price Filtering
        $priceFilter = $this->request->getGet('price');
        if ($priceFilter) {
            switch ($priceFilter) {
                case 'under5':
                    $builder = $builder->where('price <', 5);
                    break;
                case '10-20':
                    $builder = $builder->where('price >=', 10)->where('price <=', 20);
                    break;
                case '20-50':
                    $builder = $builder->where('price >=', 20)->where('price <=', 50);
                    break;
                case 'above100':
                    $builder = $builder->where('price >', 100);
                    break;
            }
        }

        // 3. Handle Rating Filtering
        $ratingFilter = $this->request->getGet('rating');
        if ($ratingFilter) {
            $builder = $builder->where('rating', $ratingFilter);
        }

        // Fetch the filtered results
        $data['products'] = $builder->findAll();
        
        return view('shop_page', $data);
    }

    public function details($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        if (!$data['product']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('product_details', $data);
    }
}