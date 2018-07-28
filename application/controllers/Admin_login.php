<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function index(){

        $this->load->view('admin_login');
    }

    public function show_dashboard(){

        $this->load->view('master');

    }


}