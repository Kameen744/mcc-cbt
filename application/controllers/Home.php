<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['page'] = 'Login'; 
		$this->load->view('templates/header', $data);
		$this->load->view('pages/students/login');
		$this->load->view('templates/footer');
    }
    public function erorrPage() {
        $data['page'] = '404'; 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/404');
		$this->load->view('templates/footer');
    }
}
