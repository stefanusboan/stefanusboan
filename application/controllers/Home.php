<?php

/**
 *
 */
class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['produk'] = $this->all_model->get_produk_limit(array(), 'produk');
    $this->load->view('home_view', $data);
  }
  public function tentang()
  {
    $this->load->view('tentang');
  }
  public function galeri()
  {
    $data['galeri'] = $this->all_model->get_galerifotohome(array(), 'produk');
    $this->load->view('galerifotohome', $data);
  }
}
