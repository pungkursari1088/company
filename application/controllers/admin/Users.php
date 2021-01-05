<?php
class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {

        $data["tbl_users"] = $this->user_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/user/list", $data);
    }

    public function add()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/user/new_form");
    }

    public function edit($user_id = null)
    {
        if (!isset($user_id)) redirect('admin/users');

        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($user_id);
        if (!$data["user"]) show_404();

        $this->load->view("admin/user/edit_form", $data);
    }

    public function delete($user_id = null)
    {
        if (!isset($user_id)) show_404();

        if ($this->user_model->delete($user_id)) {
            redirect(site_url('admin/users'));
        }
    }
}
