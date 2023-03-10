<?php
include('component/header.php');
include('component/navbar.php');
include('../config/crud.php');
$id = $_SESSION['id'];
$table = 'users';
$condition = 'id="' . $id . '"';
$read = read($table, '*', ' WHERE ' . $condition);
$row = $read->fetch_object();
if (isset($_POST['update'])) {
  extract($_POST);
  $ifpass = '';
  if ($password){
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $ifpass = ",password='" . $pass . "'";
  }

  $column = "email='" . $email . "',username='" . $username . "', no_telp='" . $no_telp . "', address='" . $address . "'" . $ifpass;
  update($table, $column, $condition, 'Berhasil Mengubah Profile');
  echo ('<script>window.location= "profile.php";</script>');
}
?>
<main role="main" class="flex-shrink-0">
  <div class="container mt-5 mb-5 pt-5 pb-5" style="min-height: 650px;">
    <div class="row mb-lg-5">
      <div class="col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <div class="media">
              <img src="../images/logo.png" class="mr-3" style="width:80px">
              <div class="media-body">
                <h4><?= $row->username; ?></h4>
                <p><?= $row->no_telp; ?></p>
                <p><?= $row->address; ?></p>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#update">
              <i class="fa fa-pencil"></i> Ubah Profile
            </button>
          </div>
        </div>
      </div>
      <div class="col collapse mb-3" id="update">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Profile</h4>
            <form method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?= $row->email; ?>" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="<?= $row->username; ?>" required>
              </div>
              <div id="pass" class="collapse">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" placeholder="Enter Password" id="password" name="password" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="no_telp">No Telpon</label>
                <input type="text" class="form-control" placeholder="Enter No Telpon" id="no_telp" name="no_telp" value="<?= $row->no_telp; ?>" required>
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address" id="address" cols="10" rows="3"><?= $row->address; ?></textarea>
              </div>

              <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#pass">
                <i class="fa fa-key"></i> Ubah password
              </button>
              <button type="submit" class="btn btn-primary" name="update">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include('component/footer.php');
?>