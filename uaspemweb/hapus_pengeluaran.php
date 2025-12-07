<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Hapus data
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");

header("Location: list_pengeluaran.php");
exit;
