<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
  <body>
    <img class="wave" src="img/wave.png" />
    <div class="container">
      <div class="img">
        <img src="img/bg.svg" />
      </div>
      <div class="login-content">
        <?php if(!empty($_GET['gagal'])){?>
      <?php if($_GET['gagal']=="userKosong"){?>
          <span class="text-danger">
           Maaf Username Tidak Boleh Kosong
          </span>
        <?php } else if($_GET['gagal']=="passKosong"){?>
          <span class="text-danger">
          Maaf Password Tidak Boleh Kosong
         </span>
        <?php } else {?>
          <span class="text-danger">
          Maaf Username dan Password Anda Salah
        </span>
        <?php }?>
      <?php }?>

        <form action="konfirmasi-login" method = "post">
          <img src="img/logo.png" />
          <h2 class="title">Welcome</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <input type="text" class="form-control" placeholder="Username"name="username"/>
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input type="password" class="form-control" placeholder="Password"name="password"/>
            </div>
          </div>
          <a href="#">Forgot Password?</a>
          <input type="submit" class="btn" name="login" value="Login" />
        </form>
      </div>
    </div>
<script type="text/javascript" src="js/main.js"></script>
  </body>
