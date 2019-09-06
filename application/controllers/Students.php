<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller 
{

    private function check_session()
    {
        if($this->session->userdata('studentAdmsNo')) {
            return TRUE;
        } else {
            $this->session->set_flashdata('studentsLogin_message', 'Access denied');
            $data['page'] = 'Login'; 
			$this->load->view('templates/stuheader', $data);
			$this->load->view('pages/students/login');
			$this->load->view('templates/stufooter');
        } 
    }
    // students dashboard
    public function stu_dashboard()
    {
        if($this::check_session()){
           
            $data['page'] = 'Dashboard'; 

            $exmState = $this->Students_model->examStatus();
            $stuState = $this->Students_model->studentStatus($this->session->userdata('student_id'));

            if($exmState['ex_start'] == 1){
                $data['examStatus'] = TRUE;
            }
            if($stuState){
                // $data['studentStatus'] = FALSE;
            }else{
                $data['studentStatus'] = TRUE;
            }

            $data['instructionTxt'] = $this->Students_model->getInstTxt();
            $data['student_id'] = $this->session->userdata('student_id');
            $data['studentAdmsNo'] = $this->session->userdata('studentAdmsNo');
            $data['studentName'] = $this->session->userdata('studentName');
            $data['studentFirstChoice'] = $this->session->userdata('studentFirstChoice');
          
            $this->load->view('templates/stuheader', $data);
            $this->load->view('pages/students/stu_dashboard');
            $this->load->view('templates/stufooter');
        }
    }  
    // get questions
    public function getQuestionsNoCourseId($deptId)
    {
        if($this::check_session()){
            return $this->Students_model->getQuestionsNoCourseId($deptId);
        }
    }
    // get questions 
    public function getQuestions($courseId=NULL, $noofqst=NULL, $qstId=NULL)
    {
        return $this->Students_model->getQuestions($courseId, $noofqst, $qstId);
    }
    // load questions 
    public function loadQuestions($qst, $noofcrs){
        echo json_encode($qst);
    }
    // start Exam
    public function startExam()
    {
        if($this::check_session()){
            $questionsAll = [];
            $noofcrs = 0;
            // $data['pageStatus'] = 'Exam Started';
            $stuId = $this->session->userdata('student_id');
            $deptId = $this->session->userdata('studentDeptId');
            $questionsNoCrs = $this->getQuestionsNoCourseId($deptId);
            foreach($questionsNoCrs as $qscrs){
                $ques = $this->getQuestions($qscrs['ex_courses_id'], $qscrs['ex_noof_questions']);
                array_push($questionsAll, $ques);
                $noofcrs += 1;
            }
            $this->Students_model->setStuExmTime($stuId);
            $this->loadQuestions($questionsAll, $noofcrs);
        }

    }
    // get exam time and duration 
    public function getExamDurationAndTime()
    {
        if($this::check_session()){
            $stuId = $this->session->userdata('student_id');

            $data['examDuration'] = $this->Admin_model->getExamDuration();
            $data['stuTime'] = $this->Students_model->getStuTime($stuId);

            echo json_encode($data);
        }
    }
    // // get attempted questions
    public function getAttemptedQuestions()
    {
        $stuId = $this->session->userdata('student_id');
        $result = $this->Students_model->getAttemptedQuestions($stuId);
        echo json_encode($result);
    }
    // attempt submit
    public function attemptSbumit()
    {
        if($this::check_session()){
            $stuId = $this->session->userdata('student_id');
            $qstID = $this->uri->segment(3);
            $attAns = $this->uri->segment(4);
            $this->Students_model->attemptSbumit($stuId, $qstID, $attAns);
        }
    }
    // update students 
    public function updateStuTime()
    {
        // $stuId = $this->uri->segment(3);
        $stuId = $this->session->userdata('student_id');
        $stuHrs = $this->uri->segment(3);
        $stuMin = $this->uri->segment(4);
        $stuSec = $this->uri->segment(5);
        $this->Students_model->updateStuTime($stuId, $stuHrs, $stuMin, $stuSec);
    }
    // finished exam
    public function finishedExam()
    {
        $stuId = $this->session->userdata('student_id');
        $this->Students_model->finishedExam($stuId);   
        $score = $this->Admin_model->getStudentsScore($stuId);
        $data['stuScore'] = $score;
        $this->load->view('pages/students/startexam', $data);
    }

}