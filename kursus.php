<?php
session_start();

if( $_SESSION['role'] != 1) {
	header("Location: ./login.php");
	exit;
}
require 'function.php';

$kursus = query("select * from kursus");



if( isset($_POST['delete'])){
    if( hapus($_POST)){
        echo"
        <script>
        alert('Data berhasil dihapus!');
        document.location.href ='./admin.php';
        </script>
    
    ";
    }else{
        echo"
        <script>
        alert('Data gagal dihapus!');
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
    <title>Admin</title>
</head>
<style>
    table, th, td{
        border:1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>
<body>
    <div style="margin-top: 25px; margin-left: 10px;">
        <div>
            <h1>Data Kursus</h1>
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./tambah_peserta.php"><button>Tambah Peserta</button></a> 
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./tambah_kursus.php"><button>Tambah Kursus</button></a> 
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./admin.php"><button>Home</button></a> 
        </div>
        <div>
            <table style="width: 600px;">
            
                <tr>
                 
                    <th>Kursus</th>
                    <th>Periode</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                <?php foreach($kursus as $row) : ?>
                  
                    <td><?= $row['kursus'] ; ?></td>
                    <td><?= $row['periode'] ; ?></td>
                    <td><?= $row['keterangan'] ; ?></td>
                    <td style="display:flex">
                    <a href="./ukursus.php?id=<?= $row['id'];?>">
                        <button style="background-color:aqua; border-radius: 5px;font-weight: bold;">Edit</button></a>
                        <form action="" method="POST">
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                        <button type="submit" name="delete" style="background-color: red; border-radius: 5px ; font-weight:bold ;margin-left:5px">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>