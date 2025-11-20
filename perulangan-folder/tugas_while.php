<!DOCTYPE html>
<html>
    <head>
        <title>Tugas perkalian</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Tabel perkalian 3 dari 10</h2>
        <table border="1" cellpadding="10" cellspacing="1">
            <tr>
                <th>Oprasi</th>
                <th>Hasil</th>
            </tr>    

            <?php

            $angka = 1;
            
            while ($angka  <= 10) {
                $hasil = 3 * $angka;

                echo "<tr>";
                echo "<td>3 x $angka</td>";
                echo "<td>$hasil</td>";
                echo "</tr>";
                $angka++;
            }            
            ?>
        </table> 
    </body>
<html>