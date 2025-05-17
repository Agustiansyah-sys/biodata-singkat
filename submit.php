<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "biodata_db";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];

// Simpan ke database
$sql = "INSERT INTO biodata (nama, email, alamat, gender) VALUES ('$nama', '$email', '$alamat', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Data berhasil disimpan!</h2>";
    echo "<p><strong>Nama:</strong> $nama</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Alamat:</strong> $alamat</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
