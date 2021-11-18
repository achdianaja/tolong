<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>regist</title>
	<?php include '../../public/head/head.php' ?>
	
</head>

<?php 
	include '../../db.php';

	$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
	$gender= mysqli_query($koneksi, "SELECT * FROM gender");
 ?>
<body class="dy">

		<div class="cont">
		<form action="../../route/web.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="email" name="username"  placeholder="username" required>
			</div>
			<div class="input-group">
				<input type="password" name="password" class="form-password" placeholder="Password" required>
			</div>
			<div class="input-group">
				<input type="password" name="password2" class="form-password" placeholder="konfirmasi Password" required>
            </div>
            <div class="form-check form-switch " style="margin-left: 5px;">
			  <input class="form-check-input form-checkbox" type="checkbox" role="switch">
			  <label class="form-check-label">Lihat Password</label><s></s>
			</div>
            <div class="input-group">
				<input type="text" name="nama"  placeholder="Nama" required>
			</div>
			<div class="input-group">
				<input type="number" name="tlp" placeholder="no tlp" >
			</div>
			<div class="input-group">
				<input type="number" name="nis" placeholder="NIS" >
			</div>
			<select name="kelas" class="form-select">
						<option>kelas</option>
					<?php foreach($kelas as $key): ?>
						<option value="<?php echo $key["id_kelas"] ?>"><?php echo $key["kelas"] ?></option>
					<?php endforeach ?>
				</select>
				<select name="gender" class="form-select">
					<option>jenis kelamin</option>
					<?php foreach($gender as $gen): ?>
						<option value="<?php echo $gen["id_gender"] ?>"><?php echo $gen["gender"] ?></option>
					<?php endforeach ?>
				</select><br>
			<div class="input-group">
				<button name="register" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>

   </div>
</body>
</html>