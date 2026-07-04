<?= view('template/navbar') ?>

<div class="container-fluid">

    <div class="text-center mb-4">
        <h1 class="page-title">🧺 CleanWash Laundry</h1>
        <p class="text-muted">
            Sistem Pengelolaan Pelanggan, Layanan, dan Transaksi Laundry
        </p>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- STATISTIK -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="stat-card">
                <h6>Total Layanan</h6>
                <h2><?= count($layanan) ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h6>Layanan Aktif</h6>
                <h2><?= count($layanan) ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h6>Estimasi Cepat</h6>
                <h2>2 Hari</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h6>Harga Mulai</h6>
                <h2>Rp 6K</h2>
            </div>
        </div>

    </div>

    <!-- TABEL -->
    <div class="card">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                📋 Daftar Jenis Layanan
            </h5>

            <div>

                <a href="<?= base_url('layanan/exportPdf') ?>"
                   target="_blank"
                   class="btn btn-danger btn-sm fw-bold">
                    📄 Cetak PDF
                </a>

                <a href="/cart"
                   class="btn btn-success btn-sm fw-bold">
                    🛒 Keranjang
                </a>

                <a href="/layanan/create"
                   class="btn btn-light btn-sm fw-bold">
                    ➕ Tambah Layanan
                </a>

            </div>

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Estimasi Waktu</th>
                        <th>Menu</th>
                    </tr>

                </thead>

                <tbody>

                <?php if (empty($layanan)) : ?>

                    <tr>
                        <td colspan="6"
                            class="text-center text-muted">
                            Belum ada data layanan laundry.
                        </td>
                    </tr>

                <?php else : ?>

                    <?php $i = 1; ?>

                    <?php foreach ($layanan as $l) : ?>

                    <tr>

                        <td><?= $i++; ?></td>

                        <td>
                            <strong><?= $l['nama_layanan']; ?></strong>
                        </td>

                        <td>
                            Rp <?= number_format($l['harga'], 0, ',', '.'); ?>
                        </td>

                        <td>
                            <span class="badge bg-secondary">
                                <?= $l['satuan']; ?>
                            </span>
                        </td>

                        <td>
                            <?= $l['estimasi_waktu']; ?>
                        </td>

                        <td>

                            <a href="/cart/add/<?= $l['id']; ?>"
                               class="btn btn-success btn-sm">
                                Pesan
                            </a>

                            <a href="/layanan/edit/<?= $l['id']; ?>"
                               class="btn btn-warning btn-sm">
                                Ubah
                            </a>

                            <a href="/layanan/delete/<?= $l['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                Hapus
                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= view('template/footer') ?>