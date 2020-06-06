<?php 

class Data_wisata extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->helper('url');
    }

   function index(){
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data_wisata');
        $this->load->view('footer');

    }
} 

?>