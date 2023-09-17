<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perencanaan_kegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Perencanaan_kegiatan_model','proposal_model'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perencanaan_kegiatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perencanaan_kegiatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perencanaan_kegiatan/index.html';
            $config['first_url'] = base_url() . 'perencanaan_kegiatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perencanaan_kegiatan_model->total_rows($q);
        if ($this->session->userdata('hak_akses') == 'Admin')
        { 
        $perencanaan_kegiatan = $this->db->query("SELECT * FROM perencanaan_kegiatan order by id_perencanaan DESC")->result();
        }
        else {
        $nama = $this->session->userdata('nama_lengkap');
        $perencanaan_kegiatan = $this->db->query("SELECT * FROM perencanaan_kegiatan where nama_lengkap = '$nama' order by id_perencanaan DESC")->result();
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perencanaan_kegiatan_data' => $perencanaan_kegiatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'perencanaan_kegiatan/perencanaan_kegiatan_list';
        $this->load->view('template', $data);
        //$this->load->view('perencanaan_kegiatan/perencanaan_kegiatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->db->query("Select pk.* , pr.* From perencanaan_kegiatan pk join proposal pr where pk.id_perencanaan = '$id' AND pk.id_proposal = pr.id_proposal")->row();
        // print_r($row);die;
        if ($row) {
            $data = array(
		'id_perencanaan' => $row->id_perencanaan,
		'nama_lengkap' => $row->nama_lengkap,
        'Jenis_kegiatan' => $row->Jenis_kegiatan,
		'id_proposal' => $row->id_proposal,
        'tempat_kegiatan' => $row->tempat_kegiatan,
        'tgl_kegiatan' => $row->tgl_kegiatan,
		'biaya_approve' => $row->biaya_approve,
        'rekening_pospay' => $row->rekening_pospay,
		'rapat_kegiatan' => $row->rapat_kegiatan,
		'status_kegiatan' => $row->status_kegiatan,
        'keterangan' => $row->keterangan,
        'proposal' => $row->proposal,
        'surat_pengantar' => $row->surat_pengantar,
	    );
            $data['page'] = 'perencanaan_kegiatan/perencanaan_kegiatan_read';
            $this->load->view('template', $data);
            //$this->load->view('perencanaan_kegiatan/perencanaan_kegiatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_kegiatan'));
        }
    }

    function get_rekening_pospay()
    {
        $id = $this->input->post('id_proposal');
          $data = $this->db->query("SELECT * FROM proposal WHERE id_proposal='$id'")->row();
          echo json_encode($data);
    }

    public function get_tanggal_kegiatan() {
        $id = $this->input->post('id_proposal');
        $data = $this->db->query("SELECT * FROM pembuatan_disposisi WHERE id_proposal='$id'")->row();
        
        if ($data) {
            echo json_encode(array(
                'pengirim' => $data->pengirim,
                'tgl_kegiatan' => $data->tgl_kegiatan
            ));
        } else {
            echo json_encode(array("error" => "Data not found"));
        }
    }
    

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perencanaan_kegiatan/create_action'),
	    'id_perencanaan' => set_value('id_perencanaan'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'id_proposal' => set_value('id_proposal'),
        'tempat_kegiatan' => set_value('tempat_kegiatan'),
        'tgl_kegiatan' => set_value('tgl_kegiatan'),
	    'biaya_approve' => set_value('biaya_approve'),
        'rekening_pospay' => set_value('rekening_pospay'),
	    'rapat_kegiatan' => set_value('rapat_kegiatan'),
	    'status_kegiatan' => set_value('status_kegiatan'),
        'keterangan' => set_value('keterangan'),
	);

          //menambahkan data kode proposal
          $data['list_proposal'] = $this->proposal_model->get_all();
        $data['page'] = 'perencanaan_kegiatan/perencanaan_kegiatan_form';
        $this->load->view('template', $data);
        //$this->load->view('perencanaan_kegiatan/perencanaan_kegiatan_form', $data);
    }
    
    public function create_action() 
    {
        // print_r($_POST);die;
        $this->_rules();
       if($this->form_validation->run() == FALSE){
        $this->create();
        // echo "ok";
       } else {
        $fileUploaded = isset($_FILES['rapat_kegiatan']) && !empty($_FILES['rapat_kegiatan']);


        if ($fileUploaded) {
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '2048'; // kb
            $config['upload_path'] = './assets/perencanaan_kegiatan/';
      
            $this->load->library('upload', $config);
      
            if ($this->upload->do_upload('rapat_kegiatan')) {
              $new_file = $this->upload->data('file_name');
            } else {
              $new_file = "";
            }
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap_hidden',TRUE),
                'id_proposal' => $this->input->post('id_proposal',TRUE),
                'tempat_kegiatan' => $this->input->post('tempat_kegiatan',TRUE),
                'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
                'biaya_approve' => $this->input->post('biaya_approve',TRUE),
                'rekening_pospay' => $this->input->post('rekening_pospay_hidden',TRUE),
                'rapat_kegiatan' => $new_file,
                'status_kegiatan' => $this->input->post('status_kegiatan',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
                );
                    //  print_r($data);die;
                    $this->Perencanaan_kegiatan_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('perencanaan_kegiatan'));
          } else {
            //gagal upload
            $this->session->set_flashdata('message', 'Create Record Failed');
            redirect(site_url('perencanaan_kegiatan'));
          }
       }
            
            
        // }
    }
    
    public function update($id) 
    {
        $row = $this->Perencanaan_kegiatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perencanaan_kegiatan/update_action'),
		'id_perencanaan' => set_value('id_perencanaan', $row->id_perencanaan),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'id_proposal' => set_value('id_proposal', $row->id_proposal),
        'tempat_kegiatan' => set_value('tempat_kegiatan', $row->tempat_kegiatan),
        'tgl_kegiatan' => set_value('tgl_kegiatan', $row->tgl_kegiatan),
		'biaya_approve' => set_value('biaya_approve', $row->biaya_approve),
        'rekening_pospay' => set_value('rekening_pospay', $row->rekening_pospay),
		'rapat_kegiatan' => set_value('rapat_kegiatan', $row->rapat_kegiatan),
		'status_kegiatan' => set_value('status_kegiatan', $row->status_kegiatan),
        'keterangan' => set_value('keterangan', $row->keterangan),
	    );

              //menambahkan data kode proposal
        $data['list_proposal'] = $this->proposal_model->get_all();
            $data['page'] = 'perencanaan_kegiatan/perencanaan_kegiatan_form';
            $this->load->view('template', $data);
            //$this->load->view('perencanaan_kegiatan/perencanaan_kegiatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_kegiatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_perencanaan', TRUE));
        } else {

            $perencanaan_kegiatan = $_FILES['perencanaan_kegiatan'];
            if($perencanaan_kegiatan=''){}else{
            $config['upload_path']   ='./assets/perencanaan_kegiatan';
            $config['allowed_types'] = 'png|jpg|jpeg|gif|pdf|docx';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('perencanaan_kegiatan')){
                echo "Upload Gagal"; die();
            }else{

                $perencanaan_kegiatan=$this->upload->data('file_name');
                print_r($perencanaan_kegiatan);
            }
        }
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'id_proposal' => $this->input->post('id_proposal',TRUE),
        'tempat_kegiatan' => $this->input->post('tempat_kegiatan',TRUE),
        'tgl_kegiatan' => $this->input->post('tgl_kegiatan',TRUE),
		'biaya_approve' => $this->input->post('biaya_approve',TRUE),
        'rekening_pospay' => $this->input->post('rekening_pospay',TRUE),
		'rapat_kegiatan' => $this-$perencanaan_kegiatan,
		'status_kegiatan' => $this->input->post('status_kegiatan',TRUE),
        'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Perencanaan_kegiatan_model->update($this->input->post('id_perencanaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perencanaan_kegiatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perencanaan_kegiatan_model->get_by_id($id);

        if ($row) {
            $this->Perencanaan_kegiatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perencanaan_kegiatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perencanaan_kegiatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap_hidden', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('id_proposal', 'id_proposal', 'trim|required');
    $this->form_validation->set_rules('tempat_kegiatan', 'tempat kegiatan', 'trim|required');
    $this->form_validation->set_rules('tgl_kegiatan', 'tanggal kegiatan', 'trim|required');
	//$this->form_validation->set_rules('biaya_approve', 'biaya approve', 'trim|required');
    $this->form_validation->set_rules('rekening_pospay_hidden', 'rekening pospay', 'trim|required');
	// $this->form_validation->set_rules('rapat_kegiatan', 'rapat kegiatan', 'trim|required');
	// $this->form_validation->set_rules('status_kegiatan', 'status kegiatan', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	// $this->form_validation->set_rules('id_perencanaan', 'id_perencanaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "perencanaan_kegiatan.xls";
        $judul = "perencanaan_kegiatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Proposal");
    xlsWriteLabel($tablehead, $kolomhead++, "Tempat Kegiatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya Approve");
    xlsWriteLabel($tablehead, $kolomhead++, "Rekening Poapay");
	xlsWriteLabel($tablehead, $kolomhead++, "Rapat Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Kegiatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Perencanaan_kegiatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_proposal);
        xlsWriteLabel($tablebody, $kolombody++, $data->tempat_kegiatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biaya_approve);
        xlsWriteLabel($tablebody, $kolombody++, $data->rekening_pospay);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rapat_kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_kegiatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Perencanaan_kegiatan.php */
/* Location: ./application/controllers/Perencanaan_kegiatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-06 18:04:01 */
/* http://harviacode.com */