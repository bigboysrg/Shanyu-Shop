<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        helper('url');

        // 1. Our "Database" of products
        $allProducts = [
            ['id' => 1, 'name' => 'Zero IEM Headphones - Blue', 'price' => 89.99, 'rating' => 5, 'img' => 'zeroblue.png'],
            ['id' => 2, 'name' => 'Moondrop CHU 2', 'price' => 56.99, 'rating' => 4, 'img' => 'chu2.png'],
            ['id' => 3, 'name' => 'Vibes 202MC', 'price' => 43.99, 'rating' => 3, 'img' => 'vibes.png'],
            ['id' => 4, 'name' => 'BGVP Wukong', 'price' => 58990.99, 'rating' => 5, 'img' => 'wukong.png'],
            ['id' => 5, 'name' => 'Moondrop ARIA 2 RED', 'price' => 100.99, 'rating' => 4, 'img' => 'aria.png'],
            ['id' => 6, 'name' => 'Tangzu Waner S.G. Jade', 'price' => 45.99, 'rating' => 5, 'img' => 'Waner2Jade.png'],
            ['id' => 7, 'name' => 'HiFiGo DUNU DN242', 'price' => 150.99, 'rating' => 4, 'img' => 'dunu.png'],
            ['id' => 8, 'name' => 'Tipsy M1 IEM', 'price' => 30.99, 'rating' => 3, 'img' => 'tipsy.png'],
        ];

        // 2. Get Filter Inputs from URL
        $search = $this->request->getGet('search');
        $priceRange = $this->request->getGet('price');
        $rating = $this->request->getGet('rating');

        // 3. Filtering Logic
        $filteredProducts = array_filter($allProducts, function($p) use ($search, $priceRange, $rating) {
            $match = true;

            // Search filter
            if ($search && stripos($p['name'], $search) === false) $match = false;

            // Price filter
            if ($priceRange == 'under5' && $p['price'] >= 5) $match = false;
            if ($priceRange == '10-20' && ($p['price'] < 10 || $p['price'] > 20)) $match = false;
            if ($priceRange == '20-50' && ($p['price'] < 20 || $p['price'] > 50)) $match = false;
            if ($priceRange == 'above100' && $p['price'] <= 100) $match = false;

            // Rating filter
            if ($rating && $p['rating'] != $rating) $match = false;

            return $match;
        });

        $data = [
            'products' => $filteredProducts,
            'brandName' => "Shàn yú",
            'title' => "Shop - Shàn yú"
        ];

        return view('templates/header', $data) . view('shop_page', $data);
    }
}