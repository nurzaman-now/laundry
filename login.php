<?php
ob_start();
if (isset($_POST['submit'])) {
  extract($_POST);

  include('config/crud.php');
  $table = 'users';
  $condition = " WHERE email='" . $email . "' and password='" . $password . "'";
  $read = read($table, "*", $condition);
  if ($read) {
    $row = $read->fetch_object();
    session_start();
    $_SESSION['id'] = $row->id;
    $_SESSION['username'] = $row->username;
    $_SESSION['id_level'] = $row->id_level;
    if ($row->id_level == 1) {
      echo ('<script>alert("login admin berhasil")</script>');
      header("location:admin/index.php");
    } else {
      echo ('<script>alert("login berhasil")</script>');
      header("location:users/index.php");
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
                <input type="text" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
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
<?php

include('component/footer.php');
