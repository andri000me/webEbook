<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

    public function index()
    {
    	// validasi login
    	$valid = $this->form_validation;

		$valid = $this->form_validation->set_rules('username', 'Username', 'trim|required',
										array('required'=>'%s Harus diisi'));
		$valid = $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]',
										array('required'=>'%s Harus diisi',
											  'min_length[1]'=>'%s minimal 2 karakter'));
		if ($valid->run()) {
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
			$check_login 	= $this->user_model->login($username,$password);

			if (count($check_login)==1) {
				$this->session->set_userdata('id_user',$check_login->id_user);
				$this->session->set_userdata('username',$check_login->username);
				$this->session->set_userdata('nama',$check_login->nama);
				$this->session->set_userdata('akses_level',$check_login->akses_level);

				$this->session->set_flashdata('sukses','Anda berhasil Login ');
				redirect(base_url('admin/dasbor'),'refresh');
			}else{
				$this->session->set_flashdata('sukses','Username atau Password Salah ');
				redirect(base_url('login'),'refresh');
			}
		}
        $data = array( 'title' => 'Login Admin');
        $this->load->view('admin/login/list', $data, FALSE);
        
    }

    public function logout()
    {
    	$this->check_login->logout();
    }

}

/* End of file Login.php */
