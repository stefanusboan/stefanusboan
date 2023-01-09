<?php $this->load->view('admin/header') ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Foto</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url('galeri/tambah') ?>" class="btn btn-primary ">Tambah</a>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Foto</th>
              <th>Keterangan</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($galeri)) :
              foreach ($galeri as $key => $p) {
                $no = $key + 1;
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $p->judul_foto . '</td>';
                echo '<td>' . $p->keterangan . '</td>';
            ?>
                <td><img width="150px" src="<?php echo base_url('galerifoto/' . $p->foto_galeri) ?>"></td>
            <?php
                echo '<td><a href="' . base_url('galeri/edit/' . $p->fotogaleri_id) . '"class="btn btn-info btn-xs">Edit</a>
                    <a href="' . base_url('galeri/hapus/' . $p->fotogaleri_id) . '" class="btn btn-danger btn-xs">Hapus</a>              
                    </td>';
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