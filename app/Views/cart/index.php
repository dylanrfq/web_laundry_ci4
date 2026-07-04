<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Keranjang Laundry</h2>

    <a href="/layanan" class="btn btn-primary mb-3">
        Kembali ke Layanan
    </a>

    <a href="/cart/destroy"
       class="btn btn-danger mb-3">
       Kosongkan Keranjang
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Layanan</th>
                <th>Harga</th>
                <th>jumlah</th>
                <th>Subtotal</th>
                <th>Menu</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $total = 0;
        ?>

        <?php foreach($cart as $item): ?>

        <?php
        $total += $item['subtotal'];
        ?>

        <tr>

            <td><?= $item['nama']; ?></td>

            <td>
                Rp <?= number_format($item['harga']); ?>
            </td>

            <td>

                <form action="/cart/update"
                      method="post"
                      class="d-flex">

                    <input type="hidden"
                           name="id"
                           value="<?= $item['id']; ?>">

                    <input type="number"
                           name="qty"
                           value="<?= $item['qty']; ?>"
                           min="1"
                           class="form-control me-2">

                    <button class="btn btn-warning">
                        Update
                    </button>

                </form>

            </td>

            <td>
                Rp <?= number_format($item['subtotal']); ?>
            </td>

            <td>

                <a href="/cart/remove/<?= $item['id']; ?>"
                   class="btn btn-danger">
                   Hapus
                </a>

            </td>

        </tr>

        <?php endforeach; ?>

        </tbody>

        <tfoot>

            <tr>
                <th colspan="3">
                    TOTAL
                </th>

                <th colspan="2">
                    Rp <?= number_format($total); ?>
                </th>
            </tr>

        </tfoot>

    </table>

    <hr>

<h4>Checkout Transaksi</h4>

<form action="/checkout" method="post">

    <button type="submit"
            class="btn btn-success">

        Checkout

    </button>

</form>

</div>

</body>
</html>