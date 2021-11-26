<?php 
session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	


$dataSaldo = mysqli_query($koneksi, "SELECT * FROM saldo INNER JOIN register ON saldo.id_user = register.id_user WHERE register.id_role = 2");
$no=1;
 ?>
 <body>
 	<?php include '../navbar/nav.php'; ?>
 			<table class="table container-fluid ">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Saldo</th>
			      <th scope="col">Penarikan</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($dataSaldo as $key): ?>
			  		<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td><?php echo $key["nama"]; ?></td>
				      <td>Rp. <?php $uang = $key["saldo"];
				      $format = number_format($uang, 0, ",", ".");
				      echo $format; ?></td>
				      <td>
				      	<center>
				      		<form action="tarik.php" method="post">
				      			<button class="btn btn-outline-dark" value="<?php echo $key["id_user"]; ?>" name="id">Tarik</button>
				      		</form>
				      	</center>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  </tbody>
			</table>
 </body>