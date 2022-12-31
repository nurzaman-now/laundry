<?php
include('component/header.php');
include('component/navbar.php');

$table = 'service_type';
if (isset($_POST['submit'])) {
  extract($_POST);
  $column = "service_type";
  $value = "'" . $service_type . "'";
  create($table, $column, $value, 'Berhasil Menambahkan data service type');
  echo ('<script>window.location= "service_type.php";</script>');
}
if (isset($_POST['update'])) {
  extract($_POST);
  $column = "service_type='" . $service_type . "'";
  $condition = "id_service_type=" . $_GET['id_update'];
  update($table, $column, $condition, 'Berhasil Mengubah data service type');
  echo ('<script>window.location= "service_type.php";</script>');
}
if (isset($_GET['id_delete'])) {
  $condition = "id_service_type=" . $_GET['id_delete'];
  deletedb($table, $condition, "Berhasil menghapus Service type");
  echo ('<script>window.location= "service_type.php";</script>');
}
$read = read($table, "*");
?>
<!-- Page content-->
<div class="container-fluid pt-3">
  <div class="card mb-2">
    <div class="card-body">
      <?php if (isset($_GET['id_update'])) {
      ?>
        <h4 class="card-title">Mengubah Service Type</h4>
        <form method="POST">
          <div class="form-group">
            <label for="service_type">Service Type</label>
            <input type="text" class="form-control" id="service_type" name="service_type" value="<?php echo ($_GET['service']) ?>" required>
          </div>
          <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
      <?php
      } else { ?>
        <h4 class="card-title">Menambahkan Service Type</h4>
        <form method="POST">
          <div class="form-group">
            <label for="service_type">Service Type</label>
            <input type="text" class="form-control" id="service_type" name="service_type" required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      <?php } ?>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section">Table Service Type</h2>
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
                      <th>Service Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($read->num_rows > 0) {
                      $count = '1';
                      while ($row = $read->fetch_object()) {
                        echo "<tr><td>" . $count++ . "</td>";
                        echo '<td>' . $row->id_service_type . '</td>';
                        echo "<td>" . $row->service_type . "</td>";
                        echo "<td><a href='?id_update=" . $row->id_service_type . "&service=" . $row->service_type . "' class='btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i></a> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete" . $count . "'><i class='fa fa-trash'></i></button></td></tr>";

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
                                    <a href="?id_delete=' . $row->id_service_type . '" class="btn btn-danger ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>';
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