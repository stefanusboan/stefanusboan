<?php

class Galeri extends CI_Controller
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
    $data['galeri'] = $this->all_model->get_galeri(array(), 'galeri');
    $this->load->view('admin/galeri', $data);
  }

  public function edit($id)
  {
    $data['galeri'] = $this->all_model->get_galeri(array('fotogaleri_id' => $id), 'galeri');
    $this->load->view('admin/editfotogaleri', $data);
  }

  public function tambah()
  {
    $this->load->view('admin/tambahfotogaleri');
  }

  public function hapus($id)
  {
    $hapus = $this->all_model->delete(array('fotogaleri_id' => $id), 'galeri');
    if ($hapus) {
      redirect('galeri');
    }
  }

  public function simpan()
  {
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/galerifoto/';
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
          'judul_foto' => $this->input->post('judul_foto'),
          'keterangan'       => $this->input->post('keterangan'),
          'foto_galeri'      => $filename,
        );
        $simpan = $this->all_model->insert($data_update, 'galeri');
        if ($simpan) {
          redirect('galeri');
        }
      }
    }
  }

  public function simpan_edit()
  {
    $galeri_id = $this->input->post('fotogaleri_id');

    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/galerifoto/';
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
          'judul_foto' => $this->input->post('judul_foto'),
          'keterangan'       => $this->input->post('keterangan'),
          'foto_galeri'      => $filename,
        );
        $simpan = $this->all_model->update(array('fotogaleri_id' => $galeri_id), $data_update, 'galeri');
        if ($simpan) {
          redirect('galeri');
        }
      }
    }
  }
}
