<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        $session = session();
        // Mock data to demonstrate the layout; replace with $session->get('cart') logic later
        $data['cart_items'] = [
            [
                'name' => 'Product Name',
                'overview' => 'Product Overview',
                'price' => 0.00,
                'qty' => 1
            ]
        ];

        $data['shipping_fee'] = 50.00;
        $data['items_total'] = 0.00;

        foreach ($data['cart_items'] as $item) {
            $data['items_total'] += $item['price'] * $item['qty'];
        }

        return view('shopping_cart', $data);
    }
}