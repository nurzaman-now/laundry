<?php
include('component/header.php');
include('component/navbar.php');

include('../config/crud.php');
$table = 'service_upload';
if (isset($_POST['submit'])) {
  extract($_POST);
  $column = "service_name,id_service_type,dry_price,laundry_price";
  $value = "'" . $service_name . "','" . $id_service_type . "','" . $dry_price . "','" . $laundry_price . "'";
  $create = create($table, $column, $value, 'Berhasil Menambahkan data service upload');
  echo ('<script>window.location= "service_upload.php";</script>');
}
if (isset($_POST['update'])) {
  extract($_POST);
  $column = "service_name='" . $service_name . "' , id_service_type='" . $id_service_type . "' , dry_price='" . $dry_price . "' , laundry_price='" . $laundry_price . "'";
  $condition = "id_service_upload=" . $_GET['id_update'];
  $create = update($table, $column, $condition, 'Berhasil Mengubah data service type');
  echo ('<script>window.location= "service_upload.php";</script>');
}
if (isset($_GET['id_delete'])) {
  $condition = "id_service_upload=" . $_GET['id_delete'];
  $delete = deletedb($table, $condition, "Berhasil menghapus Service type");
  echo ('<script>window.location= "service_upload.php";</script>');
}
$read = read($table, "*",);
?>
<!-- Page content-->
<div class="container-fluid pt-3" style="background-image: url('../images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
  <div class="card mb-2">
    <div class="card-body">
      <!-- mengubah data -->
      <?php if (isset($_GET['id_update'])) {
        $read_update = read($table, "*", "id_service_upload='" . $_GET['id_update'] . "'");
        $row_update = $read_update->fetch_object();
      ?>
        <h4 class="card-title">Mengubah Service Upload</h4>
        <form method="POST">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="service_name">Nama Service</label>
                <input type="text" class="form-control" id="service_name" name="service_name" value="<?= $row_update->service_name ?>" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="id_service_type">Type Service</label>
                <select name="id_service_type" id="id_service_type" class="form-control">
                  <?php $read_type = read("service_type", "*");
                  if ($read_type->num_rows > 0) {
                    while ($row = $read_type->fetch_object()) {
                      $selected = '';
                      if ($row_update->id_service_type == $row->id_service_type) {
                        $selected = 'selected';
                      }
                      echo "<option value='" . $row->id_service_type . "'" . $selected . ">" . $row->service_type . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="dry_price">Biaya Pengeringan</label>
                <input type="text" class="form-control" id="dry_price" name="dry_price" value="<?= $row_update->dry_price ?>" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="laundry_price">Biaya Laundry</label>
                <input type="text" class="form-control" id="laundry_price" name="laundry_price" value="<?= $row_update->laundry_price ?>" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
        <!-- menambah data -->
      <?php
      } else { ?>
        <h4 class="card-title">Menambahkan Service Upload</h4>
        <form method="POST">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="service_name">Nama Service</label>
                <input type="text" class="form-control" id="service_name" name="service_name" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="id_service_type">Type Service</label>
                <select name="id_service_type" id="id_service_type" class="form-control">
                  <?php $read_type = read("service_type", "*");
                  if ($read_type->num_rows > 0) {
                    while ($row = $read_type->fetch_object()) {
                      echo "<option value=" . $row->id_service_type . ">" . $row->service_type . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="dry_price">Biaya Pengeringan</label>
                <input type="text" class="form-control" id="dry_price" name="dry_price" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="laundry_price">Biaya Laundry</label>
                <input type="text" class="form-control" id="laundry_price" name="laundry_price" required>
              </div>
            </div>
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
              <h2 class="heading-section">Table Service Upload</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-wrap">
                <table table id="tables" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Id</th>
                      <th>Service Name</th>
                      <th>Biaya pengeringan</th>
                      <th>Biaya Laundry</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($read->num_rows > 0) {
                      $count = '1';
                      while ($row = $read->fetch_object()) {
                        echo "<tr><td>" . $count++ . "</td>";
                        echo '<td>' . $row->id_service_upload . '</td>';
                        echo "<td>" . $row->service_name . "</td>";
                        echo "<td>" . $row->dry_price . "</td>";
                        echo "<td>" . $row->laundry_price . "</td>";
                        echo  "<td><a href='?id_update=" . $row->id_service_upload . "' class='btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='?id_delete=" . $row->id_service_upload . "' class='btn btn-danger ml-2'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";
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