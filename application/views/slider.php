<div class="header-end">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url('theme/user/images/basket.png')?>" alt="..." width="500" height="250">
                <div class="carousel-caption car-re-posn">
                    <h3>Harga Terjangkau</h3>
                    <span class="color-bar"></span>
                </div>
            </div>
            <div class="item">
              <img src="<?php echo base_url('theme/user/images/bola.jpg');?>" alt="..." width="625" height="400">
                <div class="carousel-caption car-re-posn">
                    <h3>Fasilitas Banyak</h3>
                    <span class="color-bar"></span>
                </div>
            </div>
          </div>

          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
