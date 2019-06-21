<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$id_user 	= $this->session->userdata('id_user');
		$user 		= $this->user_model->detail($id_user);

		$valid = $this->form_validation;

		$valid = $this->form_validation->set_rules('nama', 'Nama', 'required',
										array('required'=>'%s Harus diisi'));
		$valid = $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]',
										array('required'=>'%s Harus diisi',
											  'min_length[1]'=>'%s minimal 2 karakter'));

		if ($valid->run()===false) {
		// end validasi form
		
		$data = array( 'title' => ' Edit Profile '.$user->nama,
					   'user'  => $user,
					   'isi'   => 'admin/profile/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			// memasukan data dari inputan
			$data = array( 'id_user'	 => $id_user,
						   'nama' 		 => $this->input->post('nama'),
						   'username' 	 => $this->input->post('username'),
						   'password' 	 => sha1($this->input->post('password'))
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah dirubah');
			
			redirect(base_url('admin/profile'));
	}

  }
}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */