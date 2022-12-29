<?php
if (isset($_POST['submit'])) {
  extract($_POST);

  include('config/crud.php');
  $table = 'users';
  $condition = "username='" . $username . "' and password='" . $password . "'";
  $read = read($table, "*", true, $condition, 'Login Berhasil');
  if ($read) {
    session_start();
    $_SESSION['id'] = $read->id;
    $_SESSION['username'] = $read->username;
    if ($read->id_level == 1) {
      header("location:admin/index.php");
    } else {
      header("location:users/index.php");
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
        <div class="card" style="width: 25rem;">
          <div class="card-body">
            <form action="" method="POST">
              <h2 class="card-title">Login</h2>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class=" form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
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
<?php

include('component/footer.php');
