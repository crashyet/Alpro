<?php
    // mengambil data dari form
    $nama_barang = ucwords(strtolower($_POST['nama_barang']));
    $harga = $_POST['harga_barang'];
    $stok = $_POST['stok_barang'];
    $number_file = 0;

    // cek file, apakah ada atau tidak
    if (!file_exists("data_barang.txt")) {
        $file = fopen("data_barang.txt","w");       // jika tidak ada, maka buat file baru
    } 

    $arr = file("data_barang.txt", FILE_SKIP_EMPTY_LINES);
    $number_file = count($arr) + 1;
    
    $newData = "$number_file | $nama_barang | Rp " . number_format($harga, 0, ",", ".") . " | $stok \n";

    // membuat format data baru
    // $newData = ($number_file + 1) . " | " . $nama_barang . " | Rp " . number_format($harga, 0, ",", ".") . " | $stok" . "\n"; 

    // menuliskan data sesuai input
    $file = fopen("data_barang.txt","a");
    fwrite($file, $newData);
    header("Location: dashhhh.php"); 


    fclose($file);

    // menampilkan data
    // $file = fopen("data_barang.txt","r");
    // $arr = array();
    
    // $i = 0;
    // while (!feof($file)) {
    //     $arr[$i] = trim(fgets($file));
    //     $i++;
    // }
    // fclose($file);
    // foreach ($arr as $data) {
    //     echo $data . "<br>";
    // }
?>