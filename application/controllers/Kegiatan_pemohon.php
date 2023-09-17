<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan_pemohon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_pemohon_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kegiatan_pemohon/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kegiatan_pemohon/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kegiatan_pemohon/index.html';
            $config['first_url'] = base_url() . 'kegiatan_pemohon/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kegiatan_pemohon_model->total_rows($q);
        $kegiatan_pemohon = $this->Kegiatan_pemohon_model->get_limit_data($config['per_page'], $start, $q);
         $laporan_kegiatan = $this->db->query("SELECT * FROM laporan_kegiatan")->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kegiatan_pemohon_data' => $kegiatan_pemohon,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'kegiatan_pemohon/kegiatan_pemohon_list';
        $this->load->view('template', $data);
        //$this->load->view('kegiatan_pemohon/kegiatan_pemohon_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kegiatan_pemohon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_k_pemohon' => $row->id_k_pemohon,
		'tgl_kegiatan' => $row->tgl_kegiatan,
		'Jenis_kegiatan' => $row->Jenis_kegiatan,
		'laporan_kegiatan' => $row->laporan_kegiatan,
	    );
        $data['page'] = 'kegiatan_pemohon/kegiatan_pemohon_read';
        $this->load->view('template', $data);
            //$this->load->view('kegiatan_pemohon/kegiatan_pemohon_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kegiatan_pemohon'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kegiatan_pemohon/create_action'),
	    'id_k_pemohon' => set_value('id_k_pemohon'),
	    'tgl_kegiatan' => set_value('tgl_kegiatan'),
	    'Jenis_kegiatan' => set_value('Jenis_kegiatan'),
	    'laporan_kegiatan' => set_value('laporan_kegiatan'),
	);
    $data['page'] = 'kegiatan_pemohon/kegiatan_pemohon_form';
    $this->load->view('template', $data);
        //$this->load->view('kegiatan_pemohon/kegiatan_pemohon_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
		'Jenis_kegiatan' => $this->input->post('Jenis_kegiatan',TRUE),
		'laporan_kegiatan' => $this->input->post('laporan_kegiatan',TRUE),
	    );

            $this->Kegiatan_pemohon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kegiatan_pemohon'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kegiatan_pemohon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kegiatan_pemohon/update_action'),
		'id_k_pemohon' => set_value('id_k_pemohon', $row->id_k_pemohon),
		'tgl_kegiatan' => set_value('tgl_kegiatan', $row->tgl_kegiatan),
		'Jenis_kegiatan' => set_value('Jenis_kegiatan', $row->Jenis_kegiatan),
		'laporan_kegiatan' => set_value('laporan_kegiatan', $row->laporan_kegiatan),
	    );
        $data['page'] = 'kegiatan_pemohon/kegiatan_pemohon_form';
        $this->load->view('template', $data);
           // $this->load->view('kegiatan_pemohon/kegiatan_pemohon_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kegiatan_pemohon/create'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_k_pemohon', TRUE));
        } else {
            $data = array(
		'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
		'Jenis_kegiatan' => $this->input->post('Jenis_kegiatan',TRUE),
		'laporan_kegiatan' => $this->input->post('laporan_kegiatan',TRUE),
	    );

            $this->Kegiatan_pemohon_model->update($this->input->post('id_k_pemohon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kegiatan_pemohon'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kegiatan_pemohon_model->get_by_id($id);

        if ($row) {
            $this->Kegiatan_pemohon_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kegiatan_pemohon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kegiatan_pemohon'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_kegiatan', 'tgl kegiatan', 'trim|required');
	$this->form_validation->set_rules('Jenis_kegiatan', 'jenis kegiatan', 'trim|required');
	$this->form_validation->set_rules('laporan_kegiatan', 'laporan kegiatan', 'trim|required');

	$this->form_validation->set_rules('id_k_pemohon', 'id_k_pemohon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kegiatan_pemohon.php */
/* Location: ./application/controllers/Kegiatan_pemohon.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-02 15:00:53 */
/* http://harviacode.com */