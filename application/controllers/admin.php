<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('course_model');
    }
    public function admin_index()
    {
        $loginID = $this -> session -> userdata('logindata');
        $result = $this -> course_model -> get_all_class();
        if($loginID -> user_Name){
            $this -> load -> view('admin_index', array(
                'res' => $result
            ));
        }
    }
    public function delete_course(){
        $id = $this->input->get('id');
        $res1 = $this -> course_model -> del_cid_from_tc($id);
        $res2 = $this -> course_model -> del_cid_from_sc($id);
        $res3 = $this -> course_model -> del_course_by_id($id);
        if($res1 && $res2 && $res3){
            redirect('admin/admin_index');
        }
    }
    public function insert_course(){
        $name = $this->input->get('name');
        $credit = $this->input->get('credit');
        $class = $this->input->get('class');
        $desc = $this->input->get('desc');
        $res = $this->course_model->insert_class($name, $credit, $class, $desc);
        if($res){
            redirect('admin/admin_index');
        }
    }
    public function update_course(){
        $id = $this -> input -> get('id');
        $res = $this -> course_model -> get_all_class();
        $class = $this -> course_model -> get_class_by_id($id);
        $res1 = $this -> course_model -> del_cid_from_tc($id);
        $res2 = $this -> course_model -> del_cid_from_sc($id);
        $res3 = $this -> course_model -> del_course_by_id($id);
        if($res1 && $res2 && $res3){
            $this -> load -> view('admin_index', array(
                'res' => $res,
                'class' => $class
            ));
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect("welcome/login");
    }
}
