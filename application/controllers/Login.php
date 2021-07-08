<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('staff');
    }

    public function index()
    {

        if ($this->staff->is_logged_in()) {
            redirect("dashboard");
        } else {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            if ($this->form_validation->run() == TRUE) {

                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                $checking = $this->staff->check_login($username, $password);

                if ($checking) {

                    $session_data = array(
                        'user_id'   => $checking->id_user,
                        'user_name' => $checking->username,
                        'user_pass' => $checking->password,
                        'user_nama' => $checking->nama_user,
                        'role'      => $checking->role
                    );
                    $this->session->set_userdata($session_data);

                    redirect('dashboard/');
                } else {

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }
            } else {

                $this->load->view('login');
            }
        }
    }
}
