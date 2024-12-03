<?php

    // mendapatkan data yang akan di cari
    // $nama_barang = $_POST['nama_barang'];
    $nama_barang = $_POST['search'];

    // memanggil database
    $filename = 'data_barang.txt';
    // $filename = __DIR__ . '/data_barang.txt';

    // baca isi file
    $data = file($filename, FILE_IGNORE_NEW_LINES);

    // Loop untuk mencari data
    $found = false;
    foreach ($data as $line) {
        if (stripos($line, $nama_barang) !== false) {   // stripos agar data tidak sensitif
            echo "$line<br>";
            $found = true;
        }
    }

    if (!$found) {
        echo "Data tidak ditemukan.";
    }
    
?>