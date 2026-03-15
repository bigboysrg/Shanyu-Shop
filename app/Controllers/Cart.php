<?php

namespace App\Controllers;

class Cart extends BaseController
{
    // Updated to .png - Ensure these match your public/images folder EXACTLY
    private $mock_products = [
        1 => ['id' => 1, 'name' => 'Zero IEM Headphones - Blue', 'price' => 89.99, 'img' => 'zeroblue.png'],
        2 => ['id' => 2, 'name' => 'Moondrop CHU 2', 'price' => 56.99, 'img' => 'chu2.png'],
        3 => ['id' => 3, 'name' => 'Vibes 202MC', 'price' => 43.99, 'img' => 'vibes.png'],
        4 => ['id' => 4, 'name' => 'BGVP Wukong', 'price' => 58990.99, 'img' => 'wukong.png'],
        5 => ['id' => 5, 'name' => 'Moondrop ARIA 2 RED', 'price' => 100.99, 'img' => 'aria.png'],
        6 => ['id' => 6, 'name' => 'Tangzu Waner S.G. Jade', 'price' => 45.99, 'img' => 'waner.png'],
        7 => ['id' => 7, 'name' => 'HiFiGo DUNU DN242', 'price' => 150.99, 'img' => 'dunu.png'],
        8 => ['id' => 8, 'name' => 'Tipsy M1 IEM', 'price' => 30.99, 'img' => 'tipsy.png'],
    ];

    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $items_total = 0;
        $total_qty = 0;
        foreach ($cart as $item) {
            $items_total += $item['price'] * $item['quantity'];
            $total_qty += $item['quantity'];
        }

        $data = [
            'cart_items'   => $cart,
            'items_total'  => $items_total,
            'shipping_fee' => ($total_qty > 0) ? 50.00 : 0.00,
            'grand_total'  => $items_total + (($total_qty > 0) ? 50.00 : 0.00),
            'total_qty'    => $total_qty
        ];

        return view('shopping_cart', $data);
    }

    public function add()
    {
        $session = session();
        $productId = $this->request->getPost('product_id');
        $quantity  = (int)$this->request->getPost('quantity');

        if (!isset($this->mock_products[$productId])) {
            return redirect()->back();
        }

        $product = $this->mock_products[$productId];
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id'       => $product['id'],
                'name'     => $product['name'],
                'price'    => $product['price'],
                'img'      => $product['img'], // This now saves the .png filename
                'quantity' => $quantity
            ];
        }

        $session->set('cart', $cart);
        return redirect()->to(site_url('cart'));
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }
        return redirect()->to(site_url('cart'));
    }
}