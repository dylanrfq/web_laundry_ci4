<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $this->pelangganModel = new PelangganModel();
}


    public function index()
    {
        $data = [
            'title'     => 'Daftar Pelanggan',
            // findAll() otomatis mengabaikan data yang sudah di-soft delete
            'pelanggan' => $this->pelangganModel->findAll() 
        ];
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Pelanggan Baru'];
        return view('pelanggan/create', $data);
    }

    public function save()
    {
        $this->pelangganModel->save([
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp'  => $this->request->getPost('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data pelanggan berhasil ditambahkan.');
        return redirect()->to('/pelanggan');
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Ubah Data Pelanggan',
            'pelanggan' => $this->pelangganModel->find($id)
        ];
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp'  => $this->request->getPost('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data pelanggan berhasil diubah.');
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        // Method delete() hanya akan mengisi kolom deleted_at jika useSoftDeletes = true
        $this->pelangganModel->delete($id);
        session()->setFlashdata('pesan', 'Data pelanggan berhasil dihapus.');
        return redirect()->to('/pelanggan');
    }

    public function pilih($id)
{
    session()->set('pelanggan_id', $id);

    return redirect()->to('/layanan');
}
}