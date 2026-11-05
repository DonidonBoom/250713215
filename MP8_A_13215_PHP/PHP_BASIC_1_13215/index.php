<?php
    echo "<h1>Hobi</h1>";
    echo '<form method="post" action="">
    <p>Nama: <br /><input type="text" name="nama"></p>
    <p>NPM: <br /><input type="text" name="npm"></p>
    <p>Hobi: <br /><input type="text" name="hobi"></p>
    <button type="submit" name="Submit">Kirim</button>
    </form>';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $hobi = $_POST['hobi'];

        echo "Hobi " . htmlspecialchars($nama) . " dengan NPM " . htmlspecialchars($npm) . " adalah " . htmlspecialchars($hobi);
    }else{
        echo "Silahkan isi form di atas untuk mengirimkan data hobi anda.";
    }