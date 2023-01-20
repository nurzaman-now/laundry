<?php
if (isset($_POST['submit'])) {
  extract($_POST);

  include('config/crud.php');
  include('send_mail.php');
  $table = 'users';
  $column = "email, username, password, address, no_telp, id_level";
  $password = password_hash($password, PASSWORD_DEFAULT);
  $value = "'" . $email . "','" . $username . "','" . $password . "','" . $address . "','" . $no_telp . "', '2'";
  $create = create($table, $column, $value, 'Berhasil Registrasi silahkan login');
  if ($create) {
    $read = read($table, '*', ' WHERE email="' . $email . '"');
    $row = $read->fetch_object();
    $token = random_int(0, 9999);
    $create = create('token', 'id, token, tanggal', '"' . $row->id . '","' . $token . '","' . date("Y-m-d h:m:s", time()) . '"');
    $message = '<h2>Untuk memverifikasi akun anda silahkan klik disini 
      <a href="' . $_SERVER["SERVER_NAME"] . '/verifing.php?id=' . $row->id . '&token=' . $token . '">Klik disini!</a></h2>';
    smtp_mail($email, 'Account Verification', $message, 'Admin Laundry Beautiful');
    header("location:login.php");
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
              <h2 class="card-title">Register</h2>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="no_telp">Nomor Telpon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp">
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address" id="address" cols="3" rows="5"></textarea>
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
