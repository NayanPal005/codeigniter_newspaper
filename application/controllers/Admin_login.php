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
        $this->form_validation->set_rules('user_email', 'UserEmail', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');

        if($this->form_validation->run()) {

            $userEmail = $this->input->post('user_email', TRUE);
            $userPassword = $this->input->post('user_password', TRUE);

            $this->load->model('admin_login_model');
            $userDetail = $this->admin_login_model->get_user_details($userEmail);

            $email = $userDetail->user_email;
            $password = $userDetail->user_password;
            $userStatus=$userDetail->user_status;

            if ($userEmail == $email && password_verify( $userPassword,$password)) {

                if ($userStatus==1){

                    $session_data['user_id'] = $userDetail->user_id;

                    $session_data['user_email'] = $userDetail->user_email;

                    $session_data['user_status'] = $userDetail->user_status;

                    $session_data['user_role'] = $userDetail->user_role;

                    $this->load->library('session');

                    $this->session->set_userdata($session_data);

                    $sessionData['myAlldata']=$this->session->all_userdata();

                    $data = array();
                    $data['container'] = '';
                    $this->load->view('master', $data,$sessionData);

                }
                else{

                    //redirect('admin');
                    $data['error_message']="Incorrect Email or Password.Please Try again";

                    $this->load->view('pages/admin_login',$data);

                }


            } else {

                $data['error_message']="Incorrect Email or Password.Please Try again";

                $this->load->view('pages/admin_login',$data);
            }
        }
        else{

            return redirect('admin_login');

        }


    }


}