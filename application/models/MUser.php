<?php 
class MUser extends CI_Model
{
    public $table = 'user';
    public $id ='id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //login
     //Cek user
   //login
    function login($username,$password)
    {
        $this->db->from($this->table);
        $this->db->where('username' , $username);
        $this->db->where('password' , $password);
        $result = $this->db->count_all_results();
        if ($result){
            return true;
        } else{
            return false;
        }
    }
     //Cek user
     public function CheckUser($username, $password)
     {
         $query = $this->db->get_where($this->table,
                 array('username'=>$username,
                       'password'=>$password)
                 );
         //cek apakah ada atau tidak
          if ($query->num_rows() > 0){
              return true;
          } else {
              return false;
          }
     }

    function get_key($username)
    {
        $this->db->select('u.username, u.nama,u.password, u.hak_akses');
        $this->db->from('user u');
        $this->db->where('u.username', $username);
        // $this->db->join('keys k', 'u.id = k.user_id', 'left');
        return $this->db->get()->row();
    }

    function get_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get($this->table)->row();
    }

    //get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get total rows
    function total_rows()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

     // get data with limit and search
     function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('hak_akses', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    //insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); // mengambil id terakhir
    }

    //update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    //delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
?>