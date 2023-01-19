<?php
include('component/header.php');
include('component/navbar.php');
?>
<div class="jumbotron jumbotron-fluid" style="background-image: url('images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
  <div class="container" style="min-height: 700px;">
    <div class="card">
      <!-- Maps lokasi laundry -->
      <div class="mapouter">
        <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=universitas amikom purwokerto&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://pdflist.com/" alt="pdf download">Pdf download</a></div>
        <style>
          .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
          }

          .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
          }

          .gmap_iframe {
            height: 400px !important;
          }
        </style>
      </div>

      <div class="card-body">
        <h5 class="card-title">Hubungi Kami</h5>
        <p class="card-text">Untuk info lebih lanjut</p>
      </div>
      <?php
      include 'config/crud.php';
      $read = read('users', "*", ' WHERE id_level="1"');
      $row = $read->fetch_object()  ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Email : <?= $row->email ?> </li>
        <li class="list-group-item">No Telpon : <?= $row->no_telp ?></li>
        <li class="list-group-item">Alamat : <?= $row->address ?></li>
      </ul>
    </div>
  </div>
</div>
<?php
include('component/footer.php');
