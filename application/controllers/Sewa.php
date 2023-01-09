<?php

/**
 *
 */
class Sewa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="' . base_url('login') . '"</script>';
    }
  }

  public function index()
  {
    $this->load->view('sewa_view');
  }

  public function tambah_sewa()
  {
    $trans = $this->all_model->get_where(
      array(
        'tanggal'     => $this->input->post('tanggal'),
        'waktu'  => $this->input->post('qty')
      ),
      'transaksi'
    );
    $nilai = $this->all_model->get_dimana(
      array(
        'tanggal'     => $this->input->post('tanggal'),
        'waktu'  => $this->input->post('qty')
      ),
      'transaksi'
    );
    if (!empty($trans)) {
      if (time() - $nilai->waktubooking < (7200)) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Mohon Maaf, Wedding Organizer Telah Di Booking, Silahkan Pilih Tanggal dan Waktu Yang Berbeda</div>');
        redirect('produk/detail/' . $this->input->post('produk_id'));
      } elseif ($nilai->status == '1') {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Mohon Maaf, Wedding Organizer Telah Di Booking, Silahkan Pilih Tanggal dan Waktu Yang Berbeda</div>');
        redirect('produk/detail/' . $this->input->post('produk_id'));
      } else {
        $produk_id    = $this->input->post('produk_id');
        $tanggal         = $this->input->post('tanggal');
        $qty          = $this->input->post('qty');
        $waktu        = $this->input->post('qty');
        $nama         = $this->input->post('nama_produk');
        $harga        = $this->input->post('harga');
        $data = array(
          'id'         => $tanggal,
          'produk_id'  => $produk_id,
          'qty'        => $qty,
          'tanggal'       => $tanggal,
          'waktu'      => $waktu,
          'price'      => $harga,
          'name'       => $nama,
        );
        $in = $this->cart->insert($data);
        if ($in) {
          redirect('sewa');
        }
      }
    } else {
      $produk_id    = $this->input->post('produk_id');
      $tanggal         = $this->input->post('tanggal');
      $qty          = $this->input->post('qty');
      $waktu        = $this->input->post('qty');
      $nama         = $this->input->post('nama_produk');
      $harga        = $this->input->post('harga');
      $data = array(
        'id'         => $tanggal,
        'produk_id'  => $produk_id,
        'qty'        => $qty,
        'tanggal'       => $tanggal,
        'waktu'      => $waktu,
        'price'      => $harga,
        'name'       => $nama,
      );
      $in = $this->cart->insert($data);
      if ($in) {
        redirect('sewa');
      }
    }
  }

  public function hapus($id)
  {
    $in = $this->cart->remove($id);
    if ($in) {
      redirect('sewa');
    }
  }

  public function simpan_sewa()
  {
    date_default_timezone_set('Asia/Jakarta');
    $data = $this->cart->contents();
    foreach ($data as $k) {
      $data_simpan = array(
        'user_id'    => $this->session->userdata('user_id'),
        'produk_id'  => $k['produk_id'],
        'tanggal'       => $k['tanggal'],
        'waktu'     => $k['waktu'],
        'harga'      => $k['subtotal'],
        'waktubooking' => time()
      );
      $this->all_model->insert($data_simpan, 'transaksi');
    }
    $this->cart->destroy();
    $this->session->set_flashdata('msg', '<div class="alert alert-success">Anda Berhasil Mem Booking Wedding Organizer, Silahkan lanjutkan melakukan Pembayaran</div>');
    redirect('akun');
  }


  public function tutup()
  {

  }
}
