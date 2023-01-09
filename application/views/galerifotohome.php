<?php $this->load->view('header'); ?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Galeri Kembar Wedding Organizer</h2>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($galeri)) {
                foreach ($galeri as $key => $p) {
                    echo
                    '
          <div class="col-md-4 ftco-animate">
          <center>
          <div class="blog-entry">
            <img src="' . base_url('galerifoto/' . $p->foto_galeri) . '" width="100%" style="height:300px; object-fit:cover;border-radius:5%;">
            <div class="text mt-3">
            <div class="meta mb-2 text-center">
            <h4 class="text-center text-primary"><a>' . $p->judul_foto . '</a></h4>
            <div ><a><b class="text-dark">' . $p->keterangan . '</b></a></div>
          </div>
            </div>

          </div>
        </div>
            ';
                }
            } ?>

        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>