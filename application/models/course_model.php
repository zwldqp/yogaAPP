<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model {
    public function get_course_by_student($student_id){
        $sql = "select * from edu_course c, edu_select_course sc where sc.stud_Id=$student_id and sc.cour_Id=c.cour_Id";
        return $this -> db -> query($sql) -> result();
    }
    public function get_teacher_by_student($student_id){
        $sql = "select teac_Name, t.teac_Id from edu_teacher t, edu_select_course sc where sc.stud_Id=$student_id and sc.teac_Id=t.teac_Id";
        return $this -> db -> query($sql) -> result();
    }
    public function get_all_class(){
        $sql = "select * from edu_course";
        return $this -> db -> query($sql) -> result();
    }
    public function del_cid_from_tc($id){
        $sql = "delete from edu_teach_course where cour_Id = $id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function del_cid_from_sc($id){
        $sql = "delete from edu_select_course where cour_Id = $id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function del_course_by_id($id){
        $sql = "delete from edu_course where cour_Id = $id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function insert_class($name, $credit, $class, $desc){
        $sql = "INSERT INTO edu_course VALUES (null, '$name', '$credit', '$class', '$desc')";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_class_by_id($id){
        $sql = "select * from edu_course where cour_Id = $id";
        return $this -> db -> query($sql) -> row();
    }
}
