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
          <div class="row">
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($read->num_rows > 0) {
                      $count = '1';
                      while ($row = $read->fetch_object()) {
                        if ($row->id_level != 1) {
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
                        }
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