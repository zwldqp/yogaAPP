<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_modol');
        $this->load->model('teacher_model');
    }

    public function t_reg()
    {
        $this->load->view('t_reg');
    }

    public function t_index()
    {
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        if (!isset($teacher->teac_Id)) {
            $this->load->view('t_introduce');
        } else {
            $courses = $this->teacher_model->get_course_by_tid($teacher->teac_Id);
            $this->session->set_userdata('teacher', $teacher);
            $res = array();
            foreach ($courses as $value) {
                $course = $this->teacher_model->get_course_name_by_cid($value->cour_Id);
                $count = $this->teacher_model->get_students_by_cid($value->cour_Id, $teacher->teac_Id);
                $res[$course->cour_Name] = $count;
            }
            $this->load->view('t_index', array(
                'res' => $res
            ));
        }
    }

    public function t_class_controller()
    {
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $courses = $this->teacher_model->get_course();
        $teached = $this->teacher_model->get_course_by_tid($teacher->teac_Id);
        $my_course = array();
        foreach ($teached as $value) {
            $my_course[$value->cour_Id] = $value;
        }
        $this->load->view('t_class_controller', array(
            'courses' => $courses,
            'my_course' => $my_course
        ));
    }

    public function t_del_class()
    {
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $id = $this->input->get('id');
        $cid = $this->input->get('cid');
        $del_tc_row = $this->teacher_model->del_teach_course_by_id($id);
        $this->teacher_model->del_select_course_by_id($cid, $teacher->teac_Id);
        if ($del_tc_row) {
            redirect("teacher/t_index");
        } else {
            echo "操作失误，请重复操作";
        }
    }

    public function t_teach_class()
    {
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $cid = $this->input->get('id');
        $results = $this->teacher_model->get_teach_course($cid, $teacher->teac_Id);
        if ($results) {
            $this->load->view('detailed', array(
                'results' => $results
            ));
        } else {
            echo "班级没有同学";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("welcome/login");
    }

    public function do_introduce()
    {
        $name = $this->input->get('name');
        $email = $this->input->get('email');
        $loginID = $this->session->userdata('logindata');
        $row = $this->teacher_model->save_student_info($name, $email, $loginID->user_Id);
        if ($row) {
            redirect("teacher/t_index");
        } else {
            redirect("welcome/introduce_error");
        }
    }

    public function t_inform()
    {
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $row = $this->teacher_model->get_information($teacher->teac_Id);
        if ($row) {
            $this->load->view('t_inform', array(
                'row' => $row
            ));
        }
    }

    public function t_introduce1()
    {
        $this->load->view('t_introduce1');
    }

    public function up_introduce()
    {
        $name1 = $this->input->post('name');
        $email = $this->input->post('email');
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $file = $_FILES['file'];
        $name = $file['name'];
        $type = strtolower(substr($name, strrpos($name, '.') + 1));
        $allow_type = array('jpg', 'jpeg', 'gif', 'png');
        if (!in_array($type, $allow_type)) {
            return;
        }
        if (!is_uploaded_file($file['tmp_name'])) {
              return;
        }
        $upload_path = "assets/file/";
        if (move_uploaded_file($file['tmp_name'], $upload_path . $file['name'])) {
            $row = $this -> teacher_model -> up_teac_info($name1, $email,$teacher->teac_Id,$upload_path.$_FILES['file']['name']);
                if($row>0){
                    redirect("teacher/t_index");
                }else{
                    redirect("welcome/introduce_error");
                }
        } else {
            echo "ddd";
        }
    }
    public function t_kaoshi(){
        $id=$this->input->get('id');
            $this->load->view('t_kaoshi',array(
                'id'=>$id
            ));
        }
    public function add_kaoshi(){
        $time=$this->input->post('time');
        $id=$this->input->post('id');
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $row=$this->teacher_model->save_kaoshi($id,$teacher->teac_Id,$time);
        if($row>0){
            $this->t_class_controller();
        }
    }
    public function t_news(){
        $results=$this->teacher_model->get_news();
        $this->load->view('t_news',array(
            'results'=>$results
        ));
    }
    public function shangfen(){
        $id=$this->input->get('id');
        $cour=$this->input->get('cour');
        $row=$this->teacher_model->get_stu_by_stu_id($id);
        if($row){
            $this->load->view('t_shangfen',array(
                'row'=>$row,
                'cour'=>$cour
            ));
        }
    }
    public function add_fenshu(){
        $fs=$this->input->post('fs');
        $stu=$this->input->post('stu');
        $cour=$this->input->post('cour');
        $loginID = $this->session->userdata('logindata');
        $teacher = $this->teacher_model->get_teacher_by_uid($loginID->user_Id);
        $row=$this->teacher_model->save_fenshu($fs,$stu,$cour,$teacher->teac_Id);
        if($row>0){
            $this->t_class_controller();
        }else{
            echo '上分失败';
        }
    }
}














