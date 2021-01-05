<?php
class Absences extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("rfid_model");
        $this->load->model("absence_model");
    }

    function index()
    {

        $data["tbl_users"] = $this->user_model->getAll();
        // echo '<pre>' . var_export($data, true) . '</pre>';
        $this->load->view("admin/user/list", $data);
    }

    public function add()
    {
        //mengambil data dari GET 
        $code_rfid = $this->input->get('code_rfid');
        $absent = $this->input->get('absent');
        $rfid_employee = $this->rfid_model->getUserById($code_rfid);
        // memasukkan data pada saat jam masuk
        if (isset($rfid_employee) && $absent == "entry") {
            $absence = $this->absence_model;
            $absence->saveEntryHour($rfid_employee->user_id);
            echo "Absen Masuk ";

            // mengupdate data apabila yang dipilih adalah jam pulang
        } elseif (isset($rfid_employee) && $absent == "leave") {
            $absence = $this->absence_model->getAbsence($rfid_employee->user_id);

            $absence->leave_hour = strtotime(date("Y-m-d H:i:s"));
            $to = strtotime($absence->entry_hour);
            $absence->work_hours = round(($absence->leave_hour - $to) / 3600, 0);

            //menghitung jam lembur 
            if ($absence->work_hours > 8) {
                $absence->overtime_hours = $absence->work_hours - 8;
            } else {
                $absence->overtime_hours = 0;
            }

            //menghitung jam kerja jika kurang dari 8 jam 
            if ($absence->work_hours < 8) {
                $absence->penalty_hours = 8 - $absence->work_hours;
            } else {
                $absence->penalty_hours = 0;
            }
            // echo '<pre>' . var_export($absence, true) . '</pre>';
            $this->absence_model->setAbsenceLeave($absence);
            echo "Absen Keluar";
        } else {
            echo "Error";
        }
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
