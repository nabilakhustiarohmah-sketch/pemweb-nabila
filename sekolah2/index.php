<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <style>
        body{
            font-family: Arial,sans-serif;
            padding: 20px;
            background: #8bb37bff;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #b9e2c3ff;
        }
    </style>
    <body>
        <h2>sekolah2 | data siswa</h2>
        <br>
        <a href ="tambah.php">+tambah data</a>
        <br/>
        <table border = "1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
            <?php
            include 'koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "select * from siswa");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">EDIT</a>
                        <a href="hapus.php?id=<?php echo $data['id']; ?>">HAPUS</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </body>

</html>