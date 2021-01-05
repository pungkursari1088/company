<?php
class Rfid_model extends CI_Model
{
    private $_table = "rfid_employees";

    public $id;
    public $code_rfid;
    public $user_id;


    public function rules()
    {
        return [
            [
                'field' => 'code_rfid',
                'label' => 'Code_rfid',
                'rules' => 'required'
            ],

            [
                'field' => 'user_id',
                'label' => 'User_id',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        $this->db->select('re.id,
        tu.user_name,
        re.code_rfid');
        $this->db->from('rfid_employees AS re');
        $this->db->join('tbl_users AS tu', 'tu.user_id = re.user_id', 'left');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->code_rfid = $post["code_rfid"];
        $this->user_id = $post["user_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->code_rfid = $post["code_rfid"];
        $this->user_id = $post["user_id"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    public function getUserById($code_rfid)
    {
        return $this->db->get_where($this->_table, ["code_rfid" => $code_rfid])->row();
    }
}
