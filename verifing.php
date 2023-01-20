<?php
ob_start();
session_start();
include('config/crud.php');

$id =  $_GET['id'];
$token = $_GET['token'];
$read = read('token', '*', ' WHERE id="' . $id . '" AND token="' . $token . '"');
if ($read) {
  update('users', 'active="1"', 'id="' . $id . '"');
  deletedb('token', 'id="' . $id . '"', 'Berhasil memverifikasi akun');
  echo ('<script>
  window.location.href="login.php";
  </script>');
} else {
  echo ('<script>
  alert("Gagal memverifikasi akun")
  window.location.href="login.php";
  </script>');
}
