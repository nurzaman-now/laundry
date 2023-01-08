<?php
include('component/header.php');
include('component/navbar.php');

$table = 'order_detail';
if (isset($_POST['update'])) {
  extract($_POST);
  $column = "status='" . $status . "'";
  $condition = "id_order_detail=" . $_POST['id_order'];
  update($table, $column, $condition, 'Berhasil Mengubah Status');
  echo ('<script>window.location= "order.php";</script>');
}
$read = read($table, "*");
?>
<!-- Page content-->
<div class="container-fluid pt-3">
  <div class="card">
    <div class="card-body">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section">Table Order</h2>
            </div>
          </div>
          <div class="row text-left">
            <div class="col-md-12">
              <div class="table-wrap table-responsive">
                <table table id="tables" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Id</th>
                      <th>Total Biaya</th>
                      <th>Pengambilan</th>
                      <th>Pengiriman</th>
                      <th>No Telpon</th>
                      <th>Alamat</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($read) {
                      $count = '1';
                      while ($row = $read->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $count++ . '</td>';
                        echo '<td>' . $row->id . '</td>';
                        echo '<td>' . $row->total_price . '</td>';
                        echo '<td>' . $row->pick_up . '</td>';
                        echo '<td>' . $row->delivery . '</td>';
                        echo '<td>' . $row->no_telp . '</td>';
                        echo '<td>' . $row->address . '</td>';
                        $stat = ['menunggu', 'pengambilan', 'pengiriman'];
                        $class = ['btn-primary', 'btn-warning', 'btn-success'];
                        echo '<td><button type="button" class="btn ' . $class[$row->status] . '" data-toggle="modal" data-target="#myModal' . $row->id_order_detail . '">' . $stat[$row->status] . '</button></td>';
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkOut' . $row->id_order_detail . '"><i class="fa-solid fa-eye"></i></button></td>';
                        echo '</tr>';
                        echo '
                          <div class="container mt-3">
                            <div class="modal fade" id="myModal' . $row->id_order_detail . '">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Mengubah status</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>

                                  <!-- Modal body -->
                                  <form action="" method="POST">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="hidden" name="id_order" value="' . $row->id_order_detail . '">
                                        <select name="status" id="status" class="form-control">';
                        for ($i = 0; $i < 3; $i++) {
                          echo '<option value="' . $i . '"';
                          if ($row->status == $i) {
                            echo 'selected';
                          }
                          echo '>' . $stat[$i] . '</option>';
                        }
                        echo '              
                                        </select>
                                      </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="update">Submit</button>
                                    </div>
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div> ';
                        echo '<div class="modal fade" id="checkOut' . $row->id_order_detail . '">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Pesan sekarang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      
                                          <h4 class="card-title">Detail pesanan</h4>
                                          <div class="row">
                                            <div class="col"><h5>Nama Service</h5></div>
                                            <div class="col"><h5>Type Service</h5></div>
                                            <div class="col"><h5>Total barang</h5></div>
                                          </div>';
                        $order1 = read(
                          'order_add',
                          'order_detail.id_order_detail, id_order_add, service_name, service_type, total_item, status',
                          ' JOIN order_temp on order_temp.id_order_temp=order_add.id_order_temp JOIN order_detail ON order_detail.id_order_detail=order_add.id_order_detail JOIN service_upload ON service_upload.id_service_upload=order_temp.id_service_upload JOIN service_type ON service_type.id_service_type=service_upload.id_service_type WHERE order_add.id_order_detail="' . $row->id_order_detail . '"'
                        );
                        while ($rowD = $order1->fetch_object()) {
                          if ($rowD->id_order_detail == $row->id_order_detail)
                            echo '
                          <div class="row ">
                            <div class="col">' . $rowD->service_name . '</div>
                            <div class="col">' . $rowD->service_type . '</div>
                            <div class="col">' . $rowD->total_item . '</div>
                          </div>
                          ';
                        }
                        echo '
                                    </div>
                                  </div>
                                </div>
                              </div>
                      ';
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
</div>

<?php
include('component/footer.php');
?>