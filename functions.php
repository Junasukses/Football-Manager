<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "manager_ppl");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data){
	global $conn;

	$username = (stripslashes($data["username"]));
	$nama = (stripslashes($data["nama"]));
	$email = (stripslashes($data["email"]));
	$telepon = (stripslashes($data["telepon"]));
	$inputPassword = (stripslashes($data["inputPassword"]));
	$inputPasswordConfirm = (stripslashes($data["inputPasswordConfirm"]));
	$username = (stripslashes($data["username"]));

	$result = mysqli_query($conn, "SELECT USERNAME FROM akun WHERE USERNAME = '$username'");

	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Akun anda sudah terdaftar!');
				</script>";
		return false;
	
	}

	// untuk mengatasi username kosong
	if (empty(trim($username))){
		echo "<script>
				alert('Dimohon untuk mengisi username');
				</script>";
		return false;
	}

    // untuk mengatasi username kosong
	if (empty(trim($nama))){
		echo "<script>
				alert('Dimohon untuk mengisi Nama');
				</script>";
		return false;
	}

	// untuk mengatasi username kosong
	if (empty(trim($email))){
		echo "<script>
				alert('Dimohon untuk mengisi Email');
				</script>";
		return false;
	}
	// untuk mengatasi username kosong
	if (empty(trim($telepon))){
		echo "<script>
				alert('Dimohon untuk mengisi Telepon');
				</script>";
		return false;
	}

	// untuk mengatasi username kosong
	if (empty(trim($inputPassword))){
		echo "<script>
				alert('Dimohon untuk mengisi password');
				</script>";
		return false;
	}

	// untuk mengatasi username kosong
	if (empty(trim($inputPasswordConfirm))){
		echo "<script>
				alert('Dimohon untuk mengisi konfirmasi password');
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ( $inputPassword !== $inputPasswordConfirm ) {
		echo "<script>
				alert ('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}
	
	
	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO akun VALUES('', '2', '$nama','$username', '$inputPassword', '$email', '$telepon')");
	return mysqli_affected_rows($conn);
}

?>