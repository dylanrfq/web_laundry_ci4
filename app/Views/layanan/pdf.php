<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Daftar Layanan Laundry</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Estimasi Waktu</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>

            <?php foreach ($layanan as $l) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $l['nama_layanan']; ?></td>
                <td>
                    Rp <?= number_format($l['harga'], 0, ',', '.'); ?>
                </td>
                <td><?= $l['satuan']; ?></td>
                <td><?= $l['estimasi_waktu']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</body>
</html>