<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
    }

        public function index() 
    
    {
        $this->load->view('login_view');
    }

function register()
{
    $this->load->view('register');
}

function reg_save()
{
    // load model
    $this->load->model(array('MUser'));
    $this->load->library('session');
    $nama_lengkap = $this->input->post ('nama_lengkap');
    $username = $this->input->post ('username');
    $password = $this->input->post ('password');
    $user = $this->db->query("SELECT * FROM user where username = '$username'")->row();
    //simpan data ke table user
    $data_user = array(
        'nama_lengkap'=>$nama_lengkap,
        'username'=>$username,
        'password'=>$password
    );
    
        if ($user){
            // $this->session->set_flashdata('message', 'Username Sudah Terdaftar');
            // $data['error'] = 'username sudah terdaftar';
            	$this->session->set_flashdata('pesan', 'Username Sudah Terdaftar');
            redirect(site_url('login/register'));
        } else {
             $id_user = $this->MUser->insert($data_user);
        }
    

    //simpan data ke table key
    $data_keys = array(
        'user_id' => $id_user,
        'key' => md5(date('y-m-d H:i:s')),
        'level' => '1',
        'date_created' => '1'
    );
    redirect ('login');
}

    function validasi()
	{
		$username =$this->input->post('username');
		$password =$this->input->post('password');
		if ($this->MUser->CheckUser($username, $password) == true){
			//echo "Usename dan Password Benar";
			$row =$this->MUser->get_by_username($username);
           $notif = $this->db->query('select count(*) as jml from proposal where status = "Belum Di Disposisi"')->row();
           $notif_client = $this->db->query('select count(*) as jml from perencanaan_kegiatan where nama_lengkap ="'.$row->nama_lengkap.'"')->row();
        //    print_r($notif);die;
        //    foreach ($notif as $nt) {

               //print_r($row); exit;
               $data_user = array(
                'username' => $username,
                'password' => $row->password,
                'nama_lengkap' => $row->nama_lengkap,
                'rekening_pospay' => $row->rekening_pospay,
                'hak_akses' => $row->hak_akses,
                'notif' => ($row->hak_akses == 'Admin') ? $notif->jml : $notif_client->jml,
                'is_Login' => true,
            );
            //    print_r($data_user);die;
        //    }
			$this->session->set_userdata($data_user);
			redirect('Dashboard');
			exit;
		} else {
			//echo "Usename dan Password Salah";
			$this->session->set_flashdata('pesan', 'Username atau Password Anda Salah');
			redirect ('Login');
			exit;
		}
		//exit;
	}
    function logout()
    {
        session_destroy();
        redirect('Login');
    }

    
}