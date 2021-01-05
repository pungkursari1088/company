<?php
class Rfids extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("rfid_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {

        $data["rfids"] = $this->rfid_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/rfid/list", $data);
    }

    public function add()
    {

        $rfid = $this->rfid_model;
        $validation = $this->form_validation;
        $validation->set_rules($rfid->rules());

        if ($validation->run()) {
            $rfid->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["users"] = $this->user_model->getAll();
        $this->load->view("admin/rfid/new_form", $data);
    }

    public function edit($id = null)
    {
        $data["users"] = $this->user_model->getAll();

        if (!isset($id)) redirect('admin/rfids');
        $rfid = $this->rfid_model;
        $validation = $this->form_validation;
        $validation->set_rules($rfid->rules());

        if ($validation->run()) {
            $rfid->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["rfid"] = $rfid->getById($id);
        if (!$data["rfid"]) show_404();

        $this->load->view("admin/rfid/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->rfid_model->delete($id)) {
            redirect(site_url('admin/rfids'));
        }
    }
}
