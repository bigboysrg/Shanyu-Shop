<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
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

        $shipping_fee = ($total_qty > 0) ? 50.00 : 0.00;

        $data = [
            'cart_items'   => $cart,
            'items_total'  => $items_total,
            'shipping_fee' => $shipping_fee,
            'grand_total'  => $items_total + $shipping_fee,
            'total_qty'    => $total_qty
        ];

        return view('shopping_cart', $data);
    }

    public function add()
    {
        $productModel = new ProductModel();
        $productId = $this->request->getPost('product_id');
        $quantity  = (int)$this->request->getPost('quantity');

       
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id'       => $product['id'],
                'name'     => $product['name'],
                'price'    => $product['price'],
                'img'      => $product['img'],
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
        if (isset($cart[$id])) unset($cart[$id]);
        $session->set('cart', $cart);
        return redirect()->to(site_url('cart'));
    }
}