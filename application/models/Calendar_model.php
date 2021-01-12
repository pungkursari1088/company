<?php
class Calendar_model extends CI_Model
{
    private $_table = "calendar";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
