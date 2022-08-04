<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ./login.php");
	exit;
}

require "function.php";

$kursus = query("select * from kursus ");
if(isset($_POST["submit"])){
    if(upukursus($_POST)>0){
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

<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User</title>
    </head>
    <body>
<div>
    <a href="./logout.php" style="color:red">LOGOUT</a>
</div>
    <div>
        <div>
            <h1>Hallo <?= $_SESSION['nama'] ?></h1>
        </div>
        <div>STATUS : <?= ($_SESSION['status']==0)?"Sudah ACC" :"Sedang Validasi" ?></div>
    </div>
    <?php if($_SESSION['status'] == 1): ?>
       
       
        <div style="justify-content: center; align-content: center; align-items:center;"> 
            <div style="background-color: gray; width:400px; height:400px; border-radius:10px">
            <div style="text-align: center; font-weight:bold;color:white;padding-top:20px">
                Silahkan pilih Kursus dan Periode kursus
            </div>
            <table style="text-align:left; margin-top:10px">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $_SESSION['id'] ?>" hidden>
                <tr>
                    <th>Kursus</th>
                    <td>
                    <select name="kursus" >
                        <?php foreach($kursus as $kurs ): ?>
        <option value="<?=$kurs['kursus']?>"><?=$kurs['kursus']?></option>
        <?php endforeach; ?>
            </select>
                    </td>
                </tr>
                <tr>
                    <th>Periode</th>
                    <td>  <select name="periode">
                        <?php foreach($kursus as $kurs ): ?>
        <option value="<?=$kurs['periode']?>"><?=$kurs['periode']?></option>
        <?php endforeach; ?></td>
            </select>
                </tr>
                <tr>
                    <th>
                        Upload KRS
                    </th>
                    <td><input type="file" name="krsfile"></td>
                </tr>
            </table>
            <div style="max-width: 180px; margin-top: 20px;">
                <div style="margin-left: 100%;">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </div>
            <?php endif; ?>
            <div style="margin-left: 25px; margin-top: 55px;">
                <a href="./edits.php">
                    <button type="button" style="background-color:aqua; border-radius: 5px;font-weight: bold;">Edit Profile</button></a>
                </div>
            </form>
        </div>
            </div>
        </div>
    </body>
    </html>
</html>