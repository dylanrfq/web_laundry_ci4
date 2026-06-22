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
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Form Ubah Layanan Laundry</h5>
                </div>
                <div class="card-body">
                    <form action="/layanan/update/<?= $layanan['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_layanan" class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="<?= $layanan['nama_layanan']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga (Rupiah)</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $layanan['harga']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select" id="satuan" name="satuan" required>
                                <option value="Kg" <?= ($layanan['satuan'] == 'Kg') ? 'selected' : ''; ?>>Kg</option>
                                <option value="Pcs" <?= ($layanan['satuan'] == 'Pcs') ? 'selected' : ''; ?>>Pcs</option>
                                <option value="Meter" <?= ($layanan['satuan'] == 'Meter') ? 'selected' : ''; ?>>Meter (m²)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="estimasi_waktu" class="form-label">Estimasi Waktu</label>
                            <input type="text" class="form-control" id="estimasi_waktu" name="estimasi_waktu" value="<?= $layanan['estimasi_waktu']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/layanan" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-warning">Perbarui Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>