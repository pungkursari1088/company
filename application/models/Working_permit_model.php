<?php
class Working_permit_model extends CI_Model
{
    private $_table = "working_permits";

    public $id;
    public $user_id;
    public $date_start;
    public $date_finish;
    public $total_leave_day;


    public function rules()
    {
        return [
            [
                'field' => 'user_id',
                'label' => 'User_id',
                'rules' => 'required'
            ],

            [
                'field' => 'date_start',
                'label' => 'Date_start',
                'rules' => 'required'
            ],

            [
                'field' => 'date_finish',
                'label' => 'Date_finish',
                'rules' => 'required'
            ],

            [
                'field' => 'total_leave_day',
                'label' => 'Total_leave_day',
                'rules' => 'required'
            ],

        ];
    }

    public function getPermitbyEmployee($user_id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $user_id])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $array = array(
            'user_id' => $post["user_id"],
            'date_start' => date('Y-m-d', strtotime($post["date_start"])),
            'date_finish' => date('Y-m-d', strtotime($post["date_finish"])),
            'total_leave_day' => $post["total_leave_day"],
        );
        $this->db->insert($this->_table, $array);
    }

    public function getById($user_id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $user_id])->row();
    }

    public function getDayPermitPerYear($user_id)
    {
        return $this->db->select_sum('total_leave_day')
            ->where('user_id', $user_id)
            ->where('year(date_start)', date('Y'))
            ->get('working_permits')->row();
    }
}
