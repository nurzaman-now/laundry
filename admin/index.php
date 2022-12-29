<?php
include('component/header.php');
include('component/navbar.php');
?>
<div class="container">
  <div class="row">
    <div class="col-2">
      <div class="main">
        <aside>
          <div class="sidebar left ">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>bootstrap develop</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboards </span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="dashboard">
                  <li class="active"><a href="#">CSS3 Animation</a></li>
                  <li><a href="#">General</a></li>
                </ul>
              </li>
              <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a> </li>
              <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="products">
                  <li class="active"><a href="#">CSS3 Animation</a></li>
                  <li><a href="#">General</a></li>
                </ul>
              </li>
              <li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>
              <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul class="sub-menu collapse" id="tables">
                  <li><a href=""> Static Tables</a></li>
                  <li><a href=""> Data Tables</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul class="sub-menu collapse" id="e-commerce">
                  <li><a href=""> Products grid</a></li>
                  <li><a href=""> Products list</a></li>
                </ul>
              </li>
              <li> <a href=""><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span> </a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
    <div class="col">
      <div class="jumbotron jumbotron-fluid" style="background-image: url('images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
        <div class="container" style="min-height: 700px;">
          <div class="row">
            <div class="col-1 mr-5">
              <img src="images/logo.png" width="100" class="d-inline-block align-top rounded-circle">
            </div>
            <div class="col-7 ml-4">
              <h1 class="display-4">Aplikasi Laundry</h1>
              <p class="lead">Memesan cepat secara online, siap Pick Up dan Delivery.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('component/footer.php');
