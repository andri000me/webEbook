<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$buku = $this->buku_model->buku();
		$kategori = $this->kategori_model->listing();
		$data = array(
						'judul' => 'Ayo!! | BacaEbook',
						'buku' => $buku,
						'kategori'=> $kategori,
						'isi' => 'template/beranda/list'
		);
		$this->load->view('template/layout/wrapper', $data, FALSE);
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */