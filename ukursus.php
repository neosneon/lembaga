<?php
session_start();

if( $_SESSION['role'] != 0) {
	header("Location: ./login.php");
	exit;
}
require "function.php";

$id = $_GET['id'];
$kursus = query("select * from kursus where id = $id")[0];

if(isset($_POST["update"])){
    if(ukursus($_POST)>0){
        echo"
            <script>
            alert('Data berhasil diupdate!');
            document.location.href ='./admin.php';
            </script>
        
        ";
    }else{
        echo"
        <script>
        alert('Data gagal diupdate!');
        document.location.href ='./admin.php';
        </script>
    
    ";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <div style="margin-top: 15px; margin-left: 15px;">
        <div>
            <h1>Edit Peserta</h1>
        </div>
        <div>
            <table style="text-align:left;">
            <form action="" method="POST">
                <input type="text" name="id" value="<?= $kursus['id'] ?>" hidden>
                <tr>
                    <th>Kursus</th>
                    <td><input type="text" name="kursus" id="" value="<?= $kursus['kursus'] ?>"></td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td><input type="text" name="periode" id="" value="<?= $kursus['periode'] ?>"></td>
                </tr>
                <tr>
                    <th>keterangan</th>
                    <td><input type="text" name="keterangan" id="" value="<?= $kursus['keterangan'] ?>"></td>
                </tr>
            </table>
        </div>
        <div style="max-width: 180px; margin-top: 10px;">
            <div style="margin-left: 100%;">
                <button type="submit" name="update">Update</button>
            </div>
        </div>
</form>
    </div>
</body>
</html>