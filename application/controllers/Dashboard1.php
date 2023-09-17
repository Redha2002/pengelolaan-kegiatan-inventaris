<?php

class Dashboard1 extends CI_Controller
{

    public function index()
    {
        $data['dasbor'] = 'dashboard1/dashboard';
        return $this->load->view('dashboard1/dashboard_view', $data);
        // $this->load->view('akun');

        // $usr = $this->session->userdata('username');
        // $this->load->model(array('MUser'));
        // $data['dasbor'] = 'dashboard1';
        // // $data['abud'] = 'akun';
        // $data['res'] = $this->MUser->get_key($usr);
        // $this->load->view('dashboard1', $data);

    }
}