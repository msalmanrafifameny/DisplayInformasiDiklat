<?php session_start();
require 'backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Kegiatan</title>
    <link rel="stylesheet" href="assets/dashboard/assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dashboard/assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="assets/image/logo.png" height="96" class='mb-4' alt="logo">
                                <h3>Sistem Informasi Kegiatan</h3>
                            </div>
                            <form action="" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="float-end">
                                        <a href="register.php">Tidak punya akun?</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="assets/dashboard/assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/dashboard/assets/js/app.js"></script>

    <script src="assets/dashboard/assets/js/main.js"></script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                if ($password == $user['password']) {
                    $_SESSION['id_users'] = $user['id_users'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['nama_depan'] = $user['nama_depan'];
                    $_SESSION['nama_belakang'] = $user['nama_belakang'];
                    $_SESSION['role'] = $user['role'];

                    switch ($user['role']) {
                        case 'trainer':
                            redirectToDashboard('trainer', $user);
                            break;
                        default:
                            displayError("Peran tidak valid!");
                    }
                } else {
                    displayError("Username atau password salah!");
                }
            } else {
                displayError("Username atau password salah!");
            }
        } else {
            displayError("Terjadi kesalahan!");
        }

        $stmt->close();
        mysqli_close($conn);
    }

    function redirectToDashboard($role, $user)
    {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat datang ' + '" . $user['nama_depan'] . " " . $user['nama_belakang'] . "!',
                }).then(function() {
                    window.location.href = '$role/dashboard.php';
                });
            </script>";
    }

    function displayError($message)
    {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '$message',
                });
            </script>";
    }
    ?>

</body>

</html>