<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Laundry Management System' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
    margin:0;
    min-height:100vh;

    background: linear-gradient(
        135deg,
        #dbeafe 0%,
        #eff6ff 50%,
        #f8fafc 100%
    );

    font-family:'Segoe UI',sans-serif;

    overflow-x:hidden;
}

/* =========================
   NAVBAR
========================= */

.navbar-custom{
    background:#071a52;
    padding:15px 30px;
    box-shadow:0 4px 15px rgba(0,0,0,0.15);
}

.navbar-brand{
    color:white !important;
    font-size:28px;
    font-weight:bold;
}

.navbar-brand small{
    display:block;
    font-size:12px;
    font-weight:400;
}

.menu-link{
    color:white !important;
    text-decoration:none;
    margin:0 12px;
    padding:10px 15px;
    border-radius:12px;
    transition:0.3s;
}

.menu-link:hover{
    background:#2563eb;
    transform:translateY(-2px);
}

.menu-active{
    background:#2563eb;
}

/* =========================
   CARD
========================= */

.card{
    border:none;
    border-radius:20px;

    background:rgba(255,255,255,0.95);

    box-shadow:
    0 10px 25px rgba(0,0,0,0.08);

    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

/* =========================
   TABLE
========================= */

.table{
    border-radius:15px;
    overflow:hidden;
    background:white;
}

.table thead{
    background:#2563eb;
    color:white;
}

.table-hover tbody tr:hover{
    background:#eef6ff;
}

/* =========================
   BUTTON
========================= */

.btn-primary{
    background:#2563eb;
    border:none;
}

.btn-success{
    border:none;
}

.btn-danger{
    border:none;
}

/* =========================
   WAVE 1
========================= */

.wave{
    position:fixed;
    left:0;
    width:200%;
    height:250px;

    background:
    rgba(59,130,246,0.25);

    border-radius:43%;

    animation:waveMove 18s linear infinite;

    z-index:-2;
}

/* =========================
   WAVE 2
========================= */

.wave2{
    position:fixed;
    left:0;
    width:200%;
    height:220px;

    background:
    rgba(96,165,250,0.20);

    border-radius:40%;

    animation:waveMove2 25s linear infinite;

    z-index:-3;
}

/* =========================
   POSISI
========================= */

.wave{
    bottom:-120px;
}

.wave2{
    bottom:-150px;
}

/* =========================
   ANIMASI
========================= */

@keyframes waveMove{

    from{
        transform:translateX(0);
    }

    to{
        transform:translateX(-50%);
    }

}

@keyframes waveMove2{

    from{
        transform:translateX(-50%);
    }

    to{
        transform:translateX(0);
    }

}

/* =========================
   JUDUL HALAMAN
========================= */

.page-title{
    font-size:42px;
    font-weight:700;
    color:#0f172a;
}

/* =========================
   STATISTIC CARD
========================= */

.stat-card{
    border-radius:20px;
    background:white;
    padding:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.stat-card h2{
    color:#2563eb;
    font-weight:bold;
}
    </style>

</head>
<body>

<div class="wave"></div>
<div class="wave2"></div>




<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container-fluid">

<div class="d-flex align-items-center">

<div class="logo-box">
<i class="fa-solid fa-shirt"></i>
</div>

<div>
<a class="navbar-brand mb-0">
CleanWash Laundry
<small>Sistem Pengelolaan Layanan Laundry</small>
</a>
</div>

</div>

<div class="d-flex align-items-center">

<a href="/pelanggan" class="menu-link">
<i class="fa-solid fa-users"></i>
Pelanggan
</a>

<a href="/layanan" class="menu-link menu-active">
<i class="fa-solid fa-box"></i>
Layanan
</a>

<a href="/cart" class="menu-link">
<i class="fa-solid fa-cart-shopping"></i>
Keranjang
</a>

<a href="/transaksi" class="menu-link">
<i class="fa-solid fa-file-invoice-dollar"></i>
Transaksi
</a>

<a href="/logout"
   class="btn btn-danger ms-3">
   Logout
</a>

</div>

</div>

</nav>

<div class="container-fluid px-4 mt-4">