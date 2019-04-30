<?php
    $conn = new mysqli('localhost', 'root', '', 'tpmod6');
    if(!$conn){
        exit();
        echo "koneksi database gagal, silahkan cek";
    }
?>
