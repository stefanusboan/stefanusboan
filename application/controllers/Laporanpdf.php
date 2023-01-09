<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    public function proses($id) {
      ob_start();
        $data['transaksi'] = $this->all_model->get_transaksi(array('transaksi_id'=>$id), 'transaksi');
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Invoice / Bukti Booking Kembar Wedding Organizer',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Jakarta',0,1,'C');

        // $this->session->userdata('email')

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,7,'Nama',0,0);
        $pdf->Cell(0,7,' : '.$this->session->userdata('nama'),0,1);
        $pdf->Cell(30,7,'Email',0,0);
        $pdf->Cell(0,7,' : '.$this->session->userdata('email'),0,1);
        $pdf->Cell(30,7,'No. HP',0,0);
        $pdf->Cell(0,7,' : '.$this->session->userdata('notelp'),0,1);
        $pdf->Cell(30,7,'Alamat',0,0);
        $pdf->Cell(70,7,' : '.$this->session->userdata('alamat'),0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(50,6,'TANGGAL',1,0);
        $pdf->Cell(50,6,'WAKTU',1,0);
        $pdf->Cell(40,6,'HARGA',1,0);
        $pdf->Cell(40,6,'WAKTU BOOKING',1,1);
        $pdf->SetFont('Arial','',10);
 
        foreach ($data['transaksi'] as $row){
            if ($row->waktu == 1) {
                $nilai = "08.00 - 10.00";
              } elseif ($row->waktu == 2) {
                $nilai = "10.00 - 12.00";
              } elseif ($row->waktu == 3) {
                $nilai = "13.00 - 15.00";
              } elseif ($row->waktu == 4) {
                $nilai = "15.00 - 17.00";
              } else {
                $nilai = "19.00 - 21.00";
              }

            $pdf->Cell(50,6,$this->all_model->format_tanggal($row->tanggal),1,0);
            $pdf->Cell(50,6,$nilai,1,0);
            $pdf->Cell(40,6,$row->harga,1,0);
            $pdf->Cell(40,6,$row->created_on,1,1); 
        }
        $pdf->Output();
        ob_end_flush(); 
      }


}