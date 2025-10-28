<?php
$pemasukan = 50000000;
$hutang_a = 16500000;
$bunga_a = 0.05; // 5% bunga per bulan
$hutang_b = 9500000;
$bunga_b = 0.045; // 4.5% bunga per bulan

// Hitung bunga masing-masing hutang
$total_hutang_a = $hutang_a * $bunga_a;
$total_hutang_b = $hutang_b * $bunga_b;
// Hitung total bunga 
$total_bunga = $total_hutang_a + $total_hutang_b;
// Hitung total hutang (pokok + bunga)
$total_hutang = ($hutang_a + $total_hutang_a) + ($hutang_b + $total_hutang_b);
// Hitung sisa bunga
$sisa_uang = $pemasukan - $total_hutang;

//tampilkan hasil di CMD
echo "pemasukan: Rp " . number_format($pemasukan,0,',','.') . "\n";
echo "Total bunga hutang A: Rp " . number_format($total_hutang_a - $hutang_a,0,',','.') . "\n";
echo "Total bunga hutang B: Rp " . number_format($total_hutang_b - $hutang_b,0,',','.') . "\n";
echo "Jumlah total bunga: Rp " . number_format($total_bunga,0,',','.') . "\n";
echo "Jumlah total hutang (pokok + bunga): Rp " . number_format($total_hutang,0,',','.') . "\n";
echo "Sisa uang: Rp " . number_format($sisa_uang,0,',','.') . "\n";

?>
