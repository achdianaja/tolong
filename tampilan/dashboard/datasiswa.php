<?php  
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

	$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 ");

	$no = 1;

 ?>
<body class="body-cs">
	<?php include '../navbar/nav.php'; ?>

	<div class="container pt-3 mt-3"style="">
		<div class="row container mt-3">
			<div class="row">
				<div class="col-4">
					<a href="dashboard.php" class="text-decoration-none text-muted up fw-bold utkbtn h5">Dashboard</a>
				</div>
				<div class="col-4">
					<center class="txt"><h1>List Siswa</h1></center>
				</div>
				<div class="col-4">
					<a href="tambahkelas.php" class=" text-decoration-none btn btn-outline-dark btn-sm" style="max-width: 200px; margin-left: 200px;">tambah kelas</a>
				</div>
			</div>
		   <div class=" mt-5 ">

		   	<div class="form-floating mb-3">
		   		<input type="search" class="boxSearch form-control rounded border border-2" id="floatingInput"placeholder="name@example.com" style="max-width: 200px;">
		   		<label for="floatingInput" class="form-label fw-bold">cari</label>
		   	</div>

			<table class="table fw-bold mt-5">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Gender</th>
			      <th scope="col">Kelas</th>
			      <th scope="col">Nis</th>
			      <th scope="col">No Tlp</th>
			      <th scope="col">Hapus</th>
			    </tr>
			  </thead>
			  <tbody class="listSearch">
			  	<?php foreach ($siswa as $key): ?>
			  		<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td><?php echo $key["nama"]; ?></td>
				      <td><?php echo $key["gender"]; ?></td>
				      <td><?php echo $key["kelas"]; ?></td>
				      <td><?php echo $key["nis"]; ?></td>
				      <td><?php $not = $key["no_tlp"];
				      $tlp = number_format($not, 0, ",", "-");
				      echo $tlp ?></td>
				      <td>
				      	<form action="../../route/web.php" method="post">
				      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="hapussiswa" class="btn btn-outline-dark" onclick="hapusMurid()">Hapus</button>
				      	</form>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  </tbody>
			<script src="../../public/js/jquery-3.6.0.min"></script>
		<script src="../../public/js/search.js"></script>
			</table>
			</div>
		</div>
	</div>
	<script>
		function hapusMurid(){
			alert('Apakah Kamu Yakin Ingin Menghapus Siswa?');
		}
	</script>
	<script type="text/javascript" src="../../public/js/bootstrap.bundle.min.js"></script>
</body>