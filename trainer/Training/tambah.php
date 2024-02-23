<?php
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['nama_depan'];

$sql = "SELECT * FROM ruangan";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Trainer</title>

    <link rel="stylesheet" href="../../assets/dashboard/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/dashboard/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../../assets/dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/dashboard/assets/css/app.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header text-center">
                    <img src="../../assets/image/logo.png" alt="Logo" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item ">

                            <a href="../dashboard.php" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>


                        </li>

                        <li class="sidebar-item">

                            <a href="../ruangan/ruangan.php" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Ruangan</span>
                            </a>

                        </li>

                        <li class="sidebar-item active">

                            <a href="training.php" class='sidebar-link'>
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
                                    <img src="../../assets/image/user.png" alt="Photo Profile" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $username; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../backend/logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Tambah Data Pelatihan</h3>
                    <p class="text-subtitle text-muted">Sistem Informasi Kegiatan</p>
                </div>
                <div class="col-md-10">
                    <div class="container">
                        <form id="editProfileForm" enctype="multipart/form-data" action="" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="judu_materi">Judul Materi</label>
                                                        <input type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Nama Materi" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="jam">jam</label>
                                                        <input type="time" class="form-control" name="jam" id="jam" placeholder="Jam" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="provider">Provider</label>
                                                        <input type="text" class="form-control" name="provider" id="provider" placeholder="Provider" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="instruktur">Instruktur</label>
                                                        <input type="text" class="form-control" name="instruktur" id="instruktur" placeholder="Instruktur" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="lokal">Lokal</label>
                                                        <select class="form-control" name="lokal" id="lokal">
                                                            <option value="">Pilih Ruangan</option>
                                                            <?php
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row["nama_ruangan"] . "'>" . $row["nama_ruangan"] . "</option>";
                                                                }
                                                            } else {
                                                                echo "<option value=''>Data tidak tersedia</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="text-center">
                                                        <a class="btn btn-secondary" href="ruangan.php">Batal</a>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Content -->
            <!-- Footer -->
            <footer class="fixed-bottom">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Copyright by <span class='text-danger'><a href="#">M. Salman Rafif Ameny</a></p>
                    </div>
                </div>
            </footer>
        </div>


    </div>
    <script src="https://kit.fontawesome.com/36704cc61b.js" crossorigin="anonymous"></script>
    <script src="../../assets/dashboard/assets/js/feather-icons/feather.min.js"></script>
    <script src="../../assets/dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/dashboard/assets/js/app.js"></script>

    <script src="../../assets/dashboard/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../../assets/dashboard/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/dashboard/assets/js/pages/dashboard.js"></script>

    <script src="../../assets/dashboard/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <?php 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul_materi = $_POST['judul_materi'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $provider = $_POST['provider'];
        $instruktur = $_POST['instruktur'];
        $lokal = $_POST['lokal'];
        $sqlt = "INSERT INTO pelatihan (judul_pelatihan, tanggal, jam, provider, Instruktur, lokal) values ('$judul_materi' , '$tanggal', '$jam', '$provider', '$instruktur', '$lokal')"; 
        if (mysqli_query($conn, $sqlt)) {
            echo '<script>
                    swal.fire({
                        title: "Sukses",
                        text: "Pendaftaran Pelatihan Berhasil",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "training.php";
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