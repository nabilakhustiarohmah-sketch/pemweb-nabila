<?php
    $title ="manmpilkan perulangan menggunakan for";
    echo "$title\n";
    
    for ($i = 0; $i < 6; $i++){
        echo "perulangan ke-$i\n";
    }

    $title ="manmpilkan perulangan menggunakan while";
    echo "$title\n";
    
    $ulang = 0;
    
    while ($ulang <=6) {
        echo "perulangan ke-$ulang\n";
        $ulang++;
    }

    $title ="manmpilkan perulangan menggunakan DO/WHILE";
    echo "$title\n";

    $ulang = 0;

    do {
        echo "perulangan ke-$ulang\n";
        $ulang++;

    } while ($ulang < 6);

    $title ="manmpilkan perulangan menggunakan FOREACH";
    echo "$title\n";

    $book = [
        "Harry Potter",
        "Lord of the Rings",
        "The Habbits",
        "Game of Thrones",
    ];
    echo "Daftar Buku FAvorit Nabila:\n";
  
    foreach ($book as $key => $value) {
        $no = $key + 1;
        echo "$no. $value\n";
    }
    

    ?>

