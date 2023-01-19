<?php
if (isset($_POST['submit'])) {
  extract($_POST);
  include('config/crud.php');
  include('send_mail.php');
  $table = 'users';
  $condition = " WHERE id_level='1' OR email='" . $email . "'";
  $read = read($table, "*", $condition);
  if ($read) {
    $index = 0;
    $users = [];
    $token = random_int(0, 9999);
    while ($row = $read->fetch_object()) {
      $users[$index] = [$row->id, $row->email];
      $index++;
    }
    // echo ('<script>alert("' . $users[1][0] . ',' . $token . ',' . date("Y-m-d h:m:s", time()) . '")</script>');
    // create token
    // $create = create('forgot_password', 'id, token, tanggal', '"' . $users[1][0] . '","' . $token . '","' . date("Y-m-d h:m:s", time()) . '"');
    // if ($create) {
    send($users[0][1], $users[1][1], 'Forgot Password',  'token anda untuk mengubah password' . $token, 'Berhasil Mengirimkan token untuk merubah pasword');
    header("location:login.php");
    // } else {
    //   echo ('<script>alert("Gagal")</script>');
    //   header("location:forgot.php");
    // }
  } else {
    echo ('<script>alert("Gagal")</script>');
    header("location:forgot.php");
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
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Silahkan masukan email sesuai akun anda" required>
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
