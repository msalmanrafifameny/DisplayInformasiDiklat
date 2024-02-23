<?php
session_start();
include '../backend/koneksi.php';
$username = $_SESSION['nama_depan'];

$sqlruangan = "SELECT COUNT(*) as total_ruangan FROM ruangan";
$resultruangan = mysqli_query($conn, $sqlruangan);
$rowruangan = mysqli_fetch_assoc($resultruangan);
$jumlahruangan = $rowruangan['total_ruangan'];

$sqltraining = "SELECT COUNT(*) as total_training FROM pelatihan";
$resulttraining = mysqli_query($conn, $sqltraining);
$rowtraining = mysqli_fetch_assoc($resulttraining);
$jumlahtraining = $rowtraining['total_training'];

$sqlVideo = "SELECT * FROM video_display";
$resultVideo = mysqli_query($conn, $sqlVideo);
$rowVideo = mysqli_fetch_assoc($resultVideo);
$link = $rowVideo['link_youtube'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Trainer</title>

    <link rel="stylesheet" href="../assets/dashboard/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/dashboard/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../assets/dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/dashboard/assets/css/app.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header text-center">
                    <img src="../assets/image/logo.png" alt="Logo" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item active ">

                            <a href="dashboard.php" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>


                        </li>

                        <li class="sidebar-item">

                            <a href="ruangan/ruangan.php" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Ruangan</span>
                            </a>

                        </li>

                        <li class="sidebar-item">

                            <a href="training/training.php" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Pelatihan</span>
                            </a>

                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="../assets/image/user.png" alt="Photo Profile" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $username; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../backend/logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">Sistem Informasi Kegiatan</p>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-12">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>Jumlah Ruangan</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p><?php echo $jumlahruangan; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>Jumlah Pelatihan</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p><?php echo $jumlahtraining; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Kalender</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="calendar" style="height: 400px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Ganti Video Tron</h3>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="card-body text-center">
                                                <label for="link_youtube">Link Youtube</label>
                                                <input type="text" class="form-control mb-2" id="link_youtube" name="link_youtube" placeholder="Link Video Display" value="<?php echo $link; ?>">
                                                <div class="embed-responsive embed-responsive-16by9 border">
                                                    <iframe style="height:400px;" class="embed-responsive-item" src="<?php echo $link; ?>" title="Video Display" allow="accelerometer; autoplay" allowfullscreen autoplay></iframe>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </section>
            </div>

            <footer class="fixed-bottom">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Copyright by <span class='text-danger'><a href="#">M. Salman Rafif Ameny</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/dashboard/assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/dashboard/assets/js/app.js"></script>

    <script src="../assets/dashboard/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/dashboard/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/dashboard/assets/js/pages/dashboard.js"></script>

    <script src="../assets/dashboard/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
            });

            calendar.render();
        });
    </script>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $link_youtube = $_POST['link_youtube'];
    
        $sqlUpdate = "UPDATE video_display SET link_youtube='$link_youtube'";
        if (mysqli_query($conn, $sqlUpdate)) {
            echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Perubahan Link Video Berhasil Disimpan",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "dashboard.php";
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