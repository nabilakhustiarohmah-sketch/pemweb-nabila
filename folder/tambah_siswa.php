<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Siswa</title>
</head>
<body>

    <h2>Form Pendaftaran Siswa Baru</h2>
    <form action="proses-daftar.php" method="POST">

        <label>Id Siswa :</label><br>
        <input type="text" name="id" required><br><br>
        
        <label>Nama Lengkap :</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Alamat Siswa:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Jenis Kelamin :</label><br>
        <select name="jk" required>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label>Agama:</label><br>
        <input type="text" name="agama" required><br><br>

        <label>Asal Sekolah:</label><br>
        <input type="text" name="asal_sekolah" required><br><br>

        <button type="submit" name="daftar">Daftar</button>
    </form>

</body>
</html>
