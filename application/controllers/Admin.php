<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index() 
    {
        $data['page'] = 'Login'; 
		$this->load->view('templates/header', $data);
		$this->load->view('pages/admin/login');
		$this->load->view('templates/footer');   
    }
    // Check admin session
    private function check_session()
    {
        if($this->session->userdata('adminUserName')) {
           return TRUE;
        } else {
            $this->session->set_flashdata('adminLogin_message', 'Access denied please login');
            $this->index();
        }
    }

    // Admin Dashboard load
    public function dashboard() 
    {
        if($this::check_session()){
            $data['page'] = 'Admin'; 
            $data['adminName'] = $this->session->userdata('adminUserName');
            $this->load->view('templates/dashheader', $data);
            $this->load->view('pages/admin/dashboard');
            $this->load->view('templates/footer');   
        }
    }

    // Add remove department
    public function addRemoveDepartments() 
    {
        if($this::check_session()){
            $data['page'] = 'Add / Remove Departments'; 
            $data['addRemoveDepartments'] = TRUE;
            $data['departments'] = $this->getDepartments();
            $this->load->view('pages/admin/mng_dprt', $data);
        }
    }
    // get Departments
    public function getDepartments($id=NULL) 
    {
        if($this::check_session()){
            return $this->Admin_model->getDepartments($id);
        }
    }
    // reg new department
    public function regNewDepartment()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('departmentCode', 'Department Code', 'required');
            
            if($this->form_validation->run()) {
                $dept = $this->input->post('department');
                $deptcode = $this->input->post('departmentCode');
                $this->Admin_model->regNewDepartment($dept, $deptcode);
                $this->addRemoveDepartments();
            }else{
                $this->addRemoveDepartments();
            }
        }
    }
    // edit department
    public function editDepartment($id)
    {
        if($this::check_session()){
            $data['editDepartment'] = $this->getDepartments($id);
            $this->load->view('pages/admin/mng_dprt', $data);
        }
    }
    // edit department save update
    public function editDepartmentUpdate()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('updtdepartment', 'Department', 'required');
            $this->form_validation->set_rules('updtdepartmentCode', 'Department Code', 'required');
            $this->form_validation->set_rules('departmentId', 'Department ID', 'required');
            
            $id = $this->input->post('departmentId');
            $dept = $this->input->post('updtdepartment');
            $deptcode = $this->input->post('updtdepartmentCode');
            
            if($this->form_validation->run()) {  
                $this->Admin_model->editDepartmentUpdate($id, $dept, $deptcode);
                $this->addRemoveDepartments();
            }else{
                $this->addRemoveDepartments();
            }
        }
    }
    // delete department
    public function deleteDepartment($id)
    {
        if($this::check_session()){
            $this->Admin_model->deleteDepartment($id);
            $this->addRemoveDepartments();
        }
    }
    // Add remove department
    public function addRemoveCourses() 
    {
        if($this::check_session()){
            $data['page'] = 'Add / Remove Courses'; 
            $data['addRemoveCourses'] = TRUE;
            $data['courses'] = $this->getCourses();
            $data['departments'] = $this->getDepartments();
            $this->load->view('pages/admin/mng_dprt', $data);
        }
    }
    // get Departments
    public function getCourses() 
    {
        if($this::check_session()){
            return $this->Admin_model->getCourses();
        }
    }
    // reg new department
    public function regNewCourse()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('course', 'Course', 'required');
            
            if($this->form_validation->run()) {
                $course = $this->input->post('course');
                $this->Admin_model->regNewCourse($course);
                $this->addRemoveCourses();
            }else{
                $this->addRemoveCourses();
            }
        }
    }
    // deleted courses
    public function deleteCourse($id)
    {   
        if($this::check_session()){
            $this->Admin_model->deleteCourse($id);
            $this->addRemoveCourses();
        }
    }
    // get dept courses
    public function getDeptCourses($id=NULL)
    {
        if($this::check_session()){
            $data['departmentCourses'] = TRUE;
            if($id === null) {
                return;
            }
            $data['deptCourses'] = $this->Admin_model->getDeptCourses($id);
            $this->load->view('pages/admin/mng_dprt', $data);
        }
    }
    // reg Dept Course
    public function regDeptCourse()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('SelectDept', 'Department', 'required');
            $this->form_validation->set_rules('SelectCourse', 'Course', 'required');
            $this->form_validation->set_rules('noOfQues', 'No of Questions', 'required');
            
            if($this->form_validation->run()) {
                $departmentid = $this->input->post('SelectDept');
                $courseid = $this->input->post('SelectCourse');
                $noOfQu = $this->input->post('noOfQues');
                $this->Admin_model->regDeptCourse($departmentid, $courseid, $noOfQu);
                $this->getDeptCourses($departmentid);
            }else{
                $this->getDeptCourses($departmentid);
            }
        }
    }
    // delete Dept courses
    public function deleteDeptCourses($id)
    {
        if($this::check_session()){
            $delDeptCourse = $this->Admin_model->deleteDeptCourses($id); 
            $this->getDeptCourses($delDeptCourse['ex_departments_id']);
        }
    }
    // get question parts
    // public function getQuesPart()
    // {
    //     return $this->Admin_model->getQuesPart();
    // }
    // get question sections
    public function getSections()
    {
        if($this->check_session()){
            return $this->Admin_model->getSections();
        }
    }
    // get sections questions
    public function getSectionQuestions($sectionId=NULL)
    {
        if($this->check_session()){
            return $this->Admin_model->getSectionQuestions($sectionId);
        }
    }
    // get Section Questions Table
    public function getSectionQuestionsTable($id)
    {
        if($this::check_session()){
            $data['sectionQuestions'] = $this->getSectionQuestions($id);
            $this->load->view('pages/admin/mng_ques', $data);
        }
    }
    // add section questions tab
    public function addSectionQuestionsTab()
    {
        if($this::check_session()){
            $data['page'] = 'Add Section Questions'; 
            $data['addSectionQuestionsTab'] = TRUE;
            // $data['sectionsQuestions'] = $this->getSectionQuestions();
            $data['Sections'] = $this->getSections();
            $this->load->view('pages/admin/mng_ques', $data);
        }
    }
     // delete section 
     public function delSectionBtn($id)
     {
        if($this::check_session()){
            $this->Admin_model->delSectionBtn($id); 
            $this->addSectionQuestionsTab();
        }  
     }
    // add new section questions submit
    public function addNewSectionQuestion()
    {
        if($this->check_session()){
            $this->form_validation->set_rules('sections', 'Section', 'required');
            $this->form_validation->set_rules('newSectionQues', 'Question', 'required');
            
            if($this->form_validation->run()){
                $formData = ['ex_section_question' => html_escape($this->input->post('newSectionQues')),
                'ex_sections_id' => $this->input->post('sections')];
                $this->Admin_model->addNewSectionQuestion($formData);
                $this->getSectionQuestionsTable($this->input->post('sections'));
            }else{

            }
        }
    }
    // add new section form submit
    public function addNewSection()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('newSection', 'Section', 'required');
            $formData = ['ex_section' => $this->input->post('newSection')];

            if($this->form_validation->run()) {  
                $this->Admin_model->addNewSection($formData);
                $this->addSectionQuestionsTab();
            }else{
                $this->addSectionQuestionsTab();
            }   
        }
    }
    // delSecQuesBtn
    public function delSecQuesBtn($id)
    {
        if($this::check_session()){
            $this->Admin_model->delSecQuesBtn($id);
            $this->addSectionQuestionsTab();
        }
    }
    // add Questions Tab
    public function addQuestionsTab()
    {
        if($this::check_session()){
            $data['page'] = 'Add Exam Questions'; 
            $data['addQuestionsTab'] = TRUE;
            $data['questionCourses'] = $this->getCourses();
            $data['Sections'] = $this->getSections();
            $this->load->view('pages/admin/mng_ques', $data);
        }
    }
    // upload questions
    public function uploadQuestionsFrm()
    {
        if($this::check_session()){

            $filePath = $_FILES['studentsFile']['tmp_name'];

            if($filePath) {

                // $result = $this->ReadExcel_model->parse_file($filePath);

                // print_r($result);

                $result =   $this->CSVReader_model->parse_file($filePath);

                foreach($result as $qst){

                $formData = ['ex_courses_id' => $this->input->post('SelectQuesCourse'),
                'ex_section_id' => $this->input->post('sections'),
                'ex_question' => trim($qst['QUESTION']),
                'option_a' => trim($qst['OPTION A']),
                'option_b' => trim($qst['OPTION B']),
                'option_c' => trim($qst['OPTION C']),
                'option_d' => trim($qst['OPTION D']),
                'option_r' => trim($qst['ANSWER'])];

                $this->Admin_model->addNewQuestion($formData);
                // print_r($da)
                }

                $this->getQuestionsTable($this->input->post('SelectQuesCourse'), $this->input->post('sections'));
           }
        }
    }
    // get questions
    public function getQuestions($courseId, $sectionId=NULL)
    {
        if($this::check_session()){
            if($sectionId == 0 || $sectionId == NULL){
                $sectionId = NULL;
            }
            return $this->Admin_model->getQuestions($courseId, $sectionId);
        }
    }
    // get questions table
    public function getQuestionsTable($courseId, $sectionId=NULL){
        if($this::check_session()){
            if($sectionId === NULL){
                $sectionId = $this->uri->segment(4, 0);
            }
            $data['questions'] = $this->getQuestions($courseId, $sectionId);
            $data['questionsTable'] = TRUE;
            // print_r($data['questions']);
            $this->load->view('pages/admin/mng_ques', $data);
        }
    }
    // add questions submit
    public function addNewQuestion()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('SelectQuesCourse', 'Course', 'required');
            $this->form_validation->set_rules('questionText', 'Question', 'required');
            $this->form_validation->set_rules('optionA', 'Option A', 'required');
            $this->form_validation->set_rules('optionB', 'Option B', 'required');
            $this->form_validation->set_rules('optionR', 'Answer', 'required');
            
           
            
            if($this->form_validation->run()) {  
                $qstn = html_escape(trim($this->input->post('questionText')));
                $optA = html_escape(trim($this->input->post('optionA')));
                $optB = html_escape(trim($this->input->post('optionB')));
                $optC = html_escape(trim($this->input->post('optionC')));
                $optD = html_escape(trim($this->input->post('optionD')));

                $formData = ['ex_courses_id' => $this->input->post('SelectQuesCourse'),
                'ex_section_id' => $this->input->post('sections'),
                'ex_question' => $qstn,
                'option_a' => $optA,
                'option_b' => $optB,
                'option_c' => $optC,
                'option_d' => $optD,
                'option_r' => $this->input->post('optionR')];

                $this->Admin_model->addNewQuestion($formData);
                $this->getQuestionsTable(
                    $this->input->post('SelectQuesCourse'),
                    $this->input->post('sections')
                );
            }else{
                $this->addQuestionsTab();
            }
        
        }
    }
    // del Quest Btn
    public function delQuestBtn()
    {
        if($this::check_session()){
            $id = $this->uri->segment(3, 0);
            $quesId = $this->uri->segment(4, 0);
            $secId = $this->uri->segment(5, 0);
            $this->Admin_model->delQuestBtn($id);
            $this->getQuestionsTable($quesId, $secId);
            // echo $id .' ques: ' .$quesId .' sec ' .$secId;
        }
    }
    // get students
    public function getStudents($entry=NULL)
    {
        if($this::check_session()){
            return $this->Admin_model->getStudents($entry);
        }
    }
    // add Remove Students Tab
    public function addRemoveStudentsTab($entry=NULL, $insrtError=NULL)
    {
        if($this::check_session()){
            
          
            $data['page'] = 'Add / Remove Students'; 
            $data['addStudentsTab'] = TRUE;
            if($entry != 'Fresh' & $entry != 'Retraining' & $entry !== NULL){
                $data['students'] = $this->Admin_model->getStudentsByAppNo($entry);
            }else{
                $data['students'] = $this->getStudents($entry);
            }
            $data['departments'] = $this->Admin_model->getDepartments($id=NULL);

            // $config['base_url'] = base_url() .'admin/getStudents';
            // $config['total_rows'] = $this->Admin_model->countStudents();;
            // $config['per_page'] = 10;

            // $this->pagination->initialize($config);

            // $data['studPagination'] = $this->pagination->create_links();
            $data['insrtError'] = $insrtError;

            $this->load->view('pages/admin/mng_stu', $data);
        }
    }
    // delete students
    public function deleteSTudent($id)
    {
        if($this::check_session()){
            $this->Admin_model->deleteSTudent($id);
            $this->addRemoveStudentsTab();
        }
    }
    // recomendation save text
    public function recomendationSaveTxt()
    {
        if($this::check_session()){
            $recTxt = $_POST['recTxt'];
            $id = $_POST['stuId'];
            $this->Admin_model->recomendationSaveTxt($recTxt, $id);
            $this->addRemoveStudentsTab();
        }
    }
    // add new students submit
    public function addNewStudents()
    {
        if($this::check_session()){
            $this->load->helper('date');
            $filePath = $_FILES['studentsFile']['tmp_name'];
            $cratedAt = date(DATE_ISO8601);
            if($filePath) {
                
                $result =   $this->CSVReader_model->parse_file($filePath);
                $insrtError = NULL;
                foreach($result as $stu){
                $pass = substr(strtoupper($stu['Fullname']), 0, 1) .rand(100001, 999999);
                $choiceCode = substr($stu['First Choice'], 0, 22);
                if($stu['Mode of Entry'] === 'Fresh'){
                   $deptId = $this->Admin_model->getDepartmentLike('Fresh');
                } else {
                    $deptId = $this->Admin_model->getDepartmentLike($choiceCode);
                }

                $data = ['ex_serial_no' => $stu['Serial No'], 'ex_full_name' => $stu['Fullname'],
                'ex_gender' => $stu['Gender'], 'ex_state' => $stu['State of Origin'],
                'ex_phone' => $stu['Phone'], 'ex_modeofentry' => $stu['Mode of Entry'],
                'ex_first_choice' => $stu['First Choice'], 'ex_second_choice' => $stu['Second Choice'],
                'ex_olevel' => $stu['OLevel 1'], 'ex_olevel_2' => $stu['OLevel 2'],
                'ex_password' => $pass, 'ex_departments_id' => $deptId['id'], 'ex_created_at' => $cratedAt];
                if(!empty($deptId) & !empty($stu['Serial No'])){
                    $this->Admin_model->addNewStudents($data);
                }else {
                    $insrtError ++;
                }
                    
                }
                $this->addRemoveStudentsTab($entry=NULL, $insrtError);
           }
        }
    }
    // print students passwords 
    public function printStuPasswordsTab() 
    {
        if($this::check_session()){
            $data['page'] = 'Print Passwords'; 
            $data['printStuPasswords'] = TRUE;
            $this->load->view('pages/admin/mng_stu', $data);
        }
    }
    // insert Instruction text
    public function insertInstructionText($instruction)
    {
        $this->Admin_model->insertInstructionText($instruction);
    }
    // update instruction text
    public function updateInstructionText($instruction)
    {
        $this->Admin_model->updateInstructionText($instruction);
    }
    // get instruction text
    public function getInstructionText()
    {
        return $this->Admin_model->getInstructionText();
    }
    // load stud passwords
    public function loadStuPasswords()
    {
      if($this::check_session()){
        $data['page'] = 'Passwords / Instruction'; 
        $data['instructionText'] = $this->getInstructionText();
        $data['stupasswords'] = $this->Admin_model->loadStuPasswords();
		$this->load->view('templates/paperheader', $data);
		$this->load->view('pages/admin/mng_stu');
		$this->load->view('templates/paperfooter'); 
      }
    }
    // print students passwords Btn
    public function printStuPasswordsBtn($instruction=NULL) 
    {
        if($this::check_session()){
            $instruction = html_escape($_POST['InstructionTxt']);
            if($instruction){
                if($this->getInstructionText()){
                    $this->updateInstructionText($instruction); 
                }else{
                    $this->insertInstructionText($instruction);
                    $this->loadStuPasswords();
                }
            } else {
                $this->loadStuPasswords();
            }
        }
    }
    // get students score
    public function getStudentsScore($id)
    {
        return $this->Admin_model->getStudentsScore($id);
    }
    // get serial no
    public function getSerialNo()
    {
        return $this->Admin_model->getSerialNo();
    }
    // print students score tab
    public function printStuScoreTab($print=null)
    {
        $stuScore = [];

        $serialNo = $this->getSerialNo();

        $No = count($serialNo);

        for ($i=0; $i < $No; $i++) { 
            $results = $this->getStudentsScore($serialNo[$i]['id']);

            $results['stu_id'] = $serialNo[$i]['id'];
            $results['serial_no'] = $serialNo[$i]['ex_serial_no'];
            $results['ex_full_name'] = $serialNo[$i]['ex_full_name'];
            $results['ex_state'] = $serialNo[$i]['ex_state'];
            $results['ex_modeofentry'] = $serialNo[$i]['ex_modeofentry'];
            $results['ex_first_choice'] = $serialNo[$i]['ex_first_choice'];
            $results['ex_second_choice'] = $serialNo[$i]['ex_second_choice'];
            $results['ex_olevel'] = $serialNo[$i]['ex_olevel'];
            $results['ex_olevel_2'] = $serialNo[$i]['ex_olevel_2'];
            $results['ex_recomd'] = $serialNo[$i]['ex_recomd'];
            $results['ex_apprv'] = $serialNo[$i]['ex_apprv'];
            $results['ex_remark'] = $serialNo[$i]['ex_remark'];
            
            $results['Sno'] = $i+1;
            array_push($stuScore, $results);
        }
        if($print){
            $data['page'] = 'Students Score'; 
            $data['scrPrint'] = $stuScore;      
            $this->load->view('templates/paperscoreheader', $data);
            $this->load->view('pages/admin/mng_stu');
            $this->load->view('templates/paperfooter'); 
        } else{
            $data['page'] = 'Students Score'; 
            $data['scrView'] = $stuScore;      
            $this->load->view('templates/header', $data);
            $this->load->view('pages/admin/mng_stu');
            $this->load->view('templates/footer');
        }
    }
    // delete score
    public function delStudentScoreBtn($id)
    {
        if($this::check_session()){
            $this->Admin_model->delStudentScoreBtn($id);
            $this->printStuScoreTab();
        }
    }
    // start stop exam
    public function startStopExam()
    {
        if($this::check_session()){
            $status =  $this->Students_model->examStatus();
            $data['examDuration'] = $this->Admin_model->getExamDuration();
            if($status['ex_start'] === '1'){
                $data['examStartStatus'] = TRUE;
            }
            $data['startStopExamTab'] = TRUE;
            $this->load->view('pages/admin/mng_stu', $data);
        }
    }
    // start exam btn
    public function startExamBtn()
    {
        if($this::check_session()){
            $this->Admin_model->startExamBtn();
            $status =  $this->Students_model->examStatus();
            if($status['ex_start'] === '1'){
                $data['examStartStatus'] = TRUE;
            }
            $data['startStopExamTab'] = TRUE;
            $this->load->view('pages/admin/mng_stu', $data);
        }
    }
    // stop exam btn
    public function stopExamBtn()
    {
        if($this::check_session()){
            $this->Admin_model->stopExamBtn();
            $status =  $this->Students_model->examStatus();
            if($status['ex_start'] === '1'){
                $data['examStartStatus'] = TRUE;
            }
            $data['startStopExamTab'] = TRUE;
            $this->load->view('pages/admin/mng_stu', $data);
        }
    }
    // set exam duration
    public function setExamDuration()
    {
        if($this::check_session()){
            $this->form_validation->set_rules('examHours', 'Exam Hours', 'required');
            $this->form_validation->set_rules('examMinutes', 'Exam Minutes', 'required');
            if($this->form_validation->run()) { 
                $examHrs = $this->input->post('examHours');
                $examMin = $this->input->post('examMinutes');
                
                $this->Admin_model->setExamDurationBtn($examHrs, $examMin);
                $this->startStopExam();
            }
        }
    }
    // recomandation
    public function recomandationTab()
    {
        $data['recondationTab'] = TRUE;
        $data['courses'] = $this->getDepartments();
        $data['students'] = $this->getStudents();
        $this->load->view('pages/admin/mng_stu', $data);
    }
}