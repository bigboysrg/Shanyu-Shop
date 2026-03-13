<?php

namespace App\Controllers;

class Products extends BaseController
{
    // Move your "Database" here so all functions can access it
    private function getProductData()
    {
        return [
            ['id' => 1, 'name' => 'Zero IEM Headphones - Blue', 'price' => 89.99, 'rating' => 5, 'img' => 'zeroblue.png', 'overview' => 'Dual Cavity Dynamic Driver', 'desc' => 'High-fidelity audio with premium blue finish and ergonomic design.'],
            ['id' => 2, 'name' => 'Moondrop CHU 2', 'price' => 56.99, 'rating' => 4, 'img' => 'chu2.png', 'overview' => 'Entry-level King', 'desc' => 'The successor to the CHU, featuring a replaceable cable and refined tuning.'],
            ['id' => 3, 'name' => 'Vibes 202MC', 'price' => 43.99, 'rating' => 3, 'img' => 'vibes.png', 'overview' => 'Clear Vocals', 'desc' => 'Great for monitoring and clear vocal reproduction.'],
            ['id' => 4, 'name' => 'BGVP Wukong', 'price' => 58990.99, 'rating' => 5, 'img' => 'wukong.png', 'overview' => 'Flagship Performance', 'desc' => 'Ultra-premium IEM for the ultimate audiophile experience.'],
            ['id' => 5, 'name' => 'Moondrop ARIA 2 RED', 'price' => 100.99, 'rating' => 4, 'img' => 'aria.png', 'overview' => 'Aesthetic & Sound', 'desc' => 'The classic Aria signature with a bold new red aesthetic.'],
            ['id' => 6, 'name' => 'Tangzu Waner S.G. Jade', 'price' => 45.99, 'rating' => 5, 'img' => 'Waner2Jade.png', 'overview' => 'Jade Edition', 'desc' => 'Balanced sound signature with a beautiful jade-inspired shell.'],
            ['id' => 7, 'name' => 'HiFiGo DUNU DN242', 'price' => 150.99, 'rating' => 4, 'img' => 'dunu.png', 'overview' => 'Hybrid Driver', 'desc' => 'A perfect blend of dynamic and balanced armature drivers.'],
            ['id' => 8, 'name' => 'Tipsy M1 IEM', 'price' => 30.99, 'rating' => 3, 'img' => 'tipsy.png', 'overview' => 'Bass Focus', 'desc' => 'Powerful bass response in a compact form factor.'],
        ];
    }

    public function index()
    {
        helper('url');
        $allProducts = $this->getProductData();

        $search = $this->request->getGet('search');
        $priceRange = $this->request->getGet('price');
        $rating = $this->request->getGet('rating');

        $filteredProducts = array_filter($allProducts, function($p) use ($search, $priceRange, $rating) {
            $match = true;
            if ($search && stripos($p['name'], $search) === false) $match = false;
            if ($priceRange == 'under5' && $p['price'] >= 5) $match = false;
            if ($priceRange == '10-20' && ($p['price'] < 10 || $p['price'] > 20)) $match = false;
            if ($priceRange == '20-50' && ($p['price'] < 20 || $p['price'] > 50)) $match = false;
            if ($priceRange == 'above100' && $p['price'] <= 100) $match = false;
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

    // NEW METHOD: Product Details
    public function details($id)
    {
        $allProducts = $this->getProductData();
        
        // Find the specific product by ID
        $product = null;
        foreach ($allProducts as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'product' => $product,
            'brandName' => "Shàn yú",
            'title' => $product['name'] . " - Details"
        ];

        return view('templates/header', $data) . view('product_details', $data);
    }
}