<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_modol');
        $this -> load -> model('student_model');
        $this -> load -> model('course_model');
        $this -> load -> model('select_course_model');
    }

    public function index(){
        $loginID = $this -> session -> userdata('logindata');
        if($loginID -> user_Power == 1){
            $student = $this -> student_model -> get_stu_by_user_id($loginID -> user_Id);
            $this -> session -> set_userdata('student', $student);
            if($student){
                $courses = $this -> course_model -> get_course_by_student($student -> stud_Id);
                $results=[];
                $i=0;
                foreach ($courses as $course){
                    $row= $this->student_model->get_kaoshi($course->teac_Id,$course->cour_Id);
                    if($row->kaoshi !=  null){
                        $results[$i++]=$row;
                    }
                }
                $this->load->view('index',array(
                    'courses' => $courses,
                    'results'=>$results
                ));
            }else{
                redirect('student/introduce');
            }
        }
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function select_course()
    {
        $student = $this -> session -> userdata('student');
        $course = $this->student_model->get_course();
        $selected = $this->student_model->get_course_by_sid($student->stud_Id);
        $res = array();
        foreach($course as $key => $value){
            foreach($selected as $key1 => $value1){
                if($value->teac_Id == $value1->teac_Id && $value->cour_Id==$value1->cour_Id)
                    $res[$value->teco_Id] = $value1;
            }
        }
        $this->load->view('select_course', array(
            'course' => $course,
            'res' => $res
        ));
    }
    public function do_select(){
        $id = $this->input->get('id');
        $student = $this -> session -> userdata('student');
        $teach = $this->student_model->get_teach_course_by_id($id);
        $row = $this->student_model->save_course_in_select_course($student->stud_Id, $teach->cour_Id, $teach->teac_Id);
        if($row){
            redirect('student/index');
        }else{
            echo "failed";
        }
    }
    public function del_select(){
        $id = $this->input->get('id');
        $row = $this->student_model->del_course_in_select_course($id);
        if($row){
            redirect('student/select_course');
        }else{
            echo "failed";
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect("welcome/login");
    }
    public function introduce(){
        $this -> load -> view('introduce');
    }
    public function do_introduce(){
        $name = $this->input->get('name');
        $email = $this->input->get('email');
        $tel = $this->input->get('tel');
        $loginID = $this -> session -> userdata('logindata');
        $row = $this -> student_model -> save_student_info($name, $email, $loginID->user_Id,$tel);
        if($row){
            redirect("student/index");
        }else{
            redirect("welcome/introduce_error");
        }
    }
    public function modify_password(){
        $loginID = $this -> session -> userdata('logindata');
        $student = $this -> student_model -> get_stu_by_user_id($loginID -> user_Id);
        $this -> load -> view('modify_password',array(
            'student'=>$student
        ));
    }
    public function update_password(){
        $new = $this -> input -> post('new');
        $renew = $this -> input -> post('renew');
        $loginID = $loginID = $this -> session -> userdata('logindata');
        if($new != $renew){
            $this -> load -> view('update_error');
        }else{
            $row = $this -> user_modol -> update_password($loginID -> user_Name, $new);
            if($row){
                $this->session->sess_destroy();
                redirect("welcome/login");
            }else{
                $this -> load -> view('update_error');
            }
        }
    }
    public function s_kaoshi(){
        $student = $this -> session -> userdata('student');
        $selecteds = $this->student_model->get_course_by_sid($student->stud_Id);
        $results=[];
        $i=0;
        foreach ($selecteds as $selected){
                $row= $this->student_model->get_kaoshi($selected->teac_Id,$selected->cour_Id);
                if($row->kaoshi !=  null){
                    $results[$i++]=$row;
                }
        }
        if($results[0]){
            $this -> load -> view('s_kaoshi',array(
                'results'=>$results
            ));
        }
    }
    public function teac(){
        $tid=$this->input->get('id');
        $row=$this->student_model->get_teacher($tid);
        $this -> load -> view('t_inform',array(
            'row'=>$row
        ));
    }
    public function s_news(){
        $this->load->model('teacher_model');
        $results=$this->teacher_model->get_news();
        $this->load->view('s_news',array(
            'results'=>$results
        ));
    }
    public function s_gread(){
        $student = $this -> session -> userdata('student');
        $results=$this->student_model->get_gread($student->stud_Id);
        if($results){
            $this->load->view('s_gread',array(
                'results'=>$results
            ));
        }else{
            echo "您还没有成绩";
        }
    }
    public function s_introduce1(){
        $this->load->view('s_introduce');
    }
    public function introduce11(){
        $name = $this->input->get('name');
        $email = $this->input->get('email');
        $tel = $this->input->get('tel');
        $loginID = $this -> session -> userdata('logindata');
        $row=$this->student_model->up_infor($name,$email,$tel,$loginID->user_Id);
        if($row>0){
            $this->index();
        }
    }
    public function s_miji(){
        $results=$this->student_model->get_miji();
        $this->load->view('s_miji',array(
            'results'=>$results
        ));
    }
}















