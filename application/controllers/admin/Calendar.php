<?php
class Calendar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("calendar_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {
        $data["calendars"] = $this->calendar_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/calendar/list", $data);
    }

    public function add()
    {
        $calendar = $this->calendar_model;
        $validation = $this->form_validation;
        $validation->set_rules($calendar->rules());

        if ($validation->run()) {
            $calendar->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("admin/calendar/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/calendar');
        $calendar = $this->calendar_model;
        $validation = $this->form_validation;
        $validation->set_rules($calendar->rules());

        if ($validation->run()) {
            $calendar->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["calendar"] = $calendar->getById($id);
        if (!$data["calendar"]) show_404();

        $this->load->view("admin/calendar/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->calendar_model->delete($id)) {
            redirect(site_url('admin/calendar'));
        }
    }
}
