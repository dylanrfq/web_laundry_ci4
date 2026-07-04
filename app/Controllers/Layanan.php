<?php

namespace App\Controllers;

use App\Models\LayananModel;
use Dompdf\Dompdf;

class Layanan extends BaseController
{
    protected $layananModel;

   public function __construct()
{
    if (!session()->get('isLoggedIn')) {
        header('Location: ' . base_url('/login'));
        exit;
    }

    $this->layananModel = new LayananModel();
}

    public function index()
    {
        $data = [
            'title'   => 'Daftar Layanan Laundry',
            'layanan' => $this->layananModel->findAll()
        ];

        return view('layanan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Layanan Baru'
        ];
        return view('layanan/create', $data);
    }

    public function save()
    {
        $this->layananModel->save([
            'nama_layanan'   => $this->request->getPost('nama_layanan'),
            'harga'          => $this->request->getPost('harga'),
            'satuan'         => $this->request->getPost('satuan'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
        ]);

        session()->setFlashdata('pesan', 'Data layanan berhasil ditambahkan.');
        return redirect()->to('/layanan');
    }

    public function edit($id)
    {
        $data = [
            'title'   => 'Ubah Data Layanan',
            'layanan' => $this->layananModel->find($id)
        ];

        if (empty($data['layanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Layanan dengan ID ' . $id . ' tidak ditemukan.');
        }

        return view('layanan/edit', $data);
    }

    public function update($id)
    {
        $this->layananModel->update($id, [
            'nama_layanan'   => $this->request->getPost('nama_layanan'),
            'harga'          => $this->request->getPost('harga'),
            'satuan'         => $this->request->getPost('satuan'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
        ]);

        session()->setFlashdata('pesan', 'Data layanan berhasil diubah.');
        return redirect()->to('/layanan');
    }

    public function delete($id)
    {
        $this->layananModel->delete($id);
        session()->setFlashdata('pesan', 'Data layanan berhasil dihapus.');
        return redirect()->to('/layanan');
    }

    public function exportPdf()
{
    $data = [
        'title'   => 'Laporan Daftar Layanan Laundry',
        'layanan' => $this->layananModel->findAll()
    ];

    $html = view('layanan/pdf', $data);

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream(
        'Daftar_Layanan_Laundry.pdf',
        ['Attachment' => false]
    );
}



}