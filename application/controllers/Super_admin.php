<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller
{

    public function index(){


    }

    public function manage_news(){

        $data=array();

        $data['container']=$this->load->view('pages/news_details','',True);

        $this->load->view('master',$data);
    }
    public function manage_category(){

        $data=array();

        $data['container']=$this->load->view('pages/manage_category','',True);

        $this->load->view('master',$data);
    }

}