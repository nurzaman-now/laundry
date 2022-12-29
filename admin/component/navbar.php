<?php $location = $_SERVER['REQUEST_URI'];
if (strpos($location, 'index')) {
  $index = 'active';
}
if (strpos($location, 'service_type')) {
  $st = 'active';
}
if (strpos($location, 'service_upload')) {
  $su = 'active';
}
if (strpos($location, 'order')) {
  $order = 'active';
}
if (strpos($location, 'users')) {
  $users = 'active';
}
?>
<div class="d-flex" id="wrapper">
  <!-- Sidebar-->
  <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">
      <img src="../images/logo.png" width="20" alt="">
      Laundry Beatiful
    </div>
    <div class="list-group list-group-flush">
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $index ?>" href="index.php">Dashboard</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $st ?>" href="service_type.php">Service Type</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $su ?>" href="service_upload.php">Service Add</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $order ?>" href="order.php">Order</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $users ?>" href="users.php">Users</a>
      <a class="list-group-item list-group-item-action list-group-item-danger p-3" href="../logout.php">Logout</a>
    </div>
  </div>
  <!-- Page content wrapper-->
  <div id="page-content-wrapper">
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <div class="container-fluid">
        <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
          </ul>
        </div>
      </div>
    </nav>