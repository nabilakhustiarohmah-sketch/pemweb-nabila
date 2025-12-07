<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Hitung pemasukan bulan ini
$query_pemasukan = mysqli_query($koneksi, "
    SELECT SUM(jumlah) AS total_pemasukan 
    FROM transaksi 
    WHERE user_id = '$user_id'
    AND jenis = 'pemasukan'
    AND MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND YEAR(tanggal) = YEAR(CURRENT_DATE())
");
$total_pemasukan = mysqli_fetch_assoc($query_pemasukan)['total_pemasukan'] ?? 0;

// Hitung pengeluaran bulan ini
$query_pengeluaran = mysqli_query($koneksi, "
    SELECT SUM(jumlah) AS total_pengeluaran 
    FROM transaksi 
    WHERE user_id = '$user_id'
    AND jenis = 'pengeluaran'
    AND MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND YEAR(tanggal) = YEAR(CURRENT_DATE())
");
$total_pengeluaran = mysqli_fetch_assoc($query_pengeluaran)['total_pengeluaran'] ?? 0;

// Hitung saldo
$saldo = $total_pemasukan - $total_pengeluaran;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Keuangan</title>

    <style>
        body {
            font-family: Arial;
        }
        .box {
            display: inline-block;
            width: 200px;
            padding: 15px;
            margin: 10px;
            border-radius: 10px;
            color: white;
            text-align: center;
        }
        .income { background: green; }
        .outcome { background: red; }
        .saldo { background: blue; }
        .menu {
            margin-top: 30px;
        }
        .menu a {
            display: block;
            margin: 8px 0;
            font-size: 18px;
        }
    </style>
</head>

<body>

<h2>Selamat datang, <b><?php echo ucfirst($username); ?></b> 👋</h2>
<h3>Ringkasan Keuangan Bulan Ini</h3>

<!-- BOX KEUANGAN -->
<div class="box income">
    <h3>Pemasukan</h3>
    <h2>Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></h2>
</div>

<div class="box outcome">
    <h3>Pengeluaran</h3>
    <h2>Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></h2>
</div>

<div class="box saldo">
    <h3>Saldo</h3>
    <h2>Rp <?php echo number_format($saldo, 0, ',', '.'); ?></h2>
</div>

<hr><br>

<!-- MENU FITUR LENGKAP -->
<h3>📌 Menu Dashboard</h3>

<div class="menu">
    <a href="pemasukan.php">➕ Tambah Pemasukan</a>
    <a href="pengeluaran.php">➖ Tambah Pengeluaran</a>
    <a href="list_pemasukan.php">📥 Daftar Pemasukan</a>
    <a href="list_pengeluaran.php">📤 Dafta_
