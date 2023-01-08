<div class="card collapse mb-3" id="check_out">
  <div class="card-header text-right">
    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#check_out">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
  <div class="card-body">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Pesanan Anda</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrap table-responsive">
              <table table id="tables" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Code order</th>
                    <th>Jumlah jenis barang</th>
                    <th>Total harga</th>
                    <th>Tanggal pengambilan</th>
                    <th>Tanggal pengiriman</th>
                    <th>No telpon</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($order) {
                    $count = '1';
                    $total = 0;
                    while ($rowO = $order->fetch_object()) {
                      echo "<tr>";
                      echo "<td>" . $count++ . "</td>";
                      echo "<td>" . $rowO->order_code . "</td>";
                      echo "<td>" . $order->num_rows . "</td>";
                      echo "<td>" . $rowO->total_price . "</td>";
                      echo "<td>" . $rowO->pick_up . "</td>";
                      echo "<td>" . $rowO->delivery . "</td>";
                      echo "<td>" . $rowO->no_telp . "</td>";
                      echo "<td>" . $rowO->address . "</td>";
                      if ($rowO->status == 0)
                        echo "<td class='bg-primary'>Menunggu</td>";
                      elseif ($rowO->status == 1)
                        echo "<td class='bg-warning'>Diproses</td>";
                      else echo "<td class='bg-success'>Selesai</td>";
                      echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#checkOut" . $rowO->id_order_detail . "'><i class='fa-solid fa-eye'></i></button></td>";
                      echo "</tr>";
                      echo '<div class="modal fade" id="checkOut' . $rowO->id_order_detail . '">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Pesan sekarang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      
                                          <h4 class="card-title">Detail pesanan</h4>
                                          <div class="row">
                                            <div class="col"><h5>Nama Service</h5></div>
                                            <div class="col"><h5>Type Service</h5></div>
                                            <div class="col"><h5>Total barang</h5></div>
                                          </div>';
                      $order1 = read(
                        'order_add',
                        'order_detail.id_order_detail, id_order_add, service_name, service_type, total_item, status',
                        ' JOIN order_temp on order_temp.id_order_temp=order_add.id_order_temp JOIN order_detail ON order_detail.id_order_detail=order_add.id_order_detail JOIN service_upload ON service_upload.id_service_upload=order_temp.id_service_upload JOIN service_type ON service_type.id_service_type=service_upload.id_service_type WHERE order_temp.id="' . $id . '" AND order_add.id_order_detail="' . $rowO->id_order_detail . '"'
                      );
                      while ($rowD = $order1->fetch_object()) {
                        echo '
                          <div class="row ">
                            <div class="col">' . $rowD->service_name . '</div>
                            <div class="col">' . $rowD->service_type . '</div>
                            <div class="col">' . $rowD->total_item . '</div>
                          </div>
                          ';
                      }
                      echo '
                                    </div>
                                  </div>
                                </div>
                              </div>
                      ';
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