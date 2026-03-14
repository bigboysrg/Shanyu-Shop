<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        // We prepare data for both the Header and the Shopping Cart view
        $data = [
            'cart_items' => $cart,
            'title'      => 'Your Cart | Shàn yú',
            'brandName'  => 'Shàn yú'
        ];

        echo view('templates/header', $data);
        echo view('shopping_cart', $data);
        echo view('templates/footer');
    }

    public function add()
    {
        $session = session();
        
        $productId = $this->request->getPost('product_id');
        $newItem = [
            'id'    => $productId,
            'name'  => $this->request->getPost('product_name'),
            'price' => $this->request->getPost('product_price'),
            'qty'   => (int)$this->request->getPost('quantity'),
            'img'   => $this->request->getPost('product_img'),
        ];

        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += $newItem['qty'];
        } else {
            $cart[$productId] = $newItem;
        }

        $session->set('cart', $cart);
        return redirect()->to(site_url('cart'));
    }

    public function remove($id)
    {
        $session = session();
        $cart = $session->get('cart');
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $session->set('cart', $cart);
        }
        
        return redirect()->to(site_url('cart'));
    }
}