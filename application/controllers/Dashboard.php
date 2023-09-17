<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
		$this->load->model('Pembuatan_disposisi_model');
		$this->load->model('Laporan_kegiatan_model');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data['hitungProposal'] = $this->Proposal_model->hitung();
		$data['hitungPembuatan_disposisi'] = $this->Pembuatan_disposisi_model->hitung();
		$data['hitungLaporan_kegiatan'] = $this->Laporan_kegiatan_model->hitung();
		
		$data['page'] = 'dashboard_view';

		// print_r($data['notif']);die;
		$this->load->view('template', $data);
		//$this->load->view('dashboard_view');
	}
}
