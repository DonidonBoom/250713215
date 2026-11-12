<?php

    require 'koneksi.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $stmt = mysqli_prepare($conn, 'DELETE FROM mahasiswa WHERE id = ?');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) > 0){
            echo '<p>Data berhasil dihapus.</p>';
        } else {
            echo '<p>Gagal menghapus data.</p>';
        }
    } else {
        echo '<p>ID tidak ditemukan.</p>';
    }

    echo '<a href="index.php">Kembali</a>';
?>