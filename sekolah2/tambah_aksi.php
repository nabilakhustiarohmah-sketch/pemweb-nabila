<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$NIM = $_POST['nim'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi,"insert into siswa values('','$nama','$NIM','$alamat')");
header("location:index.php");

?>
