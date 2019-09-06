<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function StudentsLogin() 
	{
		$this->form_validation->set_rules('admissionNumber', 'Admission No.', 'required');
		$this->form_validation->set_rules('studentPassword', 'Password', 'required');
		
		if($this->form_validation->run() === FALSE) {
			$data['page'] = 'Login'; 
			$this->load->view('templates/header', $data);
			$this->load->view('pages/students/login');
			$this->load->view('templates/footer');
		} else {
			$stuAdmssNo = html_escape($this->input->post('admissionNumber', TRUE));
			$stuPassword = html_escape($this->input->post('studentPassword', TRUE));
			$get_user = $this->Login_model->students_login($stuAdmssNo, $stuPassword);
			if($get_user) {
				$userdata = [
					'student_id' => $get_user['id'],
					'studentAdmsNo' => $get_user['ex_serial_no'],
					'studentName' => $get_user['ex_full_name'],
					'studentFirstChoice' => $get_user['ex_first_choice'],
					'studentDeptId' => $get_user['ex_departments_id']
				];
				$this->session->set_userdata($userdata);
				redirect('students/stu_dashboard');
			} else {
				$this->session->set_flashdata('studentsLogin_message', 'Wrong Admission Number or Password Detected');
				redirect('/');
			}
		}
	}

	public function AdminLogin() 
	{
		$this->form_validation->set_rules('adminUserName', 'User Name.', 'required');
		$this->form_validation->set_rules('adminPassword', 'Password', 'required');
		
		if($this->form_validation->run() === FALSE) {
			$data['page'] = 'Login'; 
			$this->load->view('templates/header');
			$this->load->view('pages/admin/login', $data);
			$this->load->view('templates/footer');
		} else {
			$adminUser = html_escape($this->input->post('adminUserName', TRUE));
			$adminPassword = html_escape($this->input->post('adminPassword', TRUE));
			$get_user = $this->Login_model->admin_login($adminUser, $adminPassword);
			if($get_user) {
				$userdata = [
					'admin_id' => $get_user['id'],
					'adminUserName' => $get_user['ex_admin_user']
				];
				$this->session->set_userdata($userdata);
				redirect('admin/dashboard');
			} else {
				// $pas = password_hash($adminPassword, PASSWORD_DEFAULT);
				$this->session->set_flashdata('adminLogin_message', 'Wrong Username or Password Detected');
				redirect('admin');
			}
		}
	}
	
}
