<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <a href="data_input.html" class="btn-add">+ Tambah Barang </a>

        <form action="" method="post">
            <label>Search</label> <br>
            <input type="text" name="search" placeholder="Search" required><br><br>
            <input type="submit" value="Cari">

            <!-- Tombol untuk menghapus pencarian dan kembali ke data keseluruhan -->
            <?php if (isset($_POST['search']) && $_POST['search'] !== ''): ?>
            <a href="dashboard.php"><button type="button">Clear Search</button></a> 
            <?php endif; ?>
        </form> <hr>

        <table class="barang-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

        <?php
            

            function showData($search = '') {
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

                $filename = 'data_barang.txt';
                $last_id = 0; // ID terakhir

                if (file_exists($filename)) {
                    $data = file($filename, FILE_IGNORE_NEW_LINES);
                    $found = false;

                    foreach ($data as $line) {
                        list($id, $nama_barang, $harga, $stok) = explode('|', trim( $line));

                        if ($id > $last_id) {
                            $last_id = $id;
                        }

                        if ($search) {
                            if (stripos($line, $search) !== false) {   // stripos agar data tidak sensitif
                            
                                // echo "$line<br>";
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$nama_barang</td>";
                                echo "<td>$harga</td>";
                                echo "<td>$stok</td>";
                                echo "<td>
                                    <button class='btn-edit'>Edit</button>
                                    <button class='btn-delete'>Delete</button>
                                  </td>";
                                echo "</tr>";
                                $found = true;
                            }
                        } else {
                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$nama_barang</td>";
                            echo "<td>$harga</td>";
                            echo "<td>$stok</td>";
                            echo "<td>
                                    <button class='btn-edit'>Edit</button>
                                    <button class='btn-delete'>Delete</button>
                                  </td>";
                            echo "</tr>";
                        }
                        
                    }

                    if ($search && !$found) {
                        echo "Data tidak ditemukan!";
                    } 
                } else {
                    echo "File tidak ditemukan!";
                }

                $last_id = $last_id + 1;
            }

            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                showData($search);
            } else {
                showData();
            }
        ?>
            </tbody>
        </table>
    </div>
</body>
</html>