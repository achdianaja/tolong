<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	include '../../public/head/head.php';

	$id = $_POST['id'];

	$siswa = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $id");

	$row   = mysqli_fetch_assoc($siswa);

	$dataSaldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $id");

	$saldo 	   = mysqli_fetch_assoc($dataSaldo);
 ?>


<div class="card text-center container-sm mt-5">
  <div class="card-header">
   Saldo <?php echo $row["nama"]; ?>
  </div>
  <div class="card-body">
  	<br>
    <h5 class="card-title">Saldo saat ini</h5>
    <p class="card-text">Rp.
	<?php $uang = number_format($saldo["saldo"], 0, ",", ".");
	echo $uang; ?></p>
	<br>
    
    <form action="../../route/web.php" method="post">
    	
		<input type="number" name="saldo" class="form-control" placeholder="Masukan Nominal">
		<button class="btn btn-outline-dark" value="<?php echo $id; ?>" name="tariksaldo">Konfirmasi</button>
 	</form>
  </div>
</div>

