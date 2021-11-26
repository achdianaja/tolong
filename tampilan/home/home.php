<?php 
	session_start();

	include '../../db.php';
	include '../../auth/userSession.php';

	$auth   = $_SESSION['auth'];

	$db     = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $auth");

	$saldo  = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $auth");

	if (mysqli_num_rows($saldo) === 1) {
		$uang   = mysqli_fetch_assoc($saldo);

		$format = number_format($uang["saldo"], 0, ",", ".");
	}else{
		$format = 0;
	}
	
	$top = mysqli_query($koneksi, "SELECT * FROM saldo INNER JOIN register ON saldo.id_user = register.id_user INNER JOIN gender on register.id_gender = gender.id_gender WHERE register.id_role = 2 ORDER BY saldo DESC LIMIT 3");
	$no=1;

 ?>

<!-- BG -->
<link rel="stylesheet" type="text/css" href="../../public/css/main.css">
<body class="bg-img">


<!-- Toast -->
	<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
	  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-header">
	      <img src="../../source/aset/main-icon.png" style="width: 50px;" class="rounded me-2" alt="...">
	      <strong class="me-auto">TabunganQ</strong>
	      <small>Baru saja</small>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	      Permintaan sedang dalam antrian.
	      <a href="#" id="detail-toast">detail</a>
	    </div>
	  </div>
	</div>

<?php include '../navbar/nav.php'; ?>

<div class="container">
	<div class="row">
		<?php foreach ($top as $key ): ?>
			<?php if ($key["gambar"] == null){ ?>
				<div class="col-4 d-flex justify-content-center">
					<h5>No. <?php echo $no++ ?></h5>
					<img src="<?php echo $key["avatar"] ?>" class="rounded-circle" style="max-width: 100px; height:100px">
					<div class="row">
						<h3><?php echo $key["nama"] ?></h3>
						<h3>Rp <?php echo number_format($key["saldo"], 0, ".", "."); ?></h3>
					</div>
				</div>
			<?php }else{ ?>
				<div class="col-4 d-flex justify-content-center">
					<h5>No. <?php echo $no++ ?></h5>
					<img src="<?php echo "../../source/".$key["gambar"] ?>"  class=" rounded-circle" style="max-width: 100px; height:100px">
					<div class="row">
						<h3><?php echo $key["nama"] ?></h3>
						<h3>Rp <?php echo number_format($key["saldo"], 0, ".", "."); ?></h3>
					</div>
				</div>
			<?php } ?>
			
		<?php endforeach ?>
	</div>
</div>
	<div class="bg-dark rounded mt-4 container text-light border border-2 pt-3 pb-3">	
		<h3 style="font-family: Comic Sans Ms">Rp. <?php echo $format ?></h3>
		Isi Saldo
		<form id="main" action="../../route/web.php" method="post">
			<h3>Saldo : </h3>
			<input type="number" class="form-control" name="saldo" required>
			<h3 class="mt-4">Pesan :</h3>
			<textarea class="form-control " name="pesan" required>
			</textarea>
			<center>
				<button type="submit" class="mt-2 btn btn-outline-light" name="nabung" value="
				<?php echo $auth; ?>">Kirim</button>
				<!-- Toast Show -->
					<?php if ('$auth'){ ?>
						<script type="text/javascript">$('#ya').on('click',function(){
							  $('#liveToast').toast('show');
							  $('#main')[0].reset()
							})
						</script>
					<?php } ?>
					
			</center>
		</form>
	</div>
	<h3 class="text-center">History</h3>
	<?php 
	$riwayat = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id_user ='$auth' ORDER BY id_riwayat DESC");?>
	<?php foreach ($riwayat as $history): ?>
		<div class="container mt-4">
			<div class="card text-center">
				<div class="card-header <?php if($history['riwayat'] == 'Penarikan'){
					echo 'bg-danger';
				}else{
					echo 'bg-success';
				} ?>">
				    <h3 class="text-white"><?php echo $history["riwayat"] ?></h3>
				</div>
				<div class="card-body">
				    <div class="row d-flex justify-content-center mt-3">
				   		<h5 class="col-2 text-start">Saldo asal</h5>
				    	<h5 class="col-3 text-end">: Rp <?php echo number_format($history["saldo_asal"], 0,".","."); ?></h5>
				    </div>
				    <div class="row d-flex justify-content-center mt-3">
				   		<h5 class="col-2 text-start">Besar <?php echo $history["riwayat"] ?>
				   			<p class="mt-3 ">Hasil</p>
				   		</h5>
				    	<h5 class="col-3 text-end">: Rp <?php echo number_format($history["aksi"], 0,".","."); ?>
				    		<p class="mt-3">: Rp <?php echo number_format($history["saldo_akhir"], 0, ".", "."); ?></p>
				    	</h5>
				    </div>
				</div>
				<div class="card-footer text-muted">
				    <?php echo $history["tanggal"] ?>
				</div>
			</div>
		</div>
		
	<?php endforeach ?>
</body>