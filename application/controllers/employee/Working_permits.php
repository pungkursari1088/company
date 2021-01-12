<?php
class Working_permits extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("working_permit_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {
        $data["working_permits"] = $this->working_permit_model->getPermitbyEmployee($this->session->userdata('user_id'));
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("employee/working_permit/list", $data);
    }

    public function add()
    {
        //Cek apakah sudah bekerja selama setahun
        if ($this->getEmployeeYearPermit()) {

            //set data yang dibutuhkan saat meload pertama kali 
            $data = $this->getData();

            //tambah data jika validasi berhasil 
            $this->addPermit();
            $this->load->view("employee/working_permit/new_form", $data);
        } else {
            $this->session->set_flashdata('error', 'Anda Belum Setahun Bekerja !');
            $this->load->view("employee/welcome");
        }
    }

    //data yang diambil berupa sudah berapa hari cuti yang diambil ditahun ini 
    //di kurangi dengan maksimal jumlah cuti per tahun
    //dan id_user untuk nanti memasukkan data
    public function getData()
    {
        $data["working_permit"] = $this->working_permit_model->getDayPermitPerYear($this->session->userdata('user_id'));
        $data["working_permit"]->total_leave_day = 15 - $data["working_permit"]->total_leave_day;
        $data["working_permit"]->user_id = $this->session->userdata('user_id');
        return $data;
    }

    public function addPermit()
    {
        $working_permit = $this->working_permit_model;
        $validation = $this->form_validation;
        $validation->set_rules($working_permit->rules());
        if ($validation->run()) {
            $working_permit->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
    }

    public function getEmployeeYearPermit()
    {
        $date1 = date('Ymd');
        $user = $this->user_model;
        $data = $user->getById($this->session->userdata('user_id'));
        $date2 = date('Ymd', strtotime($data->start_join_company));
        $datediff = $date1 - $date2;
        if (substr($datediff, 0, -4) >= 1) return true;
        else {
            return false;
        }
    }
}
