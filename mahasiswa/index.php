<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login">
    <div style="text-align: center;">
<span>
	<h1>Login</h1>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<form method="post" action="login.php">
    <label for="username">
    <i class="fas fa-user"></i>
   </label>
   <input type="text" name="username" placeholder="Username" id="username" required>
   <label for="password">
    <i class="fas fa-lock"></i>
   </label>
   <input type="password" name="password" placeholder="Password" id="password" required>
   <input type="submit" name="submit" value="Login">
  </form>
 </div>			
    </form>
    
</body>
</html>
