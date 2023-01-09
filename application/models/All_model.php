<?php

/**
 *
 */
class All_model extends CI_model
{

  public $table = "transaksi";

  public function __construct()
  {
    parent::__construct();
  }

  public function ambil_satu($syarat)
  {
    $this->db->where($syarat);
    return $this->db->get($this->table)->row();
  }

  public function format_tanggal($tgl)
  {
    $y    = date('Y', strtotime($tgl));
    $d    = date('d', strtotime($tgl));
    $dt_m = date('m', strtotime($tgl));
    $m    = $this->month($dt_m);
    $date = $d . ' ' . $m . ' ' . $y;
    return $date;
  }

  public function month($dt)
  {
    $array = array(
      '01' => 'Januari',
      '02' => 'Febuari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember',
    );
    return $array[$dt];
  }

  // public function hitung_selisih($tanggal, $sampai) {
  //   $start_date = new DateTime($tanggal);
  //   $end_date = new DateTime($sampai);
  //   $interval = $start_date->diff($end_date);
  //   return $interval->days;
  // }

  public function format_harga($harga)
  {
    $new = number_format($harga, 0, '.', '.');
    return 'Rp. ' . $new;
  }

  public function get_laporan_sewa($tgl1, $tgl2)
  {
    $this->db->from('transaksi');
    $this->db->join('produk', 'transaksi.produk_id = produk.produk_id', 'LEFT');
    $this->db->join('kategori', 'produk.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->join('users', 'users.user_id = transaksi.user_id', 'LEFT');
    if (!empty($tgl1)) {
      $this->db->where('DATE(transaksi.created_on) BETWEEN "' . $tgl1 . '" AND "' . $tgl2 . '"');
    }
    $this->db->order_by('transaksi_id', 'desc');
    return $this->db->get()->result();
  }



  public function get_where($where = array(), $table)
  {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_dimana($where = array(), $table)
  {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->row();
  }

  public function get_produk($where = array())
  {
    $this->db->from('produk');
    $this->db->join('kategori', 'produk.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_produk_limit($where = array())
  {
    $this->db->from('produk');
    $this->db->join('kategori', 'produk.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_transaksi_sewa($where)
  {
    $this->db->from('transaksi');
    $this->db->join('produk', 'transaksi.produk_id = produk.produk_id', 'LEFT');
    $this->db->join('kategori', 'produk.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->join('users', 'users.user_id = transaksi.user_id', 'LEFT');
    $this->db->where($where);
    $this->db->order_by('transaksi_id', 'desc');
    return $this->db->get()->result();
  }


  public function insert($data, $table)
  {
    return $this->db->insert($table, $data);
  }

  public function delete($where, $table)
  {
    $this->db->where($where);
    return $this->db->delete($table);
  }

  public function update($where, $data, $table)
  {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  public function get_transaksi($where = array())
  {
    $this->db->from('transaksi');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_galeri($where = array())
  {
    $this->db->from('galeri');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_galerifotohome($where = array())
  {
    $this->db->from('galeri');
    $this->db->where($where);
    return $this->db->get()->result();
  }
}
