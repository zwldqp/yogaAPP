<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
    public function get_stu_by_user_id($user_id){
        $sql = "select * from edu_student where user_Id=$user_id";
        return $this -> db -> query($sql) -> row();
    }
    public function save_information($user_id, $major_id, $name, $sex, $email){
        $sql = "insert into edu_student VALUES (null, $major_id, '$name', $sex, '$email', $user_id)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function update_information($student_id ,$major_id, $name, $sex, $email){
        $sql = "UPDATE edu_student SET stud_Email = '$email', majo_Id = '$major_id', stud_Name = '$name', stud_Sex = $sex  WHERE stud_Id = '$student_id'";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_tid_by_tname($name){
        $sql="select teac_Id from edu_teacher where teac_Name = '$name'";
        return $this->db->query($sql)->row();
    }
    public function get_course(){
        $sql="select * from edu_teach_course tc, edu_course c, edu_teacher t where tc.teac_Id = t.teac_Id and tc.cour_Id = c.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_course_by_sid($sid){
        $sql="select * from edu_select_course sc where sc.stud_Id = $sid";
        return $this->db->query($sql)->result();
    }
    public function del_course_in_select_course($id){
        $sql="DELETE FROM edu_select_course WHERE seco_Id = $id";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function save_course_in_select_course($sid, $cid, $tid){
        $sql="insert into edu_select_course VALUES (null, $sid, $cid, $tid)";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_teach_course_by_id($id){
        $sql="select * from edu_teach_course tc where tc.teco_Id = $id";
        return $this->db->query($sql)->row();
    }
    public function get_teacher_by_course($cid){
        $sql="select * from edu_teach_course where cour_Id = $cid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_all_teachers(){
        $sql="select * from edu_teacher";
        return $this -> db -> query($sql) -> result();
    }
    public function get_lesson_by_tid($tid){
        $sql="select * from edu_teach_course tc where tc.teac_Id = $tid";
        return $this -> db -> query($sql) -> result();
    }
    public function get_course_by_cid($cid){
        $sql="select * from edu_course c where c.cour_Id = $cid";
        return $this -> db -> query($sql) -> row();
    }
    public function save_student_info($name, $email, $uid,$tel){
        $sql="insert into edu_student VALUES (null,'$name', '$email', $uid,'$tel')";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_kaoshi($teac,$cour){
        $sql="select k.kaoshi,c.cour_Name from edu_teach_course k,edu_course c where k.cour_Id=$cour and k.teac_Id=$teac and c.cour_Id=$cour";
        return $this -> db -> query($sql) -> row();
    }
    public function get_teacher($tid){
        $sql="select * from edu_teacher where teac_Id = $tid";
        return $this -> db -> query($sql) -> row();
    }
    public function get_gread($sid){
        $sql = "select * from edu_select_course s,edu_course c where s.stud_Id=$sid and s.gread is not null and s.cour_Id=c.cour_Id";
        return $this -> db -> query($sql) -> result();
    }
    public function up_infor($name,$email,$tel,$loginID){
        $sql = "UPDATE edu_student SET stud_Email = '$email', stud_tel = '$tel', stud_Name = '$name' WHERE user_Id = $loginID";
        $this -> db -> query($sql);
        return $this -> db -> affected_rows();
    }
    public function get_miji(){
        $sql="select * from edu_miji";
        return $this -> db -> query($sql) -> result();
    }
}
