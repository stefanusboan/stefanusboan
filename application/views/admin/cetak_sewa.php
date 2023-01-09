<style>
  @media print {
    .nop {
      display: none;
    }
  }

  @media print {
    .PrintOnly {
      font-size: 10pt;
      line-height: 120%;
      background: white;
    }
  }

  @media screen {
    .PrintOnly {
      display: none
    }
  }
</style>
<link rel="stylesheet" href="<?php echo base_url('theme/admin/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
<div class="PrintOnly">
  <div class="row justify-content-center">
    <div class="col-md-10 center-block" style="float:none">
      <table width="100%">
        <tr>
          <td width="35"><img src="<?php echo base_url('theme/logo.png') ?>" width="100%"></td>
          <td width="10"></td>
          <td width="55">
            <h2>Kembar Wedding Organizer</h2>
            <b>No. Telp : 082298225750 | IG : Kembar Wedding | FB : Pudji Asmini</b>
          </td>
        </tr>
      </table>
      <center>
        <h4>Laporan Transaksi Jasa Wedding Organizer</h4>
        <h5><?php echo $this->all_model->format_tanggal($_GET['tgl1']) . ' - ' . $this->all_model->format_tanggal($_GET['tgl1']); ?></h5>
      </center>
      <br>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Nama Jasa</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Total Bayar</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0;
          if (!empty($transaksi)) :
            foreach ($transaksi as $key => $p) {
              $total = $total + $p->harga;
              $no = $key + 1;
              if ($p->status == '0') {
                $status = '<label class="label label-default">Menunggu</label>';
              } elseif ($p->status == '2') {
                $status = '<label class="label label-warning">Kembali</label>';
              } else {
                $status = '<label class="label label-success">Disetujui</label>';
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
              echo '<td>' . $nilai . '</td>';
              echo '<td>' . $this->all_model->format_harga($p->harga) . '</td>';
              echo '<td>' . $status . '</td>';
              echo '</tr>';
            }
          endif; ?>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total Transaksi</th>
            <th><?php echo $this->all_model->format_harga($total) ?></th>
          </tr>
        </tfoot>
      </table>

    </div>
  </div>
  <div class="row">
    <div class="col-md-9 center-block" style="float:none">
      <h4 class="text-right">Yang Mengetahui</h4>
    </div>
  </div>
</div>
<!-- <center><a href="#" onclick="print();" id="btn"  class="nop">Cetak</a></cetak> -->
<script>
  window.onload = function() {
    print()
  };
</script>