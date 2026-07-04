<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Data Transaksi Laundry</h2>

    <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="mb-3">

    <a href="/layanan"
       class="btn btn-primary">
       Kembali ke Layanan
    </a>

    <a href="/transaksi/exportPdf"
       target="_blank"
       class="btn btn-danger">
       Cetak PDF
    </a>

</div>

    <table class="table table-bordered">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Transaksi</th>
                <th>Total Bayar</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach($transaksi as $t): ?>

            <tr>

                <td><?= $t['id']; ?></td>

                <td><?= $t['nama']; ?></td>

                <td><?= $t['tanggal_transaksi']; ?></td>

                <td>
                    Rp <?= number_format($t['total_bayar']); ?>
                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

</body>
</html>