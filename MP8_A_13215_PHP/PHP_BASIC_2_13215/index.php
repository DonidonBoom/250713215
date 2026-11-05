<?php

    if($_POST){
        $bayaran = $_POST['bayaran'] ?? '';
        $undian = $_POST['undian'] ?? '';
        $harga = 500000;
        $massage = array();
        $massage2 = "";
        $bayarankembali = 0;

        if(empty($bayaran) || empty($undian)){
            $massage[] = "Harap lengkapi semua data.";
        }else{
            if(!preg_match("/^[0-9]+$/", $bayaran) || !preg_match("/^[0-9]+$/", $undian)){
                $massage[] = "Jumlah yang dibayar dan undian hanya boleh mengandung angka.";
            }
        }

        if(!empty($massage)){
            foreach($massage as $msg){
                echo "<p style='color:red;'> !! ". htmlspecialchars($msg) . " !!</p>";
            }
        }else{
            function undian($undian){
                switch($undian){
                    case 1:
                        $diskon = 0.10;
                        break;
                    case 2:
                        $diskon = 0.20;
                        break;
                    case 3:
                        $diskon = 0.30;
                        break;
                    default:
                        $diskon = 0;
                        break;
                }
                return $diskon;
            }

            $diskon = undian($undian);

            function totalBayar($harga, $diskon){
                return $harga - ($harga * $diskon);
            }

            $totalBayar = totalBayar($harga, $diskon);

            function pembayaran($bayaran, $totalBayar){
                if($bayaran < $totalBayar){
                    return null;
                }else{
                    $belianKembali = $bayaran - $totalBayar;
                    return $belianKembali;
                }
            }

            $bayarankembali = pembayaran($bayaran, $totalBayar);


            if($bayarankembali === null){
                $massage2 = "Maaf, jumlah yang dibayar kurang dari total pembayaran. silahkan bayar seusai jumlah yang ditentukan.";
                $bayarankembali = 0;
            }

            if(!empty($massage2)){
                echo "<p style='color:red;'> !! ". htmlspecialchars($massage2) . "</p>";
            }else{
                echo "<h2> Informasi Pembayaran </h2>";
                echo "<p><strong>Jumlah yang dibayar: </strong></p>" . htmlspecialchars($bayaran) . "<br />";
                echo "<p><strong>Undian: </strong></p>" . htmlspecialchars($undian) . "<br />";

                if($diskon == 0){
                    echo "<p>Maaf nomor undian tidak valid. Tidak ada diskon yang diberikan.</p>";
                }else{
                    echo "<p>Selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "% berkat nomor undian anda.</p>";
                }
                echo '<p style = "font-weight: bold; font-size: 18px;">Total Pembayaran: Rp' . htmlspecialchars($totalBayar) . '</p>';
                echo '<p style = "font-weight: bold; font-size: 18px;">Kembalian: Rp' . htmlspecialchars($bayarankembali) . '</p>';
            }
        }
    }else{
        echo "<p>Silahkan isi formulir untuk melakukan pembayaran.</p>";
    }
?>