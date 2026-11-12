<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_a_13215_phpadvance');
    if (!$conn) {
        die('koneksi gagal: ' . mysqli_connect_error());
    }
?>