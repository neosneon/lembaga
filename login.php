

<?php 
session_start();
require 'function.php';
// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$npm = $_POST["npm"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE npm = '$npm'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( $password == $row["npm"]) {
			// set session
			$_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];
            $_SESSION["nama"] = $row['nama'];
            $_SESSION["role"] = $row['role'];
            $_SESSION["status"] = $row['role'];


			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['npm']), time()+60);
			}
            if($row['role'] == 1){
                header("Location: ./admin.php");
                exit;
            }else{
                header("Location: ./user.php");
                exit;
            }
		}
	}

	$error = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LESEPE</title>
</head>
<body>
<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">npm / password salah</p>
<?php endif; ?>

<form action="" method="post">

	<ul>
		<li>
			<label for="npm">npm :</label>
			<input type="text" name="npm" id="npm">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	
</form>


</body>
</html>