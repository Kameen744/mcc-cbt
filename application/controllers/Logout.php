<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller 
{
    public function unsetData($data)
    {
        $this->session->unset_userdata($data);
    }

    public function studentsLogout()
    {
        $this->unsetData('student_id');
        $this->unsetData('studentAdmsNo');
        redirect('/');
    }

    public function adminLogout()
    {
        $this->unsetData('admin_id');
        $this->unsetData('adminUserName');
        redirect('/admin');
    }
}