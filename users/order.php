<?php
include('component/header.php');
include('component/navbar.php');
include('../config/crud.php');
$id = $_SESSION['id'];
$table = 'service_upload';
$condition = ' INNER JOIN service_type ON service_upload.id_service_type=service_type.id_service_type';
$read = read($table, 'service_name, service_type, dry_price, laundry_price', $condition);

?>
<main role="main" class="flex-shrink-0">
  <div class="container mt-5 mb-5 pt-5 pb-5" style="min-height: 650px;">
    <div class="row mb-lg-5">
      <?php
      while ($row = $read->fetch_object()) { ?>
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <img src="../images/logo.png" class="mr-3" style="width:100px">
              <h1><?= $row->service_name ?></h1>
              <h5><?= $row->service_type ?></h5>
              <p>Rp. <?= $row->laundry_price ?>/Kg</p>
              <p>Biaya Pengeringan Rp. <?= $row->dry_price ?>/Kg</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#update">
                <i class="fa fa-pencil"></i> Order
              </button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</main>
<?php
include('component/footer.php');
?>