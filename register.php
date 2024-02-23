<?php session_start();
require 'backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Informasi Kegiatan</title>
    <link rel="stylesheet" href="assets/dashboard/assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/dashboard/assets/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="assets/image/logo.png" height="48" class='mb-4' alt="logo">
                                <h3>Register</h3>
                                <p>Sistem Informasi Kegiatan.</p>
                            </div>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Depan</label>
                                            <input type="text" id="first-name-column" class="form-control" name="nama_depan">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Nama Belakang</label>
                                            <input type="text" id="last-name-column" class="form-control" name="nama_belakang">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username-column">Username</label>
                                            <input type="text" id="username-column" class="form-control" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Password</label>
                                            <input type="password" id="country-floating" class="form-control" name="password">
                                        </div>
                                    </div>
                                </diV>
                                <a href="index.php">Sudah Punya Akun? Login</a>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary float-end">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="assets/dashboard/assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/dashboard/assets/js/app.js"></script>

    <script src="assets/dashboard/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users(nama_depan, nama_belakang, username, password, role) VALUES ('$nama_depan', '$nama_belakang', '$username', '$password', 'peserta')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Pendaftaran Berhasil, Silahkan Login!!",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "index.php";
                    });
                </script>';
        } else {
            echo '<script>
                    swal.fire({
                        title: "Error",
                        text: "Error: ' . mysqli_error($conn) . '",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                </script>';
        }
    }
    ?>
</body>

</html>