<?php
// use \Datetime;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Proposal_model','proposal_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
    
        if ($q <> '') {
            $config['base_url'] = base_url() . 'proposal/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'proposal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'proposal/index.html';
            $config['first_url'] = base_url() . 'proposal/index.html';
        }
    
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Proposal_model->total_rows($q);
    
        // Get the most recent data by sorting based on the 'created_at' timestamp field in descending order
        $proposal = $this->Proposal_model->get_recent_data($config['per_page'], $start, $q);
        $proposal = $this->db->query("SELECT * FROM proposal order by id_proposal DESC")->result();
    
        $this->load->library('pagination');
        $this->pagination->initialize($config);
    
        $data = array(
            'proposal_data' => $proposal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'proposal/proposal_list';
        $this->load->view('template', $data);
        //$this->load->view('proposal/proposal_list', $data);
    }
    

    public function read($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proposal' => $row->id_proposal,
		'kode_proposal' => $row->kode_proposal,
		'nama_lengkap' => $row->nama_lengkap,
		'Jenis_kegiatan' => $row->Jenis_kegiatan,
        'rekening_pospay' => $row->rekening_pospay,
		'tanggal_terima' => $row->tanggal_terima,
		'proposal' => $row->proposal,
		'surat_pengantar' => $row->surat_pengantar,
        'status' => $row->status,
	    );
            $data['page'] = 'proposal/proposal_read';
            $this->load->view('template', $data);
            //$this->load->view('proposal/proposal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proposal/create_action'),
	    'id_proposal' => set_value('id_proposal'),
	    // 'kode_proposal' => set_value('kode_proposal'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'Jenis_kegiatan' => set_value('Jenis_kegiatan'),
        'rekening_pospay' => set_value('rekening_pospay'),
	    'tanggal_terima' => set_value('tanggal_terima'),
	    'proposal' => set_value('proposal'),
	    'surat_pengantar' => set_value('surat_pengantar'),
        'status' => set_value('status'),
	);

   

        $data['page'] = 'proposal/proposal_form';
        $this->load->view('template', $data);
        //$this->load->view('proposal/proposal_form', $data);
    }
    
    public function create_action() 
    {
        $this->load->library('session');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            $config['upload_path']   ='./assets/proposal';
            $config['allowed_types'] = 'jpg|jpeg|gif|pdf|docx';
            $this->load->library('upload',$config);
    
            //proposal
            if(!empty($_FILES['proposal']['name'])){
               $this->upload->do_upload('proposal');
               $data=$this->upload->data();
               $proposal=$data['file_name'];
            }
              else {
                $proposal=null;
            }
            //surat pengantar
            if(!empty($_FILES['surat_pengantar']['name'])){
               $this->upload->do_upload('surat_pengantar');
               $data=$this->upload->data();
               $surat_pengantar=$data['file_name'];
            }
            else {
                $surat_pengantar=null;
            }
           // Tanggal terima menggunakan tanggal hari ini
        $tanggal_terima = new DateTime(); // Mendapatkan tanggal hari ini
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
            'Jenis_kegiatan' => $this->input->post('Jenis_kegiatan', TRUE),
            'rekening_pospay' => $this->input->post('rekening_pospay', TRUE),
            'tanggal_terima' => $tanggal_terima->format('Y-m-d'), // Format tanggal sesuai kebutuhan (misal: YYYY-MM-DD)
            'proposal' => $proposal,
            'surat_pengantar' => $surat_pengantar,
            //'status' => $this->input->post('status', TRUE),
        );
        // print_r($data);die;
       
        $this->Proposal_model->insert($data);
        $this->session->set_flashdata('message', 'Proposal Berhasil Disimpan');
            redirect(site_url('proposal/create'));
        }
    }
    
    
    public function update($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proposal/update_action'),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
		'kode_proposal' => set_value('kode_proposal', $row->kode_proposal),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'Jenis_kegiatan' => set_value('Jenis_kegiatan', $row->Jenis_kegiatan),
        'rekening_pospay' => set_value('rekening_pospay', $row->rekening_pospay),
		'tanggal_terima' => set_value('tanggal_terima', $row->tanggal_terima),
		'proposal' => set_value('proposal', $row->proposal),
		'surat_pengantar' => set_value('surat_pengantar', $row->surat_pengantar),
        'status' => set_value('status', $row->status),
	    );
        $data['page'] = 'proposal/proposal_form';
        $this->load->view('template', $data);
           // $this->load->view('proposal/proposal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proposal', TRUE));
        } else {
            $data = array(
		'kode_proposal' => $this->input->post('kode_proposal',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'Jenis_kegiatan' => $this->input->post('Jenis_kegiatan',TRUE),
        'rekening_pospay' => $this->input->post('rekening_pospay',TRUE),
		'tanggal_terima' => $this->input->post('tanggal_terima',TRUE),
		'proposal' => $this->input->post('proposal',TRUE),
		'surat_pengantar' => $this->input->post('surat_pengantar',TRUE),
        'status' => $this->input->post('status',TRUE),
	    );

            $this->Proposal_model->update($this->input->post('id_proposal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proposal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Proposal_model->get_by_id($id);

        if ($row) {
            $this->Proposal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proposal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proposal'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('kode_proposal', 'kode proposal', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('Jenis_kegiatan', 'jenis kegiatan', 'trim|required');
    $this->form_validation->set_rules('rekening_pospay', 'rekening pospay', 'trim|required');
	// $this->form_validation->set_rules('tanggal_terima', 'tanggal terima', 'trim|required');
	// $this->form_validation->set_rules('proposal', 'proposal', 'trim|required');
	// $this->form_validation->set_rules('surat_pengantar', 'surat pengantar', 'trim|required');
   // $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_proposal', 'id_proposal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    // public function get_nomor_otomatis()
    // {
    //     $this->load->database();
    //     $sql = "SELECT MAX(id_proposal) AS maxid FROM proposal";
    //     $result = $this->db->query($sql)->row();
    //     $no_otomatis = $result->maxid ? $result->maxid + 1 : 1;
    //     echo $no_otomatis;
    // }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "proposal.xls";
        $judul = "proposal";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Proposal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kegiatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Rekening Pospay");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Terima");
	xlsWriteLabel($tablehead, $kolomhead++, "Proposal");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Pengantar");
    xlsWriteLabel($tablehead, $kolomhead++, "status");

	foreach ($this->Proposal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_proposal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_kegiatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->rekening_pospay);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_terima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->proposal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surat_pengantar);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
    
     

}



/* End of file Proposal.php */
/* Location: ./application/controllers/Proposal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-06 18:04:01 */
/* http://harviacode.com */