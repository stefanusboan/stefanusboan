<?php $this->load->view('header'); ?>
<br><br>
<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(<?php echo base_url('upload/' . $detail[0]->gambar); ?>);">
      </div>
      <div class="col-md-6 wrap-about py-4 py-md-5 ftco-animate">
        <div class="heading-section">
          <div class="pl-md-5">
            <span class="subheading mb-2"><?php echo $this->all_model->format_harga($detail[0]->harga); ?></span>
            <h2><?php echo $detail[0]->nama_produk; ?></h2>
          </div>
        </div>
        <div class="pl-md-5">
          <p><?php echo $detail[0]->deskripsi; ?></p>
          <form class="" action="<?php echo base_url('sewa/tambah_sewa') ?>" method="post">
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal</label>
              <input type="hidden" name="produk_id" value="<?php echo $detail[0]->produk_id; ?>" required>
              <input class="form-control" type="hidden" name="nama_produk" value="<?php echo $detail[0]->nama_produk; ?>" required>
              <input class="form-control" type="hidden" name="harga" value="<?php echo $detail[0]->harga; ?>" required>
              <input class="form-control" type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Waktu</label>
              <select class="form-control qnty-chrt" name="qty" required>
                <option value="1">08.00 - 10.00</option>
                <option value="2">10.00 -13.00 </option>
                <option value="3">14.00 - 16.00</option>
                <option value="4">17.00 -19.00 </option>
              </select>
            </div>
            <div class="form-group">
              <label></label>
              <button type="submit" role="button" class="btn btn-success btn-block">Booking</button>
            </div>
          </form>
        </div>
        <div class="heading-section">
          <div class="pl-md-5">
          <p>Harap Menaati Protokol Kesehatan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('footer'); ?>