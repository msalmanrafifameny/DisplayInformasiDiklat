<?php
include 'backend/koneksi.php';

$sqlPelatihan = "SELECT * FROM pelatihan";
$resultPelatihan = $conn->query($sqlPelatihan);

$sqlRuangan = "SELECT nama_ruangan, ketersediaan FROM ruangan";
$resultRuangan = $conn->query($sqlRuangan);

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
    <title>Diklat Pelatihan PT. Semen Padang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                Diklat Pelatihan PT. Semen Padang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarNav">
                <!-- Menambahkan kelas ms-auto pada tag <ul> -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a href="login.php" class="btn btn-primary">Login</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="py-5 bg-light">
        <div class="container text-center">
            <h1>Diklat Pelatihan PT. Semen Padang</h1>
        </div>
    </header>
    <!-- Main -->
    <main class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-indicators">
                            <?php
                            $indicator_active = "active";
                            foreach ($resultPelatihan as $key => $row) {
                                echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $key . '" class="' . $indicator_active . '"></button>';
                                $indicator_active = "";
                            }
                            ?>
                        </div>
                        <div class="carousel-inner">
                            <?php
                            $slide_active = "active";
                            foreach ($resultPelatihan as $row) {
                                echo '<div class="carousel-item ' . $slide_active . '">
                <div class="box p-4 bg-light text-dark" style="height: 50vh;"> <!-- Tambahkan gaya CSS di sini -->
                    <h2 class="text-center">' . $row["lokal"] . '</h2>
                    <p><strong>Judul Pelatihan:</strong> ' . $row["judul_pelatihan"] . '</p>
                    <p><strong>Tanggal:</strong> ' . $row["tanggal"] . '</p>
                    <p><strong>Jam:</strong> ' . $row["jam"] . '</p>
                    <p><strong>Provider:</strong> ' . $row["provider"] . '</p>
                    <p><strong>Instruktur:</strong> ' . $row["Instruktur"] . '</p>
                </div>
            </div>';
                                $slide_active = "";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container text-center">
                        <div class="row mt-4 mb-4">
                            <div class="col-12">
                                <div class="btn-group d-flex justify-content-center" role="group" aria-label="Lokal buttons">
                                    <?php
                                    if ($resultRuangan->num_rows > 0) {
                                        while ($rowRuangan = $resultRuangan->fetch_assoc()) {
                                            $button_class = ($rowRuangan["ketersediaan"] == 1) ? "btn-danger" : "btn-success";
                                            $button_text = ($rowRuangan["ketersediaan"] == 1) ? "Tidak Tersedia" : "Tersedia";
                                            echo '<button type="button" class="btn ' . $button_class . ' mr-2 mb-2">
                                <i class="fas fa-home"></i><br>' . $rowRuangan["nama_ruangan"] . '
                            </button>';
                                        }
                                    } else {
                                        echo "Data ruangan tidak tersedia.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video p-2 bg-dark text-light text-center" style="height:35vh">
                        <iframe class="embed-responsive-item" style="width: 80%; height: 30vh;" src="<?php echo $link; ?>" title="Video Display" allow="accelerometer; autoplay" allowfullscreen autoplay></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        function restartVideo() {
            var video = document.getElementById("myVideo");
            video.currentTime = 0;
            video.play();
        }
    </script>
</body>

</html>