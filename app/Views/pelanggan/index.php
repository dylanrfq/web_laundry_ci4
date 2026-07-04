<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Daftar Pelanggan</h2>

    <?php if(session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="mb-3">
    <a href="/pelanggan/create" class="btn btn-success">
        + Tambah Pelanggan
    </a>

    <a href="/logout" class="btn btn-danger">
        Logout
    </a>
</div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Menu</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($pelanggan as $p) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['no_hp'] ?></td>
                <td>

    <a href="/pelanggan/pilih/<?= $p['id'] ?>"
       class="btn btn-primary btn-sm">
       Pilih
    </a>

    <a href="/pelanggan/edit/<?= $p['id'] ?>"
       class="btn btn-warning btn-sm">
       Ubah
    </a>

    <a href="/pelanggan/delete/<?= $p['id'] ?>"
       onclick="return confirm('Yakin hapus data?')"
       class="btn btn-danger btn-sm">
       Hapus
    </a>

</td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

</body>
</html>