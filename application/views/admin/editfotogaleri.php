<?php $this->load->view('admin/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Foto Galeri</h3>
            </div>
            <div class="box-body">
                <form data-parsley-validate action="<?php echo base_url('galeri/simpan_edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="hidden" name="fotogaleri_id" value="<?php echo (!empty($galeri[0]->fotogaleri_id)) ? $galeri[0]->fotogaleri_id : '' ?>">
                            <input class="form-control" type="text" name="judul_foto" value="<?php echo (!empty($galeri[0]->judul_foto)) ? $galeri[0]->judul_foto : '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea id="summernote" rows="10" name="keterangan" required><?php echo (!empty($galeri[0]->keterangan)) ? $galeri[0]->keterangan : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" accept="image/*" required><br>
                            <?php if (!empty($galeri[0]->gambar)) : ?>
                                <img src="<?php echo base_url('upload/' . $galeri[0]->gambar); ?>" width="100" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button class="btn btn-info" type="submit">Simpan</button>
                            <a class="btn btn-default" href="<?php echo base_url('galeri') ?>">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer') ?>