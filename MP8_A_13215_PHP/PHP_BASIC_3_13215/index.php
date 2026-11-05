<?php
$menu = $_GET['menu'] ?? '';

$halaman = [
    'M' => 'pendaftaran.php',
    'B' => 'pembayaran.php',
];
?>

<!doctype html PUBLIC "-//W3C//DTD HTML 4.01 strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"></html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MyPetStore</title>
    </head>
    <body>
        <h1>Sistem Menu MyPetStore</h1>
        
        <div stye="border: 0.1px solid black; padding: 3px;">
            <a href="?menu=M" style="text-decoration: none;">Pendaftaran Membership</a> | 
        </div>
        <div sytle="border: 0.1px solid black; padding: 3px;">
            <a href="?menu=B" style="text-decoration: none;">Belanja</a>
        </div>

        <div id="konten">
            <?php
            if (is_string($menu) && isset($halaman[$menu])) {
                require __DIR__ . DIRECTORY_SEPARATOR . $halaman[$menu];
            } else {
                echo "<p>Silakan pilih menu di atas.</p>";
            }
            ?>
        </div>
    </body>
</html>