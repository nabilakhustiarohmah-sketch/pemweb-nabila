<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data pemasukan
$query = mysqli_query($koneksi, "
    SELECT * FROM transaksi 
    WHERE user_id='$user_id' AND jenis='pemasukan'
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemasukan</title>
</head>
<body>

<h2>Daftar Pemasukan</h2>

<a href="pemasukan.php">+ Tambah Pemasukan</a> |
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
            <a href="edit_pemasukan.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus_pemasukan.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus pemasukan ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
