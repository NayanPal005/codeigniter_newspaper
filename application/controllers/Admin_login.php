<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

    public function index(){

        $this->load->view('pages/admin_login');
    }

    public function show_dashboard(){

        $this->load->view('master');

    }
    public function admin_login_check(){

        $userEmail= $this->input->post('user_email',TRUE);

        $userPassword= $this->input->post('user_password',TRUE);

        $this->load->model('admin_login_model');
        $userDetail= $this->admin_login_model->get_user_details($userEmail);
        $email=$userDetail->user_email;
     if ($userEmail==$email) {
         $data = array();
         $data['container'] = '';
         $this->load->view('master', $data);
     }
     else {
         echo "Incorrect";
         return redirect('admin_login');
     }


    }


}