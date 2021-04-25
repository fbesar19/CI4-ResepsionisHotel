<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Internal CSS -->
    <link rel="stylesheet" href="<?= base_url('css/hotel.css') ?>">

    <title>Aplikasi Hotel</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 p-4 h-full shadow">
                <h1 class="text-primary mt-5">Reservasi Hotel</h1>
                <h5 class="text-primary mt-5">Login</h5>
                <p class="text-primary my-3">Selamat datang kembali</p>

                <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('warning'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?= form_open('login/cek_login'); ?>
                <div class="container-fluid bg-light p-0 mt-4 shadow-sm">
                    <div class="login-input-text p-3">
                        <label class="d-block">Nik</label>
                        <input type="text" name="nik" class="no-border bg-light" placeholder="Masukan NIK">
                    </div>
                    <div class="login-input-text py-2 px-3">
                        <label class="d-block">Password</label>
                        <input type="password" name="password" class="no-border bg-light" placeholder="Masukan password">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" name="submit" class="btn-login" value="Masuk">
                </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-9 d-md-block d-none h-full bg-login">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>

</html>