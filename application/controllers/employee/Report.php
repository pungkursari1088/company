<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("working_permit_model");
        $this->load->model("user_model");
        $this->load->model("absence_model");
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data["working_permits"] = $this->working_permit_model->getDayPermitPerYear($user_id);
        $data["absences"] = $this->absence_model->getSumById($user_id);
        $data["user"] = $this->user_model->getById($user_id);
        $data = $this->calculatePayment($data);
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view('employee/pdf_print', $data);
    }

    public function calculatePayment($data)
    {
        $data["amount"] = new \stdClass();
        if (isset($data["absences"]->work_hours)) {
            $data["amount"]->work_hours = $data["absences"]->work_hours * 90000;
        } else {
            $data["amount"]->work_hours = 0;
        }
        if (isset($data["absences"]->overtime_hours)) {
            $data["amount"]->overtime_hours = $data["absences"]->overtime_hours * 90000;
        } else {
            $data["amount"]->overtime_hours = 0;
        }
        if (isset($data["absences"]->penalty_hours)) {
            $data["amount"]->penalty_hours = $data["absences"]->penalty_hours * 90000;
        }
        if (isset($data["working_permits"]->total_leave_day)) {
            $data["amount"]->total_leave_day = 8 * $data["working_permits"]->total_leave_day * 90000;
        } else {
            $data["amount"]->total_leave_day = 0;
        }
        $data["amount"]->total = $data["amount"]->work_hours +
            $data["amount"]->overtime_hours -
            $data["amount"]->penalty_hours +
            $data["amount"]->total_leave_day;
        $data["amount"]->date = date('m-Y');
        return $data;
    }
}
