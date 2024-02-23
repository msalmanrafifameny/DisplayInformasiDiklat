<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_pelatihan']) && is_numeric($_GET['id_pelatihan'])) {
    $id_pelatihan = $_GET['id_pelatihan'];

    $sql = "DELETE FROM pelatihan WHERE id_pelatihan = $id_pelatihan";

    if ($conn->query($sql) === TRUE) {
        header("Location: training.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid faculty ID.";
}

$conn->close();
?>