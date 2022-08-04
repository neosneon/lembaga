<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require 'function.php';

$peserta = query("select * from user");



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
if( isset($_POST['acc'])){
    if( acc($_POST)){
        echo"
        <script>
        alert('Data Di acc!');
        document.location.href ='./admin.php';
        </script>
    
    ";
    }else{
        echo"
        <script>
        alert('GAGAL!');
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
        <a href="./logout.php" style="color:red">LOGOUT</a>
            <h1>Data Peserta</h1>
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./tambah_peserta.php"><button>Tambah Peserta</button></a> 
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./tambah_kursus.php"><button>Tambah Kursus</button></a> 
        </div>
        <div style="margin-top:10px;margin-bottom: 10px;">
            <a href="./kursus.php"><button>List Kursus</button></a> 
        </div>
        <div>
            <table style="width: 600px;">
            
                <tr>
                    <th>Nama</th>
                    <th>Npm</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Kursus</th>
                    <th>Periode</th>
                    <th>KRS</th>
                    <th>Action</th>
                    <th>Acc</th>
                </tr>
                <tr>
                <?php foreach($peserta as $row) : ?>
                    <td>
                        <?= $row['nama'] ;?>
                    </td>
                    <td>
                        <?= $row['npm'] ; ?>
                    </td>
                    <td><?= $row['jurusan'] ; ?></td>
                    <td><?= $row['kelas'] ; ?></td>
                    <td><?= $row['kursus'] ; ?></td>
                    <td><?= $row['periode'] ; ?></td>
                    <td><img src="<?='./img/'.$row['krs']?>" alt="" style="width:100px;height:100px"></td>
                    <td style="display:flex">
                    <a href="./edit.php?id=<?= $row['id'];?>">
                        <button style="background-color:aqua; border-radius: 5px;font-weight: bold;">Edit</button></a>
                        <form action="" method="POST">
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                        <button type="submit" name="delete" style="background-color: red; border-radius: 5px ; font-weight:bold ;margin-left:5px">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                        <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                        <button type="submit" name="acc" style="background-color:green; border-radius: 5px;font-weight: bold;">Acc</button></a>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>