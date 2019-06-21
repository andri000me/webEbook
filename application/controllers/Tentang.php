<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
		$data = array(
						'judul' => 'Halaman | Tentang Kami',
						'isi' => 'template/tentang/list'
		);
		$this->load->view('template/layout/wrapper', $data, FALSE);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/Tentang.php */