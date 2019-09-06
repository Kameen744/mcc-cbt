<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model
{
    public function examStatus()
    {
        $this->db->select('ex_start');
        $this->db->from('ex_start_stop');
        return $this->db->get()->row_array();
    }

    public function studentStatus($id)
    {
        $this->db->select('ex_stu_finished');
        $this->db->from('ex_stu_status');
        $this->db->where('ex_stu_finished', $id);
        return $this->db->get()->num_rows();
    }

    public function getQuestionsNoCourseId($deptId)
    {
        $this->db->select('ex_courses_id, ex_noof_questions');
        $this->db->from('ex_departments_has_ex_courses');
        $this->db->where('ex_departments_id', $deptId);
        return $this->db->get()->result_array();
    }

    public function getQuestions($courseId, $noofqst, $qstId)
    {
        $this->db->select('qst.id, ex_course, ex_question, option_a, option_b, option_c, option_d, ex_section_id, ex_section_question');
        $this->db->from('ex_courses AS crs');
        $this->db->join('ex_questions AS qst', 'qst.ex_courses_id = crs.id');
        $this->db->join('ex_sections AS sec', 'sec.id = qst.ex_section_id');
        $this->db->join('ex_section_questions AS scq', 'scq.ex_sections_id = sec.id');
        if($qstId){
            $this->db->where('qst.id', $qstId);
            return $this->db->get()->row_array();
        }
        $this->db->where('crs.id', $courseId);
        $this->db->order_by('scq.id', 'RANDOM');
        $this->db->limit($noofqst);
        $result = $this->db->get()->result_array();
        // return shuffle($result);
        return $result;
    }

    public function setStuExmTime($stuId)
    {
        $this->db->select('id');
        $this->db->from('ex_stu_time');
        $this->db->where('ex_students_id', $stuId);
        $result = $this->db->get()->row_array();
        if(!$result){
            $this->db->insert('ex_stu_time', 
            ['ex_stu_hours' => 0, 'ex_stu_minutes' => 0, 
            'ex_students_id' => $stuId, 'ex_stu_seconds' => 0]);
        }
    }

    public function getStuTime($stuId)
    {
        $this->db->select('*');
        $this->db->from('ex_stu_time');
        $this->db->where('ex_students_id', $stuId);
        return $this->db->get()->row_array();
    }

    public function updateStuTime($stuId, $stuHrs, $stuMin, $stuSec)
    {
        $this->db->set(['ex_stu_hours' => $stuHrs, 'ex_stu_minutes' => $stuMin, 'ex_stu_seconds' => $stuSec]);
        $this->db->where('ex_students_id', $stuId);
        $res = $this->db->update('ex_stu_time');
        print_r($res);
    }

    public function getAttemptedQuestions($id)
    {
        
        $this->db->select('ex_questions_id');
        $this->db->from('ex_stu_attempts');
        $this->db->where('ex_students_id', $id);

        return $this->db->get()->result_array();
    }

    public function attemptSbumit($stuId, $qstID, $attId)
    {
   
        $this->db->select('option_r');
        $this->db->from('ex_questions');
        $this->db->where('id', $qstID);
        $rightAns = $this->db->get()->row_array();
        $mark = 0;
        if($rightAns['option_r'] === $attId){
            $mark = 1;
        }
        $data = ['ex_students_id' => $stuId, 'ex_questions_id' => $qstID, 
        'ex_answer' => $attId, 'ex_mark' => $mark];
        $this->db->select('id');
        $this->db->from('ex_stu_attempts');
        $this->db->where('ex_students_id', $stuId);
        $this->db->where('ex_questions_id', $qstID);

        if($this->db->get()->row_array()){
            $this->db->set(['ex_answer' => $attId, 'ex_mark' => $mark]);
            $this->db->where('ex_students_id', $stuId);
            $this->db->where('ex_questions_id', $qstID);
            return $this->db->update('ex_stu_attempts');
        } else {
            return $this->db->insert('ex_stu_attempts', $data);
        }
    }

    public function finishedExam($stuId)
    {
        $this->db->insert('ex_stu_status', ['ex_stu_finished' => $stuId]);
    }

    public function getInstTxt()
    {
        $this->db->select('ex_instruction');
        $this->db->from('ex_instructions');
        return $this->db->get()->row_array();
    }
}