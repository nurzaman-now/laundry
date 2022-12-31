<?php
include('component/header.php');
include('component/navbar.php');
include('../config/crud.php');
$id = $_SESSION['id'];
if (isset($_POST['submit'])) {
  extract($_POST);
  $table2 = 'order_temp';
  $column = "id_service_upload, id, total_item, status_temp";
  $value = "'" . $id_service_upload . "','" . $id . "','" . $total_item . "','0'";
  create($table2, $column, $value, 'Berhasil Memesan silahkan lihat pesanan anda');
  echo ('<script>window.location= "order.php";</script>');
}
$table = 'service_upload';
$condition = ' INNER JOIN service_type ON service_upload.id_service_type=service_type.id_service_type';
$read = read($table, 'id_service_upload, service_name, service_type, dry_price, laundry_price', $condition);
?>
<main role="main" class="flex-shrink-0">
  <div class="container mt-5 mb-5 pt-5 pb-5" style="min-height: 650px;">
    <div class="row">
      <?php
      while ($row = $read->fetch_object()) { ?>
        <div class="col-md-6 mb-3">
          <div class="card p-2">
            <a type="button" class="text-dark text-decoration-none" data-toggle="modal" data-target="#service<?= $row->id_service_upload ?>">
              <div class="card-body">
                <img src="../images/logo.png" class="mr-3" style="width:100px">
                <h1><?= $row->service_name ?></h1>
                <h5><?= $row->service_type ?></h5>
                <p>Rp. <?= $row->laundry_price ?>/Kg</p>
                <p>Biaya Pengeringan Rp. <?= $row->dry_price ?>/Kg</p>
              </div>
            </a>
          </div>
          <div class="modal fade" id="service<?= $row->id_service_upload ?>">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Pesan sekarang</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="" method="post">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="total_item">Jumlah Barang</label>
                      <input type="number" class="form-control" name="id_service_upload" id="id_service_upload" value="<?= $row->id_service_upload ?>" hidden>
                      <input type="number" class="form-control" name="total_item" id="total_item" required>
                    </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit">Pesan</button>
                  </div>
                </form>
              </div>
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