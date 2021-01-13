<?php
class News extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("news_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {
        $data["news"] = $this->news_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/news/list", $data);
    }

    public function add()
    {
        $news = $this->news_model;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $news->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("admin/news/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/news');
        $news = $this->news_model;
        $validation = $this->form_validation;
        $validation->set_rules($news->rules());

        if ($validation->run()) {
            $news->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["news"] = $news->getById($id);
        if (!$data["news"]) show_404();

        $this->load->view("admin/news/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->news_model->delete($id)) {
            redirect(site_url('admin/news'));
        }
    }
}
