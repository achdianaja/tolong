<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	include '../../public/head/head.php';

	$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 ");

	$penabung = mysqli_query($koneksi, "SELECT * FROM konfirmasi");

	$ttl_penabung= mysqli_num_rows($penabung);

	$total = mysqli_num_rows($siswa);

	$saldo = mysqli_query($koneksi, "SELECT sum(saldo) as uang FROM saldo INNER JOIN register ON saldo.id_user = register.id_user WHERE register.id_role = 2 ");

	$row   = mysqli_fetch_assoc($saldo);

	$rupiah= number_format($row["uang"], 0, ",", ".");

 ?>

<body>
  <?php include '../navbar/nav.php' ?>
        <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper">
                <div class="container-fluid py-4">
                  <div class="row">
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-circle-user"></i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">murid</p>
                            <h4 class="mb-0"><?php echo $total ?></h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                          <a href="datasiswa.php" class="mb-0 text-dark fw-bold" style="text-decoration: none;"><span class="text-success text-sm font-weight-bolder"></span>selengkapnya</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">saldo</p>
                            <h4 class="mb-0">Rp. <?php echo $rupiah ?></h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                          <a href="datasaldo.php" class="mb-0 text-dark fw-bold" style="text-decoration: none;"><span class="text-success text-sm font-weight-bolder"></span>selengkapnya</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">penabung hari ini</p>
                            <h4 class="mb-0"><?php echo $ttl_penabung; ?></h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                          <a href="listpenabung.php" class="mb-0 text-dark fw-bold" style="text-decoration: none;"><span class="text-danger text-sm font-weight-bolder"></span>selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </body>