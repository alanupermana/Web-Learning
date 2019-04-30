<?php
// include database connection file
include_once("config_1301160774.php");

if(isset($_POST["submit"])){
    $id=$_GET['id'];
    //MASUKKAN QUERY UNTUK UPDATE
    $get = mysqli_query($conn,"UPDATE nilai SET uts=$_POST[uts], uas=$_POST[uas], kuis=$_POST[kuis], tubes=$_POST[tubes] WHERE id=$id");
    //SETELAH UPDATE BERHASIL AKAN DILANJUTKAN KE HALAMAN REKAP NILAI
    header('location:rekapNilai_1301160774.php');
}
?>
