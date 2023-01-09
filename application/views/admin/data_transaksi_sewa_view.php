<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Transaksi Booking Wedding Organizer</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Nama Jasa</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Bukti Pembayaran</th>
              <th>Total Bayar</th>
              <th>Status</th>
              <th>Setuju</th>
              <th>Tolak</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($transaksi)) :
              foreach ($transaksi as $key => $p) {
                $no = $key + 1;
                if ($p->status == '0') {
                  $status = '<label class="label label-default">Menunggu</label>';
                  // $aksi = '<a href="'.base_url('data_transaksi_sewa/setuju/'.$p->transaksi_id.'/'.$p->produk_id).'" class="btn btn-danger btn-xs">Setujui</a>';
                } elseif ($p->status == '2') {
                  $status = '<label class="label label-warning">Di Tolak</label>';
                  // $aksi = '-';
                } else {
                  // $aksi = '<a href="'.base_url('data_transaksi_sewa/kembali/'.$p->transaksi_id.'/'.$p->produk_id).'" class="btn btn-info btn-xs">Kembali</a>';

                  $status = '<label class="label label-success">Disetujui</label>';
                }
                if (!empty($p->bukti)) {
                  if ($p->status == '0') {
                    $setuju = '<a href="' . base_url('data_transaksi_sewa/setuju/' . $p->transaksi_id . '/' . $p->produk_id) . '" class="btn btn-info btn-xs">Setujui</a>';
                    $tolak = '<a href="' . base_url('data_transaksi_sewa/kembali/' . $p->transaksi_id . '/' . $p->produk_id) . '" class="btn btn-danger btn-xs">Tolak</a>';
                  } else {
                    $setuju = "-";
                    $tolak = "-";
                  }
                } else {
                  $setuju = "Belum Upload Bukti Pembayaran";
                  $tolak = "Belum Upload Bukti Pembayaran";
                }

                if ($p->waktu == 1) {
                  $nilai = "08.00 - 10.00";
                } elseif ($p->waktu == 2) {
                  $nilai = "10.00 - 12.00";
                } elseif ($p->waktu == 3) {
                  $nilai = "13.00 - 15.00";
                } elseif ($p->waktu == 4) {
                  $nilai = "15.00 - 17.00";
                } else {
                  $nilai = "19.00 - 21.00";
                }
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $p->nama_lengkap . '</td>';
                echo '<td>' . $p->nama_produk . '</td>';
                echo '<td>' . $p->nama_kategori . '</td>';
                echo '<td>' . $this->all_model->format_tanggal($p->tanggal) . '</td>';
                echo '<td>' . "Jam " . $nilai . '</td>';
                if (!empty($p->bukti)) {
                  echo '<td><img src="' . base_url('upload/' . $p->bukti) . '" width="100" alt=""><br><br><a target="_blank" href="' . base_url('upload/' . $p->bukti) . '" class="btn btn-primary btn-block text-center">Lihat</a></td>';
                } else {
                  echo '<td>Belum Upload Bukti Pembayaran</td>';
                }
                echo '<td>' . $this->all_model->format_harga($p->harga) . '</td>';
                echo '<td>' . $status . '</td>';
                echo '<td>' . $setuju . '</td>';
                echo '<td>' . $tolak . '</td>';
                echo '</tr>';
              }
            endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#example1').DataTable();
</script>
<?php $this->load->view('admin/footer') ?>