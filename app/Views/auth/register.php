<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Daftar Akun Baru</h3>

    <!-- Menampilkan pesan error validasi -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                $errors = session()->getFlashdata('error');
                if(is_array($errors)){
                    foreach($errors as $err){
                        echo $err . '<br>';
                    }
                } else {
                    echo $errors;
                }
            ?>
        </div>
    <?php endif; ?>

    <form action="/auth/registerProcess" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100 mt-3">Daftar</button>
    </form>
    
    <div class="text-center mt-3">
        <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
    </div>
</div>

</body>
</html>