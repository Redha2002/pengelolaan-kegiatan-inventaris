<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_kegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Laporan_kegiatan_model','perencanaan_kegiatan_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $tgl_awal = $this->input->get('tgl_awal', true);
        $tgl_akhir = $this->input->get('tgl_akhir', true);

        // Cek apakah tgl_awal dan tgl_akhir ada nilai atau tidak
        if (empty($tgl_awal)) {
            $tgl_awal = null;
        }
        if (empty($tgl_akhir)) {
            $tgl_akhir = null;
        }
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_kegiatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_kegiatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_kegiatan/index.html';
            $config['first_url'] = base_url() . 'laporan_kegiatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->Laporan_kegiatan_model->total_rows($q, $tgl_awal, $tgl_akhir);
        // $laporan_kegiatan = $this->Laporan_kegiatan_model->get_limit_data($config['per_page'], $start, $q, $tgl_awal, $tgl_akhir);
        $laporan_kegiatan = $this->db->query("SELECT * FROM laporan_kegiatan order by id_laporan DESC")->result();


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_kegiatan_data' => $laporan_kegiatan,
            'q' => $q,
            // 'tgl_awal' => $tgl_awal, // Pass the date filter values to the view
            // 'tgl_akhir' => $tgl_akhir,
            'pagination' => $this->pagination->create_links(),
            // 'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'laporan_kegiatan/laporan_kegiatan_list';
        $this->load->view('template', $data);
        //$this->load->view('laporan_kegiatan/laporan_kegiatan_list', $data);
    }

    public function filter_function() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        // Lakukan filter data berdasarkan tanggal
       

        // Kirim data ke view
        $laporan_data = $this->db->query("SELECT * FROM laporan_kegiatan WHERE tgl_kegiatan >= '$start_date' AND tgl_kegiatan <= '$end_date' order by id_laporan DESC")->result();
        $data['laporan_kegiatan_data'] = $laporan_data;
        // print_r($data['laporan_kegiatan_data']);die;
        $data['page'] = 'laporan_kegiatan/laporan_kegiatan_filter';
       
        $this->load->view('template', $data);
    }

    

    public function read($id) 
    {
        $row = $this->Laporan_kegiatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan' => $row->id_laporan,
        'id_perencanaan' => $row->id_perencanaan,
		'id_proposal' => $row->id_proposal,
		'tgl_kegiatan' => $row->tgl_kegiatan,
		'laporan_kegiatan' => $row->laporan_kegiatan,
		'jenis_kegiatan' => $row->jenis_kegiatan,
	    );
            $data['page'] = 'laporan_kegiatan/laporan_kegiatan_read';
            $this->load->view('template', $data);
            //$this->load->view('laporan_kegiatan/laporan_kegiatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kegiatan'));
        }
    }

    public function create($id) 
    {
        $perencanaan = $this->db->query("select * from perencanaan_kegiatan where id_perencanaan = '$id'")->row();
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_kegiatan/create_action'),
	    'id_laporan' => set_value('id_laporan'),
        'id_perencanaan' => $perencanaan->id_perencanaan,
	    'id_proposal' => set_value('id_proposal'),
	    'tgl_kegiatan' => set_value('tgl_kegiatan'),
	    'laporan_kegiatan' => set_value('laporan_kegiatan'),
	    'jenis_kegiatan' => set_value('jenis_kegiatan'),
	);

        //menambahkan data kode proposal
        // $data['list_proposal'] = $this->proposal_model->get_all();

        $data['page'] = 'laporan_kegiatan/laporan_kegiatan_form';
        $this->load->view('template', $data);
        //$this->load->view('laporan_kegiatan/laporan_kegiatan_form', $data);
    }

    public function kegiatan($id) 
    {
        $perencanaan = $this->db->query("select * from perencanaan_kegiatan where id_perencanaan = '$id'")->row();
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_kegiatan/create_action'),
	    'id_laporan' => set_value('id_laporan'),
        'id_perencanaan' => $perencanaan->id_perencanaan,
	    'id_proposal' => set_value('id_proposal'),
	    'tgl_kegiatan' => set_value('tgl_kegiatan'),
	    'laporan_kegiatan' => set_value('laporan_kegiatan'),
	    'jenis_kegiatan' => set_value('jenis_kegiatan'),
	);

        //menambahkan data kode proposal
        // $data['list_proposal'] = $this->proposal_model->get_all();

        $data['page'] = 'laporan_kegiatan/laporan_kegiatan_form';
        $this->load->view('template', $data);
        //$this->load->view('laporan_kegiatan/laporan_kegiatan_form', $data);
    }

    public function kegiatan_action(){
        $laporan_kegiatan = $_FILES['laporan_kegiatan'];
        if($laporan_kegiatan=''){}else{
        $config['upload_path']   ='./assets/laporan_kegiatan';
        $config['allowed_types'] = 'png|jpg|jpeg|gif|pdf|docx';

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('laporan_kegiatan')){
            echo "Upload Gagal"; die();
        }else{

            $laporan_kegiatan=$this->upload->data('file_name');
            print_r($laporan_kegiatan);
        }

        }
        $data = array(
            'id_perencanaan' => $this->input->post('id_perencanaan',TRUE),
            'id_proposal' => $this->input->post('id_proposal',TRUE),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
            'laporan_kegiatan' => $laporan_kegiatan,
            'jenis_kegiatan' => $this->input->post('jenis_kegiatan',TRUE),
            );
    
                $this->Laporan_kegiatan_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('perencanaan_kegiatan'));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $laporan_kegiatan = $_FILES['laporan_kegiatan'];
            if($laporan_kegiatan=''){}else{
            $config['upload_path']   ='./assets/laporan_kegiatan';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|pdf|docx';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('laporan_kegiatan')){
                echo "Upload Gagal"; die();
            }else{

                $laporan_kegiatan=$this->upload->data('file_name');
                print_r($laporan_kegiatan);
            }
        }
            $data = array(
        'id_perencanaan' => $this->input->post('id_perencanaan',TRUE),
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
		'laporan_kegiatan' => $laporan_kegiatan,
		'jenis_kegiatan' => $this->input->post('jenis_kegiatan',TRUE),
	    );

            $this->Laporan_kegiatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perencanaan_kegiatan'));
        }
    }

    public function edit($nama_lengkap) {
        // Ambil data dari database berdasarkan nis
        $data['tampil'] = $this->db->get_where('perencanaan_kegiatan', array('nama_lengkap' => $nama_lengkap))->row_array();

        $this->load->view('laporan_kegiatan', $data);
    }

    
    public function update($id) 
    {
        $row = $this->Laporan_kegiatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_kegiatan/update_action'),
		'id_laporan' => set_value('id_laporan', $row->id_laporan),
        'id_perencanaan' => set_value('id_perencanaan', $row->id_perencanaan),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'tgl_kegiatan' => set_value('tgl_kegiatan', $row->tgl_kegiatan),
		'laporan_kegiatan' => set_value('laporan_kegiatan', $row->laporan_kegiatan),
		'jenis_kegiatan' => set_value('jenis_kegiatan', $row->jenis_kegiatan),
	    );

             //menambahkan data kode proposal
             $data['list_proposal'] = $this->proposal_model->get_all();
            $data['page'] = 'laporan_kegiatan/laporan_kegiatan_form';
            $this->load->view('template', $data);
            //$this->load->view('laporan_kegiatan/laporan_kegiatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kegiatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan', TRUE));
        } else {

            $laporan_kegiatan = $_FILES['laporan_kegiatan'];
            if($laporan_kegiatan=''){}else{
            $config['upload_path']   ='./assets/laporan_kegiatan';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|pdf|docx';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('laporan_kegiatan')){
                echo "Upload Gagal"; die();
            }else{

                $laporan_kegiatan=$this->upload->data('file_name');
                print_r($laporan_kegiatan);
            }
        }
            $data = array(
        'id_perencanaan' => $this->input->post('id_perencanaan',TRUE),
		'id_proposal' => $this->input->post('id_proposal',TRUE),
		'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
		'laporan_kegiatan' => $laporan_kegiatan,
		'jenis_kegiatan' => $this->input->post('jenis_kegiatan',TRUE),
	    );

            $this->Laporan_kegiatan_model->update($this->input->post('id_laporan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_kegiatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_kegiatan_model->get_by_id($id);

        if ($row) {
            $this->Laporan_kegiatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_kegiatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kegiatan'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_perencannan', 'id perencanaan', 'trim|required');
	$this->form_validation->set_rules('id_proposal', 'id proposal', 'trim|required');
	$this->form_validation->set_rules('tgl_kegiatan', 'tgl kegiatan', 'trim|required');
	//$this->form_validation->set_rules('laporan_kegiatan', 'laporan kegiatan', 'trim|required');
	$this->form_validation->set_rules('jenis_kegiatan', 'jenis kegiatan', 'trim|required');

	$this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laporan_kegiatan.php */
/* Location: ./application/controllers/Laporan_kegiatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-22 09:49:07 */
/* http://harviacode.com */