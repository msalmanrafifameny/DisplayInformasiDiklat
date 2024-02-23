<?php
session_start();
include '../../backend/koneksi.php';
$username = $_SESSION['nama_depan'];
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
                    <h3>Training List</h3>
                    <p class="text-subtitle text-muted">Sistem Informasi Kegiatan</p>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Materi</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Provider</th>
                                    <th>Instruktur</th>
                                    <th>Lokal</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sqld = "SELECT * FROM pelatihan";
                                $resultd = mysqli_query($conn, $sqld);

                                if ($resultd) {
                                    while ($rowd = mysqli_fetch_assoc($resultd)) {
                                        $id_pelatihan = $rowd['id_pelatihan'];
                                        $judul_materi = $rowd['judul_pelatihan'];
                                        $tanggal = $rowd['tanggal'];
                                        $jam = $rowd['jam'];
                                        $provider = $rowd['provider'];
                                        $instruktur = $rowd['Instruktur'];
                                        $lokal = $rowd['lokal'];

                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $judul_materi; ?>
                                            </td>
                                            <td>
                                                <?php echo $tanggal; ?>
                                            </td>
                                            <td>
                                                <?php echo $jam; ?>
                                            </td>
                                            <td>
                                                <?php echo $provider; ?>
                                            </td>
                                            <td>
                                                <?php echo $instruktur; ?>
                                            </td>
                                            <td>
                                                <?php echo $lokal; ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning" href="edit.php?id_pelatihan=<?php echo $id_pelatihan ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a><b>|</b></a>
                                                <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $id_pelatihan; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                    <?php
                                    }
                                } else {
                                    echo "<tr><td colspan ='8'>Tidak ada data!</td></tr>";
                                }
                                    ?>
                                        </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col text-right">
                                <a class="btn btn-primary" href="tambah.php">Tambah</a>
                            </div>
                        </div>
                    </div>
                </section>
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
    <script>
        function confirmDelete(id_pelatihan) {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Ketika dihapus, Anda tidak dapat mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?id_pelatihan=" + id_pelatihan;
                } else {
                    Swal.fire({
                        title: "Data tidak dihapus!",
                        icon: "error",
                    });
                }
            });
        }
    </script>
</body>

</html>
<!-- End of Footer -->