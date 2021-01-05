<?php
class User_model extends CI_Model
{
    private $_table = "tbl_users";

    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_level;
    public $start_join_company;


    public function rules()
    {
        return [
            [
                'field' => 'user_name',
                'label' => 'User_name',
                'rules' => 'required'
            ],

            [
                'field' => 'user_email',
                'label' => 'User_email',
                'rules' => 'valid_email|required'
            ],

            [
                'field' => 'user_level',
                'label' => 'User_level',
                'rules' => 'required'
            ],

            [
                'field' => 'start_join_company',
                'label' => 'Start_join_company',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($user_id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $user_id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_name = $post["user_name"];
        $this->user_email = $post["user_email"];
        $this->user_password = md5($post["user_password"]);
        $this->user_level = $post["user_level"];
        $this->start_join_company = $post["start_join_company"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["user_id"];
        $this->user_name = $post["user_name"];
        $this->user_email = $post["user_email"];
        $this->user_password = $post["user_password"];
        $this->user_level = $post["user_level"];
        $this->start_join_company = $post["start_join_company"];
        $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function delete($user_id)
    {
        return $this->db->delete($this->_table, array("user_id" => $user_id));
    }

    // function create_member()
    // {
    //     $new_member_insert_data = array(
    //         'username' => $this->input->post("username"),
    //         'password' => md5($this->input->post("password")),
    //         'email'    => $this->input->post("email")
    //     );

    //     $insert = $this->db->insert("user", $new_member_insert_data);

    //     return true;
    // }

    // get data with limit and search
    // function get_limit_data($limit, $start = 0, $q = NULL) {
    //     $this->db->order_by($this->id, $this->order);
    //     $this->db->like('id', $q);
    // $this->db->or_like('code_rfid', $q);
    // $this->db->or_like('user_id', $q);
    // $this->db->limit($limit, $start);
    //     return $this->db->get($this->table)->result();
    // }
}
