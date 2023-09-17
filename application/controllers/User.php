<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index?q';
            $config['first_url'] = base_url() . 'user/index?q';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MUser->total_rows($q);
        $user = $this->MUser->get_limit_data($config['per_page'], $start, $q);
        $user = $this->db->query("SELECT * FROM user order by id DESC")->result();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'user/user_list';
		$this->load->view('template', $data);
        //$this->load->view('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MUser->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_lengkap' => $row->nama_lengkap,
        'nippos' => $row->nippos,
		'username' => $row->username,
		'password' => $row->password,
		'jabatan' => $row->jabatan,
		'hak_akses' => $row->hak_akses,
	    );
            $data['page'] = 'user/user_read';
            $this->load->view('template', $data);
            //$this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'nama_lengkap' => set_value('nama_lengkap'),
        'nippos' => set_value('nippos'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'jabatan' => set_value('jabatan'),
	    'hak_akses' => set_value('hak_akses'),
	);
        $data['page'] = 'user/user_form';
        $this->load->view('template', $data);
        //$this->load->view('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'nippos' => $this->input->post('nippos',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
	    );

            $this->MUser->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MUser->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
        'nippos' => set_value('nippos', $row->nippos),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'hak_akses' => set_value('hak_akses', $row->hak_akses),
	    );
            $data['page'] = 'user/user_form';
            $this->load->view('template', $data);
            //$this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'nippos' => $this->input->post('nippos',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'hak_akses' => $this->input->post('hak_akses',TRUE),
	    );

            $this->MUser->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MUser->get_by_id($id);

        if ($row) {
            $this->MUser->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
    $this->form_validation->set_rules('nippos', 'nippos', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Hak Akses");

	foreach ($this->MUser->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hak_akses);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-06 18:04:01 */
/* http://harviacode.com */