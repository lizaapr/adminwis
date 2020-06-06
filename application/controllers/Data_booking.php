<?php 

class Data_booking extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->helper('url');
    }

   function index(){
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('data_booking');
        $this->load->view('footer');

    }
} 

?>