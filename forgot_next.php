<?php
if (isset($_POST['submit'])) {
  extract($_POST);
  include('config/crud.php');
  include('send_mail.php');

  if ($repassword != $password) {
    echo ('<script>alert("Repassword tidak sama");</script>');
  } else {
    $table = 'users';
    $condition = " JOIN token ON token.id=users.id WHERE token.token='" . $token . "'";
    $read = read($table, "users.id", $condition);
    if ($read) {
      $row = $read->fetch_object();
      $pass = password_hash($password, PASSWORD_DEFAULT);
      $update = update($table, 'password="' . $pass . '"', 'id="' . $row->id . '"');
      if ($update) {
        deletedb('token', 'id="' . $row->id . '"', 'Berhasil mereset password');
        echo ('<script>
        window.location.href="login.php";
        </script>');
      }
    } else {
      echo ('<script>
        alert("gagal meriset password. token invalid")
        window.location.href="forgot_next.php";
        </script>');
    }
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
              <h2 class="card-title">Lupa password</h2>
              <div class="form-group">
                <label for="token">Token</label>
                <input type="number" class="form-control" id="token" name="token" placeholder="Silahkan masukan token anda" required>
              </div>
              <div class="form-group">
                <label for="password">Password Baru</label>
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Silahkan Masukan password baru" id="password" name="password" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="pass"><i class="fa-solid fa-eye" id="eye"></i></button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="repassword">Password Baru</label>
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Silahkan Masukan kembali password baru" id="repassword" name="repassword" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="pass2"><i class="fa-solid fa-eye" id="eye2"></i></button>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
  const eye2 = document.getElementById('eye2');
  const pass = document.getElementById('pass');
  const pass2 = document.getElementById('pass2');
  const password = document.getElementById('password');
  const repassword = document.getElementById('repassword');
  pass.addEventListener('click', function() {
    if (password.type === "password") {
      password.type = "text";
      eye.className = 'fa-solid fa-eye-slash'
    } else {
      password.type = "password";
      eye.className = 'fa-solid fa-eye'
    }
  });
  pass2.addEventListener('click', function() {
    if (repassword.type === "password") {
      repassword.type = "text";
      eye2.className = 'fa-solid fa-eye-slash'
    } else {
      repassword.type = "password";
      eye2.className = 'fa-solid fa-eye'
    }
  });
</script>
<?php

include('component/footer.php');
