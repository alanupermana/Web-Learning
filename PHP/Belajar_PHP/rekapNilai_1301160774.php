<!DOCTYPE html>
<html lang="en">
<?php


require_once("config_1301160774.php");
session_start();
//MASUKKAN KODE DISINI
if ($_SESSION['loggedIn']){
    //AMBIL NIM DARI DATABASE
    $get = $conn->query('SELECT nim FROM akun')->fetch_assoc();
    $nim = $get['nim'];
    //AMBIL NILAI DARI DATABASE
    $get2=mysqli_query($conn,'SELECT * FROM nilai');

    //BUAT FUNGSI UNTUK MENGHASILKAN INDEX
    function index($total){
        if ($total>80 && $total<=100){
            $index="A";
        }else if ($total>70 && $total<=80){
            $index="AB";
        }else if ($total>60 && $total<=70){
            $index="B";
        }else if ($total>50 && $total<=60){
            $index="C";
        }else if ($total>40 && $total<=50){
            $index="D";
        }else{
            $index="E";
        }

        return $index;
    }

    //BUAT FUNGSI UNTUK MENGHASILKAN KETERANGAN
    function keterangan($index){
        if($index=='A'){
            $ket='PERFECT';
        }else if ($index=='AB') {
            $ket='HAMPIR PERFECT';
        }else if ($index=='B'){
            $ket='BAIK';
        }else if ($index=='C'){
            $ket='CUKUP BAIK';
        }else if ($index=='D'){
            $ket='BERSYARAT';
        }else if ($index=='E'){
            $ket='MENGULANG';
        } return $ket;
    }
}



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Nilai - <?= $nim?>]</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="show">
            <h1>rekap nilai <?= $nim?></h1>
            <table>
                <tr>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Kuis</th>
                    <th>Tubes</th>
                    <th>Index</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <!-- BUAT PERULANGAN UNTUK MENGELUARKAN HASIL DARI NILAI YANG TELAH DIAMBIL DARI DATABASE -->
                <?php
                while($nilai=mysqli_fetch_array($get2)){
                ?>
                <tr>
                    <td> <?php echo $nilai["uts"] ?> </td>
                    <td><?php echo  $nilai["uas"] ?></td>
                    <td><?php echo  $nilai["kuis"] ?></td>
                    <td><?php echo $nilai["tubes"] ?></td>
                    <?php $total= $nilai["uts"]*0.25+$nilai["uas"]*0.25+$nilai["kuis"]*0.35+$nilai["tubes"]*0.15?>
                    <td><?php echo  index($total) ?></td>
                    <td><?php echo  keterangan(index($total)) ?></td>
                    <td>
                        <?php echo " <a href='edit_1301160774.php?id=$nilai[id]'>  edit</a>" ?>
                        <?php echo " <a href='hapus_1301160774.php?id=$nilai[id]'> Hapus</a>" ?>
                    </td>
                </tr>

                <?php } ?>
            </table>
            <a href="logout_1301160774.php">Logout</a>
        </div>
    </div>
</body>
</html>
