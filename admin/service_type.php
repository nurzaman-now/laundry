<?php
include('component/header.php');
include('component/navbar.php');

include('../config/crud.php');
$table = 'service_type';
$read = read($table, "*");
?>
<!-- Page content-->
<div class="container-fluid pt-3" style="background-image: url('../images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
  <div class="card mb-2">
    <div class="card-body">
      <h4 class="card-title">Menambahakan Service Type</h4>
      <form>
        <div class="form-group">
          <label for="service_type">Service Type</label>
          <input type="password" class="form-control" id="service_type">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

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
              <div class="table-wrap">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Service Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count1 = '0';
                    while ($row = $read->fetch_object()) {
                      $count1++;
                      echo "<tr><td>" . $row->id_service_type . "</td>";
                      echo "<td>" . $row->service_type . "</td>";
                      echo  "<td><a href='update.php' class='btn btn-warning'>Update</a><a href='delete.php' class='btn btn-danger ml-2'>Delete</a></td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/popper.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <script src="../assets/js/main.js"></script>
    </div>
  </div>
</div>

<?php
include('component/footer.php');
?>