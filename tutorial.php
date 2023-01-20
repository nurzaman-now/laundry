<?php
include('component/header.php');
include('component/navbar.php');
?>
<div id="accordion">
  <div class="container-fluid bg-light text-center">
    <button class="btn btn-link" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="collapseOne">
      Register
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#verify" aria-expanded="true" aria-controls="collapseOne">
      Email verifikasi
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#login" aria-expanded="true" aria-controls="collapseOne">
      Login
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#forgot" aria-expanded="true" aria-controls="collapseOne">
      forgot
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#home" aria-expanded="true" aria-controls="collapseOne">
      Home
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#profile" aria-expanded="true" aria-controls="collapseOne">
      Profile
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#service" aria-expanded="true" aria-controls="collapseOne">
      pilih jenis pakaian
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#jumlah" aria-expanded="true" aria-controls="collapseOne">
      Buat jumlah pesanan
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#pesanan" aria-expanded="true" aria-controls="collapseOne">
      Keranjang Pesanan
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#checkout" aria-expanded="true" aria-controls="collapseOne">
      Checkout
    </button>
    <button class="btn btn-link" data-toggle="collapse" data-target="#order" aria-expanded="true" aria-controls="collapseOne">
      Pesanan anda
    </button>
  </div>
  <div class="jumbotron jumbotron-fluid" style="background-image: url('images/laundry_image.png'); background-repeat: no-repeat; background-size: cover; background-position: center; background-color:deepskyblue;">
    <div class="container" style="min-height: 700px;">
      <h3 class="display-5">Tata cara menggunakan aplikasi Laundry Beautiful</h3>
      <div id="register" class="collapse show mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/registrasi.png" alt="poto registrasi" width="30%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Registrasi</h5>
            <p class="card-text">jika anda belum memiliki akun, lakukan registrasi untuk mendaftar. Registrasi dengan memasukkan email, username, password, no. telp, dan alamat lalu klik tombol submit</p>
            <a href="register.php" class="btn btn-primary">Register</a>
          </div>
        </div>
      </div>
      <div id="verify" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/verify.png" alt="poto registrasi" width="30%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Email Verifikasi</h5>
            <p class="card-text">Memverifikasi akun anda menggunakan link yang dikirimkan ke email anda.</p>
            <a href="register.php" class="btn btn-primary">Register</a>
          </div>
        </div>
      </div>
      <div id="login" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/login.png" alt="poto login" width="30%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Login</h5>
            <p class="card-text">Setelah Registrasi silahkan anda login pada website kami agar pesanan anda terkonfirmasi. dengan memasukkan email dan password yag sudah anda buat</p>
            <a href="login.php" class="btn btn-primary">Login</a>
          </div>
        </div>
      </div>
      <div id="forgot" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/forgot.png" alt="poto lupa password" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Lupa Password</h5>
            <p class="card-text">Jika anda lupa password bisa di ubah dengan cara mengirimkan token ke email.</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/forgot2.png" alt="poto lupa password" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Lupa password selanjutnya</h5>
            <p class="card-text">Masukan token yang sudah dikirim ke alamat email anda, dan silahkan ubah password dengan yang baru</p>
          </div>
        </div>
      </div>
      <div id="home" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/home.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Home</h5>
            <p class="card-text">Tampilan awal setelah anda masuk. disini ada menu Profil, Service, Home, Pesanan, dan Logout</p>
          </div>
        </div>
      </div>
      <div id="profile" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/profile.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <p class="card-text">pada menu profile anda dapat mengubahnya (jika ingin di ubah)</p>
          </div>
        </div>
      </div>
      <div id="service" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/service.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Service</h5>
            <p class="card-text">lalu ke menu service, didalam menu service ada beberapa yang perlu anda perhatikan karena disini anda di perintahkan untuk memilih jenis pakaian apa yang anda laundry dan harga.</p>
          </div>
        </div>
      </div>
      <div id="jumlah" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/jumlah.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Jumlah pesanan</h5>
            <p class="card-text">menentukan jumlah pakaian yang akan di order</p>
          </div>
        </div>
      </div>
      <div id="pesanan" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/order.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Keranjang pesanan</h5>
            <p class="card-text">pada menu pesanan terdapat beberapa menu yaitu code order, jumlah dari jenis barang. dan anda bisa mengubah jumlah dan juga bisa menghapusnya.</p>
          </div>
        </div>
      </div>
      <div id="checkout" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/checkout.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Checkout</h5>
            <p class="card-text">Pada menu ini ada total harga, tanggal pengembalian, tanggal pengiriman, no. telp, alamat yang akan diproses oleh kami.</p>
          </div>
        </div>
      </div>
      <div id="order" class="collapse mb-2" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
          <div class="card-header text-center">
            <img src="images/tutorial/pesanan.png" alt="poto profile" width="70%">
          </div>
          <div class="card-body">
            <h5 class="card-title">Pesanan Anda</h5>
            <p class="card-text">anda tinggal klik button biru bertulisan pesanan maka akan muncul pesanan anda yang masih diproses admin. jika admin telah mngecek maka untuk status menunggu yang artinya orderan belum siap, jika pengiriman makan orderan akan di kirim dan jika pengambilan maka driver kami akan mengambilnya.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('component/footer.php');
