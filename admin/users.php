<?php
include('component/header.php');
include('component/navbar.php');

$table = 'users';
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
              <h2 class="heading-section">Table Users</h2>
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
                      <th>Username</th>
                      <th>Alamat</th>
                      <th>No Telpon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($read) {
                      $count = '1';
                      while ($row = $read->fetch_object()) {
                        if ($row->id_level != 1) {
                          echo "<tr><td>" . $count++ . "</td>";
                          echo '<td>' . $row->id . '</td>';
                          echo '<td>' . $row->username . '</td>';
                          echo '<td>' . $row->address . '</td>';
                          echo "<td>" . $row->no_telp . "</td></tr>";
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