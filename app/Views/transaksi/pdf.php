<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>

body{
    font-family: Arial;
    font-size:12px;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid black;
    padding:6px;
}

th{
    background:#f2f2f2;
}

</style>

</head>
<body>

<h2>Laporan Transaksi Laundry</h2>

<p>
Tanggal Cetak:
<?= date('d-m-Y H:i:s'); ?>
</p>

<table>

<thead>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Tanggal</th>
    <th>Total Bayar</th>
</tr>

</thead>

<tbody>

<?php foreach($transaksi as $t): ?>

<tr>

    <td><?= $t['id']; ?></td>

    <td><?= $t['nama']; ?></td>

    <td><?= $t['alamat']; ?></td>

    <td><?= $t['no_hp']; ?></td>

    <td><?= $t['tanggal_transaksi']; ?></td>

    <td>
        Rp <?= number_format($t['total_bayar'],0,',','.'); ?>
    </td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</body>
</html>