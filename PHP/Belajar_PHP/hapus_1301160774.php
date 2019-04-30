<?php
// include database connection file

include_once("config_1301160774.php");
$id=$_GET['id'];
  //MASUKKAN QUERY UNTUK HAPUS
    $get = mysqli_query($conn,"DELETE FROM nilai WHERE id=$id");
    //SETELAH HAPUS BERHASIL AKAN DILANJUTKAN KE HALAMAN REKAP NILAI
    header('location:rekapNilai_1301160774.php');
?>
