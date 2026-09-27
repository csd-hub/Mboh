<?php

$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "project"; 

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses penyimpanan data jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motor = mysqli_real_escape_string($conn, $_POST['motor']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = (int)$_POST['harga']; // Pastikan harga berupa angka

    // Query untuk insert data
    $sql = "INSERT INTO motor (motor, deskripsi, harga) VALUES ('$motor', '$deskripsi', '$harga')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Data berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Motor</title>
</head>

<body>
    <h2>Tambah Stok Motor</h2>
    <form method="POST" action="">
        <label for="motor">Nama Motor:</label><br>
        <input type="text" id="nama" name="motor" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>