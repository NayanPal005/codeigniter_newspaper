<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index(){

    }

    public function add_news(){

        $data=array();

        $data['container']=$this->load->view('pages/add_news','',True);
        $data['extra'] ='';


        $this->load->view('master',$data);




    }
    public function add_category(){

        $data=array();

        $data['container']=$this->load->view('pages/add_category','',True);
        $data['extra'] ='';

        $this->load->view('master',$data);




    }


}