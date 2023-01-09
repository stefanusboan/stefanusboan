<?php

/**
 *
 */
class Uploadbukti extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="' . base_url('login') . '"</script>';
    }
  }



  public function edit($id)
  {
    $data['transaksi'] = $this->all_model->get_transaksi(array('transaksi_id' => $id), 'transaksi');
    $this->load->view('uploadbukti', $data);
  }

  public function simpan()
  {

    if ($this->input->post()) {
      $config['upload_path']     = './uploads/bukti/';
      $config['allowed_types']        = '*';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload("img")) {
      } else {
        $data_update = $this->all_model->update(
          array(
            "bukti_tf"     => $this->upload->data("file_name")
          ),
          'transaksi'
        );

        $insert = $this->M_konfirmasi->insert($data_update);
        if ($insert) {
          # JIKA BERHASIL MASUKAN DB
          $this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Bukti Pembayaran Berhasil Di Upload</div>');
        } else {
          # JIKA GAGAL MASUKAN KE DB
          $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Pembayaran Gagal Di Upload</div>');
        }
      }
      redirect(site_url('akun'), 'refresh');
    }
  }
  public function simpan_bukti($id = null)
  {
    $transaksi_id = $this->input->post('transaksi_id');
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/upload/';
      $config['allowed_types']        = '*';
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'bukti'      => $filename,
        );
        $this->db->set($data_update);
        $this->db->where('transaksi_id', $transaksi_id);
        $this->db->update('transaksi');
        // $simpan = $this->all_model->update(array('produk_id'=>$produk_id),$data_update, 'produk');
        // if ($simpan) {
        $this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Bukti Pembayaran Berhasil Di Upload</div>');
        // redirect('akun');
        redirect(site_url('akun'), 'refresh');
        // }
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Pembayaran Gagal Di Upload</div>');
      redirect(site_url('akun'), 'refresh');
    }
  }
}
