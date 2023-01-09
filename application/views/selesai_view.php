<?php $this->load->view('header') ?>
<br><br>
<div class="container">
  <div class="col-sm-12">

    <div class="panel panel-default" id="print">
      <div class="panel-body">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" disabled name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" disabled name="email" data-parsley-type="email" value="<?php echo $this->session->userdata('email') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input type="text" disabled name="notelp" data-parsley-type="number" value="<?php echo $this->session->userdata('notelp') ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" disabled class="form-control" required><?php echo $this->session->userdata('alamat') ?></textarea>
        </div>
        <br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sewa</th>
              <th>Waktu</th>
              <th>Tanggal</th>
              <th>Subtotal</th>
              <th class="noprint">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $this->cart->contents();
            if (!empty($data)) {
              $no = 1;
              foreach ($data as $k) {
                if ($k['waktu'] ==1) {
                  $nilai = "08.00 - 10.00";
                } elseif ($k['waktu'] ==2) {
                  $nilai = "10.00 - 12.00";
                } elseif ($k['waktu'] ==3) {
                  $nilai = "13.00 - 15.00";
                } elseif ($k['waktu'] ==4) {
                  $nilai = "15.00 - 17.00";
                } else {
                  $nilai = "19.00 - 21.00";
                }
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $k['name'] . '</td>';
                echo '<td>' . $nilai . '</td>';
                echo '<td>' . $k['tanggal'] . '</td>';
                echo '<td>' . $this->all_model->format_harga($k['subtotal']) . '</td>';
                echo '<td><a href="' . base_url('sewa/hapus/' . $k['rowid']) . '" class="noprint">Hapus</a></td>';
                echo '</tr>';
                $no++;
              }
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total</th>
              <th><?php echo $this->all_model->format_harga($this->cart->total()); ?></th>
              <th class="noprint"></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="panel-footer noprint">
        <a href="<?php echo base_url('sewa/tutup') ?>" class="btn btn-primary  pull-right">Selesai</a>
        <bR><br>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer') ?>