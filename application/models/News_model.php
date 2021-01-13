<?php
class News_model extends CI_Model
{
    private $_table = "news";

    public $id;
    public $title;
    public $description;
    public $created_at;

    public function rules()
    {
        return [
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ],

            [
                'field' => 'created_at',
                'label' => 'Created_at',
                'rules' => 'required'
            ]

        ];
    }

    public function get_count()
    {
        return $this->db->count_all($this->_table);
    }

    public function get_news($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->_table);
        return $query->result();
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->title = $post["title"];
        $this->description = $post["description"];
        $this->created_at = $post["created_at"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->title = $post["title"];
        $this->description = $post["description"];
        $this->created_at = $post["created_at"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
