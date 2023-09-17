<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembuatan_disposisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Pembuatan_disposisi_model','proposal_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembuatan_disposisi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembuatan_disposisi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembuatan_disposisi/index.html';
            $config['first_url'] = base_url() . 'pembuatan_disposisi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembuatan_disposisi_model->total_rows($q);
       // $pembuatan_disposisi = $this->Pembuatan_disposisi_model->get_limit_data($config['per_page'], $start, $q);
       $pembuatan_disposisi = $this->db->query("SELECT * FROM pembuatan_disposisi order by id_disposisi DESC")->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembuatan_disposisi_data' => $pembuatan_disposisi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'pembuatan_disposisi/pembuatan_disposisi_list';
        $this->load->view('template', $data);
        //$this->load->view('pembuatan_disposisi/pembuatan_disposisi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembuatan_disposisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_disposisi' => $row->id_disposisi,
		'id_proposal' => $row->id_proposal,
		'pengirim' => $row->pengirim,
		'kualifikasi' => $row->kualifikasi,
		'ditindak_lanjuti' => $row->ditindak_lanjuti,
		'catatan_khusus' => $row->catatan_khusus,
		//'biaya_approve' => $row->biaya_approve,
		//'tgl_kegiatan' => $row->tgl_kegiatan,
	    );
        $data['page'] = 'pembuatan_disposisi/pembuatan_disposisi_read';
        $this->load->view('template', $data);
           // $this->load->view('pembuatan_disposisi/pembuatan_disposisi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembuatan_disposisi'));
        }
    }

    public function create($id_proposal) 
    {
        $join = $this->db->query('select * from proposal where id_proposal ='.$id_proposal)->row();   
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembuatan_disposisi/create_action'),
            'hasil' => $join,
	    'id_disposisi' => set_value('id_disposisi'),
	    'id_proposal' => set_value('id_proposal'),
	    'pengirim' => set_value('pengirim'),
	    'kualifikasi' => set_value('kualifikasi'),
	    'ditindak_lanjuti' => set_value('ditindak_lanjuti'),
	    'catatan_khusus' => set_value('catatan_khusus'),
	    //'biaya_approve' => set_value('biaya_approve'),
	    //'tgl_kegiatan' => set_value('tgl_kegiatan'),
	);
    // print_r($data);die;

     //menambahkan data kode proposal
     $data['list_proposal'] = $this->proposal_model->get_all();
   

    $data['page'] = 'pembuatan_disposisi/pembuatan_disposisi_form';
    $this->load->view('template', $data);
    //$this->load->view('pembuatan_disposisi/pembuatan_disposisi_form', $data);
    }
    
    public function create_action() 
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'pengirim' => $this->input->post('pengirim',TRUE),
		'kualifikasi' => $this->input->post('kualifikasi',TRUE),
		'ditindak_lanjuti' => $this->input->post('ditindak_lanjuti',TRUE),
		'catatan_khusus' => $this->input->post('catatan_khusus',TRUE),
		//'biaya_approve' => $this->input->post('biaya_approve',TRUE),
		//'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
	    );

        $data1 = array(
            'status' => 'Sudah Di Disposisi'
        );

        $this->Pembuatan_disposisi_model->insert($data);
        $this->proposal_model->update($this->input->post('id_proposal', TRUE), $data1);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembuatan_disposisi'));
        }
    }
    
    public function update($id) 
    {
      
        $row = $this->Pembuatan_disposisi_model->get_by_id($id);

        if ($row) {
            
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembuatan_disposisi/update_action'),
                // 'hasil' => $join,
		'id_disposisi' => set_value('id_disposisi', $row->id_disposisi),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'pengirim' => set_value('pengirim', $row->pengirim),
		'kualifikasi' => set_value('kualifikasi', $row->kualifikasi),
		'ditindak_lanjuti' => set_value('ditindak_lanjuti', $row->ditindak_lanjuti),
		'catatan_khusus' => set_value('catatan_khusus', $row->catatan_khusus),
		//'biaya_approve' => set_value('biaya_approve', $row->biaya_approve),
		//'tgl_kegiatan' => set_value('tgl_kegiatan', $row->tgl_kegiatan),
	    );
        $join = $this->db->query('select * from proposal where id_proposal ='. $row->id_proposal)->row();   
        $data['hasil']= $join;
       

      //menambahkan data kode proposal
        $data['list_proposal'] = $this->proposal_model->get_all();
        $data['page'] = 'pembuatan_disposisi/pembuatan_disposisi_form';
        $this->load->view('template', $data);
            //$this->load->view('pembuatan_disposisi/pembuatan_disposisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembuatan_disposisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_disposisi', TRUE));
        } else {
            $data = array(
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'pengirim' => $this->input->post('pengirim',TRUE),
		'kualifikasi' => $this->input->post('kualifikasi',TRUE),
		'ditindak_lanjuti' => $this->input->post('ditindak_lanjuti',TRUE),
		'catatan_khusus' => $this->input->post('catatan_khusus',TRUE),
		//'biaya_approve' => $this->input->post('biaya_approve',TRUE),
		//'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
	    );

            $this->Pembuatan_disposisi_model->update($this->input->post('id_disposisi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembuatan_disposisi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembuatan_disposisi_model->get_by_id($id);

        if ($row) {
            $this->Pembuatan_disposisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembuatan_disposisi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembuatan_disposisi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_proposal', 'id proposal', 'trim|required');
	$this->form_validation->set_rules('pengirim', 'pengirim', 'trim|required');
	$this->form_validation->set_rules('kualifikasi', 'kualifikasi', 'trim|required');
	$this->form_validation->set_rules('ditindak_lanjuti', 'ditindak lanjuti', 'trim|required');
	$this->form_validation->set_rules('catatan_khusus', 'catatan khusus', 'trim|required');
	//$this->form_validation->set_rules('biaya_approve', 'biaya approve', 'trim|required');
	//$this->form_validation->set_rules('tgl_kegiatan', 'tgl kegiatan', 'trim|required');

	$this->form_validation->set_rules('id_disposisi', 'id_disposisi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembuatan_disposisi.php */
/* Location: ./application/controllers/Pembuatan_disposisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-25 18:29:17 */
/* http://harviacode.com */