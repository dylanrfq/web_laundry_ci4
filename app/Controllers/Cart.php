<?php

namespace App\Controllers;

use App\Models\LayananModel;

use App\Models\PelangganModel;

class Cart extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
{
    $pelangganModel = new \App\Models\PelangganModel();

    $data = [
        'title' => 'Keranjang Laundry',
        'cart' => session()->get('cart') ?? [],
        'pelanggan' => $pelangganModel->findAll()
    ];

    return view('cart/index', $data);
}

    // INSERT
    public function add($id)
    {
        $layanan = $this->layananModel->find($id);

        if (!$layanan) {
            return redirect()->back();
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id'     => $layanan['id'],
                'nama'   => $layanan['nama_layanan'],
                'harga'  => $layanan['harga'],
                'qty'    => 1,
                'subtotal' => $layanan['harga']
            ];
        }

        $cart[$id]['subtotal'] =
            $cart[$id]['harga'] * $cart[$id]['qty'];

        session()->set('cart', $cart);

        return redirect()->to('/cart');
    }

    // UPDATE
    public function update()
    {
        $id  = $this->request->getPost('id');
        $qty = $this->request->getPost('qty');

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            $cart[$id]['subtotal'] =
                $cart[$id]['harga'] * $qty;

            session()->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    // REMOVE
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    // DESTROY
    public function destroy()
    {
        session()->remove('cart');

        return redirect()->to('/cart');
    }
}