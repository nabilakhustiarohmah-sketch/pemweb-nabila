<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['simpan'])) {

    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];  // === tambahan ===

    if ($jumlah <= 0) {
        $error = "Jumlah pemasukan harus lebih dari 0!";
    } else {

        $query = mysqli_query($koneksi, "
            INSERT INTO transaksi (user_id, jenis, jumlah, keterangan, tanggal)
            VALUES ('$user_id', 'pemasukan', '$jumlah', '$keterangan', '$tanggal')
        ");

        if ($query) {
            $success = "Pemasukan berhasil ditambahkan!";
        } else {
            $error = "Terjadi kesalahan saat menyimpan data!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pemasukan</title>
</head>
<body>

<h2>Tambah Pemasukan</h2>

<?php if (!empty($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>

<?php if (!empty($success)) { ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php } ?>

<form method="POST">

    <label>Jumlah (Rp)</label><br>
    <input type="number" name="jumlah" required><br><br>

    <label>Keterangan</label><br>
    <input type="text" name="keterangan" placeholder="Contoh: Gaji, uang saku" required><br><br>

    <label>Tanggal</label><br>
    <input type="date" name="tanggal" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<br>
<a href="dashboard.php">⬅ Kembali ke Dashboard</a>

</body>
</html>
