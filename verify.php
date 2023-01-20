<?php
ob_start();
session_start();
if (isset($_POST['submit'])) {
  include('config/crud.php');
  include('send_mail.php');
  $from_name = 'Admin Laundry Beautiful';
  $table = 'token';
  $read = read($table, "*");
  $there = '';
  $token2 = '';
  if ($read) {
    while ($row = $read->fetch_object()) {
      if ($row->id = $_SESSION['id']) {
        $there = $row->id;
        $token2 = $row->token;
      }
    }
  }
  if ($there == '') {
    // echo ('<script>alert("' . $_SESSION['id'] . '")</script>');
    $token = random_int(0, 9999);
    $create = create('token', 'id, token, tanggal', '"' . $_SESSION['id'] . '","' . $token . '","' . date("Y-m-d h:m:s", time()) . '"');
    $message = '<h2>Untuk memverifikasi akun anda silahkan klik disini 
      <a href="' . $_SERVER["SERVER_NAME"] . '/verifing.php?id=' . $_SESSION['id'] . '&token=' . $token . '">Klik disini!</a></h2>';
    $smtp = smtp_mail($_SESSION['email'], 'Account Verification', $message, $from_name);
    if ($smtp) {
      echo ('<script>alert("Berhasil mengirim kode verifikasi")</script>');
      session_unset();
      session_destroy();
      header("location:login.php");
    } else {
      echo ('<script>alert("mengirim kode verifikasi gagal")</script>');
    }
  } else {
    $message2 = 'Untuk memverifikasi akun anda silahkan klik disini 
    <a href="' . $_SERVER["SERVER_NAME"] . '/verifing.php?id=' . $_SESSION['id'] . '&token=' . $token2 . '">Klik disini!</a>';
    $smtp = smtp_mail($_SESSION['email'], 'Account Verification', $message2, $from_name);
    if ($smtp) {
      echo ('<script>alert("Berhasil mengirim kode verifikasi")</script>');
      session_unset();
      session_destroy();
      header("location:login.php");
    } else {
      echo ('<script>alert("mengirim kode verifikasi gagal")</script>');
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
              <h2 class="card-title">Verifikasi Email</h2>
              <div class="">
                <h4>Kode verifikasi belum terkirim?</h4>
                <button type="submit" class="btn btn-primary" name="submit">Kirim ulang</button>
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
