<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/login.css">
</head>

<body class="dy">
  <?php if(isset($_SESSION['us'])){ ?>
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
          <strong>Akun Tidak Ditemukan</strong> Mohon Periksa Kembali
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php session_destroy(); ?>
  <?php } ?>


	<div class="cont">
    <form action="../../route/web.php" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="username" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <div class="input-group">
        <button name="login" class="btn" type="submit">Login</button>
      </div>
      <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
    </form>
  </div>

    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/showpassword.js"></script>
</body>