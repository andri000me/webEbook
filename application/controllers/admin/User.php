<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(
			'title' => 'Data User Administrasi(' . count($user) . ')',
			'user' => $user,
			'isi' => 'admin/user/list'
		);
		$this->load->view('admin/layout/wrapper', $data, false);
	}

	public function tambah()
	{
		// validasi form
		$valid = $this->form_validation;

		$valid = $this->form_validation->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' => '%s Harus diisi')
		);
		$valid = $this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required|is_unique[tb_user.username]',
			array(
				'required' => '%s Harus diisi',
				'is_unique' => '%s telah digunakan'
			)
		);
		$valid = $this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|min_length[2]',
			array(
				'required' => '%s Harus diisi',
				'min_length[1]' => '%s minimal 2 karakter'
			)
		);

		if ($valid->run() === false) {
		// end validasi form

			$data = array(
				'title' => 'Tambah User Administrator',
				'isi' => 'admin/user/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data, false);
		} else {
			// memasukan data dari inputan
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => sha1($this->input->post('password')),
				'akses_level' => $this->input->post('akses_level')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');

			redirect(base_url('admin/user'));


		}
	}

	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// validasi form
		$valid = $this->form_validation;

		$valid = $this->form_validation->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' => '%s Harus diisi')
		);
		$valid = $this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|min_length[2]',
			array(
				'required' => '%s Harus diisi',
				'min_length[1]' => '%s minimal 2 karakter'
			)
		);

		if ($valid->run() === false) {
		// end validasi form

			$data = array(
				'title' => ' Edit User Administrator ' . $user->nama,
				'user' => $user,
				'isi' => 'admin/user/edit'
			);
			$this->load->view('admin/layout/wrapper', $data, false);
		} else {
			// memasukan data dari inputan
			$data = array(
				'id_user' => $id_user,
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => sha1($this->input->post('password')),
				'akses_level' => $this->input->post('akses_level')
			);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah dirubah');

			redirect(base_url('admin/user'));


		}
	}

	public function delete($id_user)
	{
		// protek delete
		$this->check_login->check();
		$user = $this->user_model->detail($id_user);

		$data = array('id_user' => $user->id_user);

		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');

		redirect(base_url('admin/user'));

	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */