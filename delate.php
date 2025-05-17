<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "biodata_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data berdasarkan ID
    $sql = "DELETE FROM biodata WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.<br>";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
}

$conn->close();

// Kembali ke halaman list
header("Location: list.php");
exit;
?>
