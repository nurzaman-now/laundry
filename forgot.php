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
    $create = create('token', 'id, token, tanggal', '"' . $users[1][0] . '","' . $token . '","' . date("Y-m-d h:m:s", time()) . '"');
    if ($create) {
      $smtp = smtp_mail($users[1][1], 'Forgot Password', '<h2>token anda untuk mengubah password adalah : ' . $token . '</h2>', 'Admin Laundry Beautiful');
      if ($smtp)
        echo ('<script>
        alert("Kode Verifikasi sudah dikirim")
        window.location.href="forgot_next.php";
        </script>');
    } else {
      echo ('<script>alert("Gagal")</script>');
      header("location:forgot.php");
    }
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
              <div class="mb-3">
                Sudah punya token? <a href="forgot_next.php" class="card-link">Klik disini</a>
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
