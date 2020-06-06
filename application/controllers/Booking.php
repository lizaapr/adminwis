<?php
defined('BASEPATH') OR exit();

class Booking extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('My_model', 'm');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    function index(){
        $data['title']="CRUD CI-AJAX | idcorner";
        $this->load->view('home', $data);
    }

    function ambildata(){ 
        $dataBooking = $this->m->ambildata('data_booking')->result();
        echo json_encode($dataBooking);
    }

    function tambahdata(){
        $kode_booking=$this->input->post('kode_booking');
        $nama_booking=$this->input->post('nama_booking');
        $jumlah_booking=$this->input->post('jumlah_booking');
        $tanggal_booking=$this->input->post('tanggal_booking');
        $waktu_booking=$this->input->post('waktu_booking');
        $tarif_booking=$this->input->post('tarif_booking');

        if($kode_booking==''){
            $result['pesan']="Kode booking tiket harus diisi";
        }elseif($nama_booking==''){
            $result['pesan']="Nama harus diisi";  
        }elseif($jumlah_booking==''){
            $result['pesan']="Jumlah harus diisi";  
        }elseif($tanggal_booking==''){
            $result['pesan']="Tanggal harus diisi";  
        }elseif($waktu_booking==''){
            $result['pesan']="Waktu harus diisi";  
        }elseif($tarif_booking==''){
            $result['pesan']="Tarif harus diisi";  
        }else{
             $result['pesan']="";

            $data=array(
                'kode_booking'=>$kode_booking,
                'nama_booking'=>$nama_booking,
                'jumlah_booking'=>$jumlah_booking,
                'tanggal_booking'=>$tanggal_booking,
                'waktu_booking'=>$waktu_booking,
                'tarif_booking'=>$tarif_booking,
            );

            $this->m->tambahdata($data, 'data_booking');
        }

        echo json_encode($result);
    }

    function ambilId(){
        $id=$this->input->post('id');
        $where=array('id'=>$id);
        $databooking= $this->m->ambilId('data_booking', $where)-> result();

        echo json_encode($databooking);
    }

     function ubahdata(){
         $id=$this->input->post('id');
        $kode_booking=$this->input->post('kode_booking');
        $nama_booking=$this->input->post('nama_booking');
        $jumlah_booking=$this->input->post('jumlah_booking');
        $tanggal_booking=$this->input->post('tanggal_booking');
        $waktu_booking=$this->input->post('waktu_booking');
        $tarif_booking=$this->input->post('tarif_booking');

        if($kode_booking==''){
            $result['pesan']="Kode booking tiket harus diisi";
        }elseif($nama_booking==''){
            $result['pesan']="Nama harus diisi";  
        }elseif($jumlah_booking==''){
            $result['pesan']="Jumlah harus diisi";  
        }elseif($tanggal_booking==''){
            $result['pesan']="Tanggal harus diisi";  
        }elseif($waktu_booking==''){
            $result['pesan']="Waktu harus diisi";  
        }elseif($tarif_booking==''){
            $result['pesan']="Tarif harus diisi";  
        }else{
             $result['pesan']="";

             $where= array('id' =>$id);

            $data=array(
                'kode_booking'=>$kode_booking,
                'nama_booking'=>$nama_booking,
                'jumlah_booking'=>$jumlah_booking,
                'tanggal_booking'=>$tanggal_booking,
                'waktu_booking'=>$waktu_booking,
                'tarif_booking'=>$tarif_booking,
            );

            $this->m->updatedata($where,$data, 'data_booking');
        }

        echo json_encode($result);
    }
    function hapusdata(){
        $id=$this->input->post('id');
        $where=array('id'=>$id);
        $this->m->hapusdata($where,'data_booking'); 

    }

}