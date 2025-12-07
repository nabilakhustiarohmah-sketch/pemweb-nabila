<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data
$query = mysqli_query($koneksi, "
    SELECT * FROM transaksi 
    WHERE user_id='$user_id' AND jenis='pengeluaran'
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengeluaran</title>
</head>
<body>

<h2>Daftar Pengeluaran</h2>

<a href="pengeluaran.php">+ Tambah Pengeluaran</a> |
<a href="dashboard.php">⬅ Kembali</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) { 
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td>Rp <?= number_format($row['jumlah']); ?></td>
        <td><?= $row['keterangan']; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td>
            <a href="edit_pengeluaran.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus_pengeluaran.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
