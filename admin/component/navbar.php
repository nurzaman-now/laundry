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
include('../config/crud.php');
$tab = 'order_detail';
$badge = read($tab, '*');
?>
<div class="d-flex" id="wrapper">
  <!-- Sidebar-->
  <div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">
      <img src="../images/logo.png" width="20" alt="">
      Laundry Beatiful
    </div>
    <div class="list-group list-group-flush">
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $index ?>" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $st ?>" href="service_type.php"><i class="fa fa-gear" aria-hidden="true"></i> Service Type</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $su ?>" href="service_upload.php"><i class="fa fa-gear" aria-hidden="true"></i> Service Add</a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $order ?>" href="order.php"><i class="fa fa-shopping-basket"></i> Order <span class="badge badge-pill badge-warning text-dark"><?php if ($badge) $badge->num_rows ?></span></a>
      <a class="list-group-item list-group-item-action list-group-item-light p-3 <?= $users ?>" href="users.php"><i class="fa fa-users"></i> Users</a>
      <button type="button" class="list-group-item list-group-item-action list-group-item-danger p-3" data-toggle="modal" data-target="#logout">
        <i class="fa fa-power-off"></i> Logout
      </button>
    </div>
    <div class="container mt-3">
      <div class="modal fade" id="logout">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              Apakah anda yakin ingin keluar?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <a class="btn btn-danger" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>

          </div>
        </div>
      </div>
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