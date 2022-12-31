<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
  <script src="https://kit.fontawesome.com/64699173cd.js" crossorigin="anonymous"></script>
  <link href="../assets/css/styles.css" rel="stylesheet" />
  <link rel="icon" href="../../images/logo.png">
  <style>
    .card {
      padding: 1.5em .5em .5em;
      border-radius: 2em;
      text-align: center;
      box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }
  </style>
  <title>Laundry</title>
</head>

<body style="background-image: url('../images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center;">
  <?php
  session_start();
  if ($_SESSION['id_level'] != 1) {
    header("location:../");
  }
