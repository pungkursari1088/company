<?php
class Absence_model extends CI_Model
{
    private $_table = "absences";

    public $id;
    public $user_id;
    public $entry_hour;
    public $leave_hour;
    public $work_hours;
    public $overtime_hours;
    public $penalty_hours;


    public function rules()
    {
        return [];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getSumById($user_id)
    {
        return $this->db->select('SUM(work_hours) AS work_hours,
        SUM(overtime_hours) AS overtime_hours,
        SUM(penalty_hours) AS penalty_hours')
            ->where('user_id', $user_id)
            ->where('year(entry_hour)', date('Y'))
            ->where('month(entry_hour)', date('m'))
            ->get('absences')->row();
    }

    public function saveEntryHour($user_id = NULL)
    {
        $now = date("Y-m-d H:i:s");
        $this->user_id = $user_id;
        $this->entry_hour = $now;
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

    public function getAbsence($user_id = NULL)
    {
        $now = date("Y-m-d");
        $array = array(
            'user_id' => $user_id,
            'Date(entry_hour)' => $now
        );
        return $this->db->get_where($this->_table, $array)->row();
    }

    public function setAbsenceLeave($absence = NULL)
    {
        $this->id = $absence->id;
        $this->user_id = $absence->user_id;
        $this->entry_hour = $absence->entry_hour;
        $this->leave_hour = date("Y-m-d H:i:s", $absence->leave_hour);
        $this->work_hours = $absence->work_hours;
        $this->overtime_hours = $absence->overtime_hours;
        $this->penalty_hours = $absence->penalty_hours;
        $this->db->update($this->_table, $this, array('id' => $absence->id));
    }
}
