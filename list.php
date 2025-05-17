<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "biodata_db";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika ada parameter ?hapus=id, lakukan penghapusan
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $conn->query("DELETE FROM biodata WHERE id = $id");
    echo "<p style='color:green;'>Data berhasil dihapus!</p>";
}

// Ambil data dari tabel
$result = $conn->query("SELECT * FROM biodata");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: center;
        }
        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Data Biodata</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><a href="?hapus=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
