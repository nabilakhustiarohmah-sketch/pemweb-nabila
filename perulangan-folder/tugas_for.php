<!DOCTYPE html>
<html>
    <head>
        <title>Tugas perulangan for</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Tabel perulangan 1- 15 nabila azekk joss</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Angka</th>
                <th>Kuadrat</th>
            </tr>    

            <?php
            for ($i = 1; $i <= 15; $i++) {
                $kuadrat = $i * $i;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$kuadrat</td>";
                echo "</tr>";
            }            
            ?>
        </table> 
    </body>
<html>