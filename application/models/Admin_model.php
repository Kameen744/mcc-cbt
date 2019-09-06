<?php

class Admin_model extends CI_Model 
{
    public function __construct() 
    {
        $this->load->database();
    }

    public function getDepartments ($id) 
    {
        if($id === NULL){
            $this->db->select('*');
            $this->db->from('ex_departments');
            return $this->db->get()->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('ex_departments');
            $this->db->where('id', $id);
            return $this->db->get()->row_array();
        }
    }

    public function regNewDepartment($dept, $deptCode)
    {
        $data = ['ex_department' => $dept, 'ex_department_code' => $deptCode];
        $this->db->insert('ex_departments', $data);
    }

    public function editDepartmentUpdate($id, $dept, $deptCode)
    {
        $data = ['ex_department' => $dept, 'ex_department_code' => $deptCode];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('ex_departments');
    }

    public function deleteDepartment($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('ex_departments')){
            $this->db->where('ex_deprtments_id', $id);
            $this->db->delete('ex_departments_has_ex_courses');
        }
    }

    public function getCourses () 
    {
        $this->db->select('*');
        $this->db->from('ex_courses');
        return $this->db->get()->result_array();
    }

    public function regNewCourse($course)
    {
        $data = ['ex_course' => $course];
        $this->db->insert('ex_courses', $data);
    }

    public function deleteCourse($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('ex_courses')){
            $this->db->where('ex_courses_id', $id);
            $this->db->delete('ex_departments_has_ex_courses');
        }
    }

    public function getDeptCourses($id) 
    {
        $this->db->select('dpcrs.id, ex_departments_id, ex_courses_id, ex_noof_questions, ex_course');
        $this->db->from('ex_departments_has_ex_courses AS dpcrs');
        $this->db->join('ex_courses AS crs', 'crs.id = dpcrs.ex_courses_id');
        $this->db->where('dpcrs.ex_departments_id', $id);

        return $this->db->get()->result_array();
    }

    public function regDeptCourse($departmentid, $courseid, $noOfQu)
    {
        $data = ['ex_departments_id' => $departmentid, 'ex_courses_id' => $courseid, 
        'ex_noof_questions' => $noOfQu];
        $this->db->insert('ex_departments_has_ex_courses', $data);
    }

    public function deleteDeptCourses($id) 
    {
        $this->db->select('ex_departments_id');
        $this->db->from('ex_departments_has_ex_courses');
        $this->db->where('id', $id);
        $deptId = $this->db->get()->row_array();

        $this->db->where('id', $id);
        $this->db->delete('ex_departments_has_ex_courses');

        return $deptId;
    }

    public function addNewSection($dataForm)
    {
        $this->db->insert('ex_sections', $dataForm);
    }

    public function getSectionQuestions($sectionId)
    {
        $this->db->select('*');
        $this->db->from('ex_section_questions');
        $this->db->where('ex_sections_id', $sectionId);
        return $this->db->get()->result_array();
    }

    public function addNewSectionQuestion($dataForm)
    {
        $this->db->insert('ex_section_questions', $dataForm);
    }

    public function delSecQuesBtn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ex_section_questions');
    }
    
    public function getQuestions($courseId, $sectionId)
    {
        if($sectionId){
            $this->db->select('ques.id, ex_question, ex_section, ex_section_question');
            $this->db->from('ex_questions AS ques');
            $this->db->join('ex_sections AS sect', 'sect.id = ques.ex_section_id');
            $this->db->join('ex_section_questions AS sectques', 'sectques.ex_sections_id = sect.id');
            $this->db->where('ques.ex_courses_id', $courseId);
            $this->db->where('ques.ex_section_id', $sectionId);
        }else{
            $this->db->select('id, ex_question');
            $this->db->from('ex_questions');
            $this->db->where('ex_courses_id', $courseId);
        }
        return $this->db->get()->result_array();
    }
    
    public function getSections()
    {
        $this->db->select('*');
        $this->db->from('ex_sections');
        return $this->db->get()->result_array();
    }

    public function addNewQuestion($dataForm)
    {
        $query = $this->db->select('id')->where('ex_question', $dataForm['ex_question'])->get('ex_questions')->num_rows();
        if($query == 0) {
            $this->db->insert('ex_questions', $dataForm);
        }
    }

    public function delQuestBtn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ex_questions');
    }

    public function countStudents()
    { 
        return $this->db->count_all('ex_students');
    }

    public function getStudents($entry)
    {
        $this->db->select('*');
        $this->db->from('ex_students');

        if($entry){
            $this->db->where('ex_modeofentry', $entry);
        }

        return $this->db->get()->result_array();
    }

    public function getStudentsByAppNo($appNo)
    {
        $this->db->select('*');
        $this->db->from('ex_students');
        $this->db->like('ex_serial_no', $appNo);
        return $this->db->get()->result_array();
    }

    public function deleteSTudent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ex_students');
    }
    
    public function recomendationSaveTxt($recTxt, $id)
    {
        $this->db->set(['ex_recomd' => $recTxt]);
        $this->db->where('id', $id);
        $this->db->update('ex_students');
    }

    public function getDepartmentLike($dept)
    {
        $this->db->select('id');
        $this->db->from('ex_departments');
        $this->db->like('ex_department', $dept);
        return $this->db->get()->row_array();
    }

    public function addNewStudents($dataForm)
    {
        $this->db->select('id');
        $this->db->from('ex_students');
        $this->db->where('ex_serial_no', $dataForm['ex_serial_no']);
        $rslt = $this->db->get()->row_array();

        if($rslt) {
          
        }else{
            $this->db->insert('ex_students', $dataForm);
        }
    }

    public function insertInstructionText($instruction)
    {
      $this->db->insert('ex_instructions', ['ex_instruction' => $instruction]);
    }
  
    public function updateInstructionText($instruction)
    {
       $this->db->set(['ex_instruction' => $instruction]);
       $this->db->update('ex_instructions');
    }

    public function getInstructionText()
    {
        $this->db->select('ex_instruction');
        $this->db->from('ex_instructions');
        return $this->db->get()->row_array();
    }

    public function loadStuPasswords()
    {
        $this->db->select('ex_serial_no, ex_full_name, ex_password');
        $this->db->from('ex_students');
        return $this->db->get()->result_array();
    }

    public function getSerialNo()
    {
        $this->db->select('*');
        $this->db->from('ex_students');
        return $this->db->get()->result_array();
    }

    public function getStudentsScore($id)
    {
        // $this->db->select_sum('ex_mark');
        // $this->db->from('ex_stu_attempts');
        // // $this->db->join('ex_students as stu', 'stu.id=mrk.ex_students_id');
        // $result = [];
        // $result = $this->db->query("SELECT SUM(ex_mark) AS ttscr, COUNT(*) AS ttattm FROM ex_stu_attempts WHERE ex_students_id = 1");
        // return $result;
        $this->db->select('SUM(ex_mark) AS ttscr, COUNT(ex_students_id) AS ttatmpt');
        $this->db->from('ex_stu_attempts');
        $this->db->where('ex_students_id', $id);

        $result = $this->db->get()->row_array();
        // $count = $this->db->select('');
        return $result;
    }

    public function delStudentScoreBtn($id)
    {
        $this->db->where('ex_students_id', $id);
        $this->db->delete('ex_stu_attempts'); 
        $this->db->where('ex_stu_finished', $id);
        $this->db->delete('ex_stu_status');   
    }

    public function startExamBtn()
    {
        $this->db->set(['ex_start' => '1']);
        $this->db->update('ex_start_stop');
    }

    public function stopExamBtn()
    {
        $this->db->set(['ex_start' => '0']);
        $this->db->update('ex_start_stop');
    }
    
    public function setExamDurationBtn($examHrs, $examMin)
    {
        $this->db->set(['ex_hours' => $examHrs, 'ex_minutes' => $examMin]);
        $this->db->update('ex_duration');
    }

    public function getExamDuration()
    {
        $this->db->select('*');
        $this->db->from('ex_duration');
        return $this->db->get()->row_array();
    }

    public function delSectionBtn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ex_sections');
    }
}
