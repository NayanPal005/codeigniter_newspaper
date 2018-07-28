<?php
class Admin_login_model extends CI_Model{

    public function get_user_details($userEmail){

        $userDetail=  $this->db->select('*')
            ->from('tbl_user')
            ->where('user_email',$userEmail)
            ->get()
            ->row();

        return $userDetail;
    }


}
