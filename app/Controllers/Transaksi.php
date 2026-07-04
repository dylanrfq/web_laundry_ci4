<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use Dompdf\Dompdf;

class Transaksi extends BaseController
{
    public function checkout()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->to('/cart');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['subtotal'];
        }

        $transaksiModel = new TransaksiModel();

        $transaksiModel->save([
            'pelanggan_id' => session()->get('pelanggan_id'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_bayar'       => $total
        ]);

        session()->remove('cart');

        session()->setFlashdata(
            'pesan',
            'Transaksi berhasil disimpan!'
        );

        return redirect()->to('/transaksi');
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $db->table('transaksi')
                ->select('transaksi.*, pelanggan.nama')
                ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
                ->orderBy('transaksi.id', 'DESC')
                ->get()
                ->getResultArray()
        ];

        return view('transaksi/index', $data);
    }

    public function exportPdf()
{
    $db = \Config\Database::connect();

    $data = [
        'title' => 'Laporan Transaksi Laundry',
        'transaksi' => $db->table('transaksi')
            ->select('
                transaksi.*,
                pelanggan.nama,
                pelanggan.alamat,
                pelanggan.no_hp
            ')
            ->join(
                'pelanggan',
                'pelanggan.id = transaksi.pelanggan_id'
            )
            ->orderBy('transaksi.id', 'DESC')
            ->get()
            ->getResultArray()
    ];

    $html = view('transaksi/pdf', $data);

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream(
        'Laporan_Transaksi_Laundry.pdf',
        ['Attachment' => false]
    );
}
}