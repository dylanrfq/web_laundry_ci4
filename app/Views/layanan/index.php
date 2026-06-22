<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2 class="mb-4 text-center">Sistem Pengelolaan Layanan Laundry</h2>
            
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Jenis Layanan</h5>
                    <a href="/layanan/create" class="btn btn-light btn-sm fw-bold">+ Tambah Layanan</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Estimasi Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($layanan)) : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data layanan laundry.</td>
                                </tr>
                            <?php else : ?>
                                <?php $i = 1; foreach ($layanan as $l) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><strong><?= $l['nama_layanan']; ?></strong></td>
                                    <td>Rp <?= number_format($l['harga'], 0, ',', '.'); ?></td>
                                    <td><span class="badge bg-secondary"><?= $l['satuan']; ?></span></td>
                                    <td><?= $l['estimasi_waktu']; ?></td>
                                    <td>
                                        <a href="/layanan/edit/<?= $l['id']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                        <a href="/layanan/delete/<?= $l['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>