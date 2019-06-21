<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('kategori_model');
	}

	public function kategori($slug_kategori)
	{
		$kategori = $this->kategori_model->read($slug_kategori);
		$id_kategori= $kategori->id_kategori;

		$this->load->library('pagination');

		$config['base_url'] = base_url('kategori/kategori/'.$slug_kategori.'/index/');
		$config['total_rows'] = count($this->buku_model->total_kategori($id_kategori));
		$config['per_page'] = 4;
		$config['uri_segment']=5;

		$limit = $config['per_page'];
		$start = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;

		$this->pagination->initialize($config);

		$buku = $this->buku_model->bk_kategori($id_kategori,$limit,$start);

		$data = array(
						'judul' => 'Halaman | Kategori',
						'kategori' => $kategori,
						'id_kategori'=>$id_kategori,
						'buku' => $buku,
						'limit' => $limit,
						'total' => $config['total_rows'],
						'paginasi' => $this->pagination->create_links(),
						'isi' => 'template/kategori/list'
		);
		$this->load->view('template/layout/wrapper', $data, FALSE);
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */