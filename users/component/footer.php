<footer class="footer md-auto py-2 bg-light" style="position:fixed; bottom: 0;  width: 100%;">
  <div class="container">
    <div class="row text-center">
      <div class="col"><a class="nav-link text-primary" href="profile.php"><i class="fa-solid fa-user fa-lg"></i><br>Profile</a></div>
      <div class="col"><a class="nav-link text-warning" href="order.php"><i class="fa-solid fa-shirt fa-lg"></i></i><br>Service</a></div>
      <div class="col"><a class="nav-link text-secondary" href="index.php"><i class="fa-solid fa-home fa-lg"></i></i><br>Home</a></div>
      <div class="col"><a class="nav-link text-success" href="cart.php"><i class="fa-solid fa-cart-shopping fa-lg"></i><br>Pesanan</a></div>

      <div class="col"><a class="nav-link text-danger" data-toggle="modal" data-target="#logout">
          <i class="fa fa-power-off fa-lg"></i><br> Logout
        </a></div>
    </div>
  </div>
  <div class="container">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tables').DataTable();
  })
</script>
</body>

</html>