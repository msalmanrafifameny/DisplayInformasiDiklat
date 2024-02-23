<?php
include '../../backend/koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_ruang']) && is_numeric($_GET['id_ruang'])) {
    $id_ruang = $_GET['id_ruang'];

    $sql = "DELETE FROM ruangan WHERE id_ruang = $id_ruang";

    if ($conn->query($sql) === TRUE) {
        header("Location: ruangan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid faculty ID.";
}

$conn->close();
?>