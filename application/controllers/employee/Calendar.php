<?php
class Calendar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("calendar_model");
        // if ($this->session->userdata('logged_in') !== TRUE) {
        //     redirect('login');
        // }
    }

    function index()
    {
        $data["results"] = $this->calendar_model->getAll();
        $this->load->view('employee/calender', $data);
    }
}
