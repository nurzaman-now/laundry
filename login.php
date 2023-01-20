<?php
ob_start();
session_start();
if (isset($_POST['submit'])) {
  extract($_POST);

  include('config/crud.php');
  $table = 'users';
  $condition = " WHERE email='" . $email . "'";
  $read = read($table, "*", $condition);
  if ($read) {
    $row = $read->fetch_object();
    if (password_verify($password, $row->password)) {
      $_SESSION['id'] = $row->id;
      $_SESSION['username'] = $row->username;
      $_SESSION['id_level'] = $row->id_level;
      if ($row->id_level == 1 && $row->active) {
        echo ('<script>alert("login admin berhasil")
        window.location.href="admin/index.php"</script>');
      } elseif ($row->active) {
        echo ('<script>alert("login berhasil")</script>');
        header("location:users/index.php");
      } else {
        echo ('<script>alert("Akun anda belum diaktivasi. silahkan aktivasi terlebih dahulu")window.location.href="verify.php"</script>');
      }
    } else {
      echo ('<script>alert("login gagal")</script>');
    }
  } else {
    echo ('<script>alert("login gagal")</script>');
  }
}

include('component/header.php');
include('component/navbar.php');
?>
<div style="background-image: url('images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
  <div class="container pt-5" style="min-height: 700px;">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card" style="width: 25rem; border-radius: 5%;">
          <div class="card-body">
            <form action="" method="POST">
              <h2 class="card-title">Login</h2>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Anda" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Masukan password anda" id="password" name="password" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="pass"><i class="fa-solid fa-eye" id="eye"></i></button>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                Lupa pasword? <a href="forgot.php" class="card-link">Klik disini</a>
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  const eye = document.getElementById('eye');
  const pass = document.getElementById('pass');
  const password = document.getElementById('password');
  pass.addEventListener('click', function() {
    if (password.type === "password") {
      password.type = "text";
      eye.className = 'fa-solid fa-eye-slash'
    } else {
      password.type = "password";
      eye.className = 'fa-solid fa-eye'
    }
  });
</script>
<?php

include('component/footer.php');
