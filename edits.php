<?php

session_start();

// if( $_SESSION['role'] != 0) {
// 	header("Location: ./login.php");
// 	exit;
// }

require "function.php";

$id =  $_SESSION['id'];
$user = query("select * from user where id = $id")[0];
$kursus = query("select * from kursus");
if(isset($_POST["update"])){
    if(update($_POST)>0){
        echo"
            <script>
            alert('Data berhasil diupdate!');
            document.location.href ='./user.php';
            </script>
        
        ";
    }else{
        echo"
        <script>
        alert('Data gagal diupdate!');
        document.location.href ='./user.php';
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
                <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        <input type="text" name="nama" value="<?= $user['nama'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Npm</th>
                    <td>
                        <input type="text" name="npm" id="" value="<?= $user['npm'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <input type="text" name="kelas" id="" value="<?= $user['kelas'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><input type="text" name="jurusan" id="" value="<?= $user['jurusan'] ?>"></td>
                </tr>
                <tr>
                    <th>Kursus</th>
                    <td>
                    <select name="kursus" id="cars">
                        <?php foreach($kursus as $kurs ): ?>
        <option value="<?=$kurs['kursus']?>"><?=$kurs['kursus']?></option>
        <?php endforeach; ?>
            </select>
                    </td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>  <select name="kursus">
                        <?php foreach($kursus as $kurs ): ?>
        <option value="<?=$kurs['periode']?>"><?=$kurs['periode']?></option>
        <?php endforeach; ?></td>
            </select>
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