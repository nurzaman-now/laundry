<?php
include('component/header.php');
include('component/navbar.php');
include('../config/crud.php');
$id = $_SESSION['id'];
$table = 'order_temp';
$condition = ' JOIN service_upload ON service_upload.id_service_upload=order_temp.id_service_upload JOIN service_type ON service_upload.id_service_type=service_type.id_service_type WHERE id="' . $id . '" AND ' . 'status_temp="0"';
$read = read($table, 'id_order_temp, id, total_item, service_upload.id_service_upload, service_name, service_type, dry_price, laundry_price', $condition);

if (isset($_POST['submit'])) {
  extract($_POST);
  $table2 = 'order_detail';
  $column = "id, order_code, total_price, pick_up, delivery, no_telp, address, status";
  $order_code = 'CO-' . rand();
  $value = "'" . $id . "','" . $order_code . "','" . $total . "','" . $pick_up . "','" . $delivery . "','" . $no_telp . "','" . $address . "','0'";
  $create = create($table2, $column, $value, 'Berhasil check out silahkan tunggu pesanan sedang diproses');
  if ($create) {
    $read2 = read($table2, 'id_order_detail', ' WHERE no_telp="' . $no_telp . '"');

    $id_order_detail = 0;
    while ($row2 = $read2->fetch_object()) {
      $id_order_detail = $row2->id_order_detail;
    }
    while ($row = $read->fetch_object()) {
      create('order_add', 'id_order_temp, id_order_detail', '"' . $row->id_order_temp . '","' . $id_order_detail . '"');
      update($table, 'status_temp="1"', 'id_order_temp="' . $row->id_order_temp . '"');
    }
  }
  echo ('<script>window.location= "cart.php";</script>');
}
if (isset($_POST['update'])) {
  extract($_POST);
  $column = 'total_item="' . $total_item . '"';
  $condition2 = 'id_order_temp="' . $id_order_temp . '"';
  update($table, $column, $condition2, 'Berhasil mengubah Jumlah pesanan');
  echo ('<script>window.location= "cart.php";</script>');
}
if (isset($_GET['id_delete'])) {
  deletedb($table, 'id_order_temp="' . $_GET['id_delete'] . '"', 'Berhasil menghapus pesanan anda');
  echo ('<script>window.location= "cart.php";</script>');
}

$user = read('users', '*', ' WHERE id="' . $id . '"');
$rowU = $user->fetch_object();
?>
<main role="main" class="flex-shrink-0">
  <div class="container mt-5 mb-5 pt-5 pb-5" style="min-height: 650px;">
    <?php
    $order = read('order_detail', '*', ' WHERE id="' . $id . '"');
    $order1 = read('order_add', 'id_order_add, order_detail.id_order_detail, service_name, service_type, total_item, status', ' JOIN order_temp on order_temp.id_order_temp=order_add.id_order_temp JOIN order_detail ON order_detail.id_order_detail=order_add.id_order_detail JOIN service_upload ON service_upload.id_service_upload=order_temp.id_service_upload JOIN service_type ON service_type.id_service_type=service_upload.id_service_type WHERE order_temp.id="' . $id . '"');
    include('check_out.php'); ?>
    <div class="card mb-3">
      <div class="card-header text-right">
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#check_out">
          <i class="fa-solid fa-cart-shopping"></i> Pesanan
        </button>
      </div>
      <div class="card-body">
        <section class="ftco-section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Pesanan Anda</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-wrap table-responsive">
                  <table table id="tables" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Service Name</th>
                        <th>Service Type</th>
                        <th>Harga Pengeringan</th>
                        <th>Harga laundy</th>
                        <th>Jumlah barang</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($read->num_rows > 0) {
                        $count = '1';
                        $total = 0;
                        while ($row = $read->fetch_object()) {
                          echo "<tr><td>" . $count++ . "</td>";
                          echo "<td>" . $row->service_name . "</td>";
                          echo "<td>" . $row->service_type . "</td>";
                          echo "<td>" . $row->dry_price . "</td>";
                          echo "<td>" . $row->laundry_price . "</td>";
                          echo "<td>" . $row->total_item . "</td>";
                          echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update" . $count . "'><i class='fa fa-pencil'></i></button> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete" . $count . "'><i class='fa fa-trash'></i></button></td></tr>";
                          echo '
                          <div class="container mt-3">
                            <div class="modal fade" id="update' . $count . '">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>

                                 <form action="" method="post">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="total_item">Jumlah Barang</label>
                                        <input type="number" class="form-control" name="id_order_temp" id="id_order_temp" value="' . $row->id_order_temp . '" hidden>
                                        <input type="number" class="form-control" name="total_item" id="total_item" value="' . $row->total_item . '" required>
                                      </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    </div>
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>';
                          echo '
                          <div class="container mt-3">
                            <div class="modal fade" id="delete' . $count . '">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    Apakah anda yakin ingin menghapusnya?
                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <a href="?id_delete=' . $row->id_order_temp . '" class="btn btn-danger ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>';
                          $total += ($row->dry_price + $row->laundry_price) * $row->total_item;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php
    if ($read->num_rows > 0) { ?>
      <div class="card mb-3">
        <div class="card-body">
          <section class="ftco-section">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                  <h2 class="heading-section">Check Out</h2>
                </div>
              </div>
              <form action="" method="post">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="pick_up">Tanggal pengambilan barang</label>
                      <input type="date" class="form-control" name="pick_up" id="pick_up" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="delivery">Tanggal pengiriman barang</label>
                      <input type="date" class="form-control" name="delivery" id="delivery" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <textarea class="form-control" name="address" id="address" cols="10" rows="3"><?= $rowU->address ?></textarea>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="no_telp">No Telpon</label>
                      <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $rowU->no_telp ?>" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="total">Total Pembayaran</label>
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="total" id="total" value="<?= $total ?>" readonly required>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit" name="submit">Check Out</button>
                  </div>
                </div>
              </form>
          </section>
        </div>
      </div>
    <?php } ?>
</main>
<?php
include('component/footer.php');
?>
