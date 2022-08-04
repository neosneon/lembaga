<?php 



$conn = mysqli_connect("localhost","root","","lsp");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data){
	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$npm = htmlspecialchars($data['npm']);
	 $jurusan = htmlspecialchars($data['jurusan']);
	 $kelas = htmlspecialchars($data['kelas']);
	 $periode = htmlspecialchars($data['periode']);
	 $kursus = htmlspecialchars($data['kursus']);
	 $query = "insert into user values ('','$nama','$npm','$kelas','$jurusan')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	$id = $id['id'];
	mysqli_query($conn,"delete from user where id = $id");
	return mysqli_affected_rows($conn);
}

function update($data){
	global $conn;

	$id = $data['id'];
	$npm = htmlspecialchars($data['npm']);
	$nama = htmlspecialchars($data['nama']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$kelas = htmlspecialchars($data['kelas']);
	$periode = htmlspecialchars($data['periode']);
	$kursus = htmlspecialchars($data['kursus']);
	// $kelas = htmlspecialchars($data['kelas']);

	$query = "update user set nama = '$nama',npm='$npm',jurusan='$jurusan',kelas='$kelas' where id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function kursus($data){
	global $conn;
	$kursus = $data['kursus'];
	 $periode = $data['periode'];
	 $keterangan = $data['keterangan'];
	 $query = "insert into kursus values  ('','$kursus','$periode','$keterangan')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function ukursus($data){
	global $conn;

	$id = $data['id'];
	
	$periode = $data['periode'];
	$kursus = $data['kursus'];
	$keterangan = $data['keterangan'];

	$query = "update kursus set kursus = '$kursus',periode='$periode',keterangan='$keterangan' where id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function upukursus($data){
	global $conn;
	$id = $data['id'];
	$kursus = $data['kursus'];
	$periode = $data['periode'];
	$krs = upload();
	$query ="update user set kursus = '$kursus',periode = '$periode',krs = '$krs' where id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
function upload() {

	$namaFile = $_FILES['krsfile']['name'];
	$ukuranFile = $_FILES['krsfile']['size'];
	$error = $_FILES['krsfile']['error'];
	$tmpName = $_FILES['krsfile']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}
function acc($data){
	global $conn;
	$id = $data['id'];
	$status = 1;
	$query ="update user set status = '$status' where id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}