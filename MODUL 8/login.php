<?php 
	session_start();
	error_reporting (E_ALL^E_NOTICE);
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$submit   = $_POST['submit'];
	
	if($submit){
		$sql = "select * from user where username='$username' and password='$password'";
		$query = mysqli_query($koneksi,$sql);
		$row = mysqli_fetch_array($query);
		
		if($row[status] == "Administrator"){
			//berhasil login
			$_SESSION['username'] = $row[username];
			$_SESSION['status'] = $row[status];
			?>
			<script language script='JavaScript'>
				alert('Anda Login Sebagai Administrator');
				document.location = 'administrator.php';
			</script>
			<?php 
		}else if($row[status] == "Member"){
			//berhasil login
			$_SESSION['username'] = $row[username];
			$_SESSION['status'] = $row[status];
			?>
			<script language script='JavaScript'>
				alert('Anda Login Sebagai Member');
				document.location = 'member.php';
			</script>
			<?php 
		}else{
			//gagal login
			?>
			<script language script='JavaScript'>
				alert('Gagal Login');
				document.location = 'login.php';
			</script>
			<?php 
			}
		}
		?>
		
	<form method='post' action='login.php'>
		<p align='center'>
			Username : <input type='text' name='username'><br>
			Password : <input type='password' name='password'><br>
			<input type='submit' name='submit'>
		</p>
	</form>