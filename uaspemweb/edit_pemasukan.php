<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Ambil data
$cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");
$data = mysqli_fetch_assoc($cek);

if (!$data) {
    die("Data tidak ditemukan");
}

if (isset($_POST['update'])) {

    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($koneksi, "
        UPDATE transaksi SET 
            jumlah='$jumlah',
            keterangan='$keterangan'
        WHERE id='$id'
    ");

    header("Location: list_pemasukan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pemasukan</title>
</head>
<body>

<h2>Edit Pemasukan</h2>

<form method="POST">

    <label>Jumlah (Rp)</label><br>
    <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>

    <label>Keterangan</label><br>
    <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

<br>
<a href="list_pemasukan.php">⬅ Kembali</a>

</body>
</html>
