<?php 
session_start();

if( $_SESSION['role'] != 1) {
	header("Location: ./login.php");
	exit;
}
require 'function.php';
if(isset($_POST["submit"])){
    if(tambah($_POST)>0){
        echo"
            <script>
            alert('Data berhasil ditambahkan!');
            document.location.href ='./admin.php';
            </script>
        
        ";
    }else{
        echo"
        <script>
        alert('Data gagal ditambahkan!');
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
            <h1>Tambah Peserta</h1>
        </div>
        <div>
            <form action="" method="POST">
            <table style="text-align:left;">
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <th>Npm</th>
                    <td>
                        <input type="text" name="npm" id="">
                    </td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <input type="text" name="kelas" id="">
                    </td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td><input type="text" name="jurusan" id=""></td>
                </tr>
            </table>
        </div>
        <div style="max-width: 180px; margin-top: 10px;">
            <div style="margin-left: 100%;">
                <button type="submit" name="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>