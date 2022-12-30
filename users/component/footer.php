<footer class="footer md-auto py-2 bg-light" style="position:fixed; bottom: 0;  width: 100%;">
  <div class="container">
    <div class="row text-center">
      <div class="col"><a class="nav-link text-primary" href="profile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>Profile</a></div>
      <div class="col"><a class="nav-link text-success" href="order.php"><i class="fa fa-shopping-basket fa-2x"></i><br>Order</a></div>

      <div class="col"><a class="nav-link text-danger" data-toggle="modal" data-target="#logout">
          <i class="fa fa-power-off fa-2x"></i><br> Logout
        </a></div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="modal fade" id="logout">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Apakah anda yakin ingin keluar?
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a class="btn btn-danger" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</footer>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>