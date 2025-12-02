<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Siswa</title>
    </head>
    <body>
        <h3> Edit Data Siswa</h3>

        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "select * FROM siswa where id='$id'");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <form method="post" action="edit_aksi.php">
                <table>
                    <tr>
                        <td>nama</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    </td>
                    </tr>
                     <tr>
                       <tr>
                            <td>NIM</td>
                                 <td><input type="number" name="nim" value="<?php echo $data['nim']; ?>"></td>
                            </tr>
                    </td>
                     <tr>
                        <td>alamat</td>
                            <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>">  
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="SIMPAN"></td>
                    </tr>

                </table>
                <a href ="index.php">KEMBALI</a>
                <br/>
            </form>
            <?php
        }
    ?>
    </body>
</html>