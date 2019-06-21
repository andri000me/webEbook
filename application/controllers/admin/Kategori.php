<?php 


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

    public function index()
    {
    	$kategori = $this->kategori_model->listing();

    	// validasi
    	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[tb_kategori.nama_kategori]',
    		array( 'required' => '%s Harus diisi',
    			   'is_unique'=> '%s <strong>'.$this->input->post('nama_kategori').'</strong> Sudah Ada !'));
    	if($this->form_validation->run()===false)
    	{
    		$data = array(
            'title' => 'Data Kategori',
            'kategori'=> $kategori,
            'isi' => 'admin/kategori/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
	    }else{
	    	$slug = url_title($this->input->post('nama_kategori'),'dash',true);
	    	$data = array(
	    					'slug_kategori'		=> $slug,
	    					'nama_kategori' 	=> $this->input->post('nama_kategori')
						);
	    	$this->kategori_model->tambah($data);
	    	$this->session->set_flashdata('sukses','Kategori Telah ditambah');
	    	redirect(base_url('admin/kategori'));
	    }
    }

    public function edit($id_kategori)
    {
    	$kategori = $this->kategori_model->detail($id_kategori);

    	// validasi
    	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
    		array( 'required' => '%s Harus diisi'));
    	if($this->form_validation->run()===false)
    	{
    		$data = array(
            'title' => 'Edit Kategori',
            'kategori'=> $kategori,
            'isi' => 'admin/kategori/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
	    }else{
	    	$slug = url_title($this->input->post('nama_kategori'),'dash',true);
	    	$data = array(	'id_kategori' 		=> $id_kategori,
	    					'slug_kategori'		=> $slug,
	    					'nama_kategori' 	=> $this->input->post('nama_kategori')
						);
	    	$this->kategori_model->edit($data);
	    	$this->session->set_flashdata('sukses','Kategori Telah diubah');
	    	redirect(base_url('admin/kategori'));
	    }
    }

    
    public function delete($id_kategori)
	{
		// protek delete
		$this->check_login->check();
		$kategori = $this->kategori_model->detail($id_kategori);

		$data = array( 'id_kategori'	 => $kategori->id_kategori );

			$this->kategori_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			
			redirect(base_url('admin/kategori'));
			
	}

}