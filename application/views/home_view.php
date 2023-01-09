<?php $this->load->view('header'); ?>
  <div class="hero-wrap js-fullheight">
    <div class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image:url(https://anakunsri.com/wp-content/uploads/2017/05/wedding-organizer-palembang.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-7 ftco-animate">
              <div class="text w-100">
                <h2 class="text-white">Wedding Organizer Expert</h2>
                <h1 class="text-white">Jasa Wedding Organizer Profesional Expert</h1>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="slider-item js-fullheight" style="background-image:url(https://www.pranataprinting.com/wp-content/uploads/2019/02/Tips-Sukses-Bisnis-Wedding-Organizer-Pranata-Printing-1170x658.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
            <div class="col-md-6 ftco-animate">
              <div class="text w-100">
              <h2 class="text-white">Kembar Wedding Organizer Expert</h2>
                <h1 class="text-white">Jasa Wedding Organizer Profesional</h1>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>Booking Wedding Organizer Sekarang Juga</h2>
          <span class="subheading">Sesuai Protokol Kesehatan dan Keamanan</span>
        </div>
      </div>
      <div class="row d-flex">
        <?php
        if (!empty($produk)) {
          foreach ($produk as $key => $p) {
            echo
            '
  
          <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
           
            <div class="img"><img src="'.base_url('upload/'.$p->gambar).'" style="border-radius:5%;" alt="/" height="200" width="300"></div>
            <div class="text mt-3">
            <div class="meta mb-2 text-center">
            <div ><a href="#"><b>' . $this->all_model->format_harga($p->harga) . '</b></a></div>
          </div>
              <h3 class="heading text-center"><a href="#">'.$p->nama_produk.'</a></h3>
            </div>
            <p class="text-center"><a href="'.base_url('produk/detail/'.$p->produk_id).'" class="btn btn-primary">Beli</a>
          </div>
        </div>
            ';
          }
        } ?>

      </div>
    </div>
  </section>
  <?php $this->load->view('footer'); ?>
