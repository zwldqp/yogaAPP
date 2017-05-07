<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public function get_teacher_by_uid($uid){
        $sql = "select * from edu_teacher t WHERE t.user_Id=$uid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_course_by_tid($tid){
        $sql = "select * from edu_teach_course tc where tc.teac_Id=$tid";
        return $this -> db -> query($sql) -> result();
    }
    public function get_students_by_cid($cid, $tid){
        $sql = "select count(*) count from edu_select_course sc where sc.cour_Id=$cid and sc.teac_Id=$tid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_course_name_by_cid($cid){
        $sql = "select * from edu_course c where c.cour_Id=$cid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_course(){
        $sql = "select * from edu_course";
        return $this -> db -> query($sql) -> result();
    }
    public function get_teach_course($cid,$tid){
        $sql = "select s.*,c.* from edu_student s,edu_course c,edu_select_course t where t.teac_Id=$tid and t.cour_Id=$cid and s.stud_Id=t.stud_Id and c.cour_Id=$cid";
        return $this -> db -> query($sql) -> result();
    }
    public function del_teach_course_by_id($id){
        $sql = "delete from edu_teach_course where teco_Id=$id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function del_select_course_by_id($cid, $tid){
        $sql = "delete from edu_select_course where teac_Id=$tid and cour_Id=$cid";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function save_student_info($name, $email, $uid){
        $sql="insert into edu_teacher VALUES (null, '$name', '$email', $uid)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_information($tid){
        $sql="select * from edu_teacher where teac_Id=$tid";
        return $this -> db -> query($sql) -> row();
    }
    public function up_teac_info($name, $email, $tid,$file){
        $sql="update edu_teacher set teac_Name='$name',teac_Email='$email',teac_Img='$file' where teac_Id=$tid";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function save_kaoshi($id,$teacher,$time){
        $sql="update edu_teach_course set kaoshi= '$time' where teac_Id=$teacher and cour_Id=$id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_news(){
        $sql = "select * from news";
        return $this -> db -> query($sql) -> result();
    }
    public function get_stu_by_stu_id($id){
        $sql = "select * from edu_student where stud_Id=$id";
        return $this -> db -> query($sql) -> row();
    }
    public function save_fenshu($fs,$stu,$cour,$teacher){
        $sql="update edu_select_course set gread=$fs where teac_Id=$teacher and cour_Id=$cour and stud_Id = $stu";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
}