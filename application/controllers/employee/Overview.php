<?php
class Overview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("calendar_model");
        $this->load->helper('url');
        $this->load->model('news_model');
        $this->load->library("pagination");
        // if ($this->session->userdata('logged_in') !== TRUE) {
        //     redirect('login');
        // }
    }

    function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "employee/overview";
        $config["total_rows"] = $this->news_model->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['news'] = $this->news_model->get_news($config["per_page"], $page);

        $data["results"] = $this->calendar_model->getAll();
        $this->load->view('employee/overview', $data);
    }
}
