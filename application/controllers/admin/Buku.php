<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
	}

    public function index()
    {
    	$buku = $this->buku_model->listing();
        $data = array(
            'title' => 'Data Buku',
            'buku' => $buku,
            'isi' => 'admin/buku/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
        
    }

    // tambah buku

    public function tambah()
    {
        $kategori= $this->kategori_model->listing();
        // $file1=;
        // validasi form
        $valid = $this->form_validation;

        $valid = $this->form_validation->set_rules('judul_buku', 'Judul Buku','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('penulis', 'Penulis','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('penerbit', 'Penerbit','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('tahun_buku', 'Tahun Buku', 'trim|min_length[4]');
        
        if ($valid->run()) {

            $config['upload_path']          = './assets/upload/buku/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 10000;
            $config['max_width']            = 50000;
            $config['max_height']           = 50000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( !$this->upload->do_upload('buku')){

                   $data = array( 'title' => 'Tambah Buku',
                       'kategori'=> $kategori,
                       'error_upload'=> $this->upload->display_errors(),
                       'isi'    => 'admin/buku/tambah'
                    );
                     $this->load->view('admin/layout/wrapper', $data, FALSE);

            }else{
                
                $upload_file  = array('files' => $this->upload->data());

                }

            $config['upload_path']          = './assets/upload/img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 10000;
            $config['max_width']            = 50000;
            $config['max_height']           = 50000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( !$this->upload->do_upload('gambar')){

                   $data = array( 'title' => 'Tambah Buku',
                       'kategori'=> $kategori,
                       'error_upload'=> $this->upload->display_errors(),
                       'isi'    => 'admin/buku/tambah'
                    );
                     $this->load->view('admin/layout/wrapper', $data, FALSE);

            }else{


                $upload_data  = array('uploads' => $this->upload->data());


                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/img/'.$upload_data['uploads']['file_name'];
                $config['new_image']  = './assets/upload/thumbs/'.$upload_data['uploads']['file_name'];
                $config['thumb_marker']  = '';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 200;
                $config['height']       = 200;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                // memasukan data dari inputan
                
            
            }  

            $data = array( 'id_kategori' => $this->input->post('jenis_buku'),
                               'judul_buku'        => $this->input->post('judul_buku'),
                               'penulis'    => $this->input->post('penulis'),
                               'penerbit' => $this->input->post('penerbit'),
                               'jenis_buku' => $this->input->post('jenis_buku'),
                               'tahun_buku' => $this->input->post('tahun_buku'),
                               'slug_buku' => url_title($this->input->post('jenis_buku'), 'dash', TRUE),
                               'buku' => $upload_file['files']['file_name'],
                               'gambar' => $upload_data['uploads']['file_name'],
                               'status_buku' => $this->input->post('status_buku'),
                               'tanggal_post' => date('Y-m-d')
                            );
                $this->buku_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                
                redirect(base_url('admin/buku'));

        }
        
         $data = array( 'title' => 'Tambah Buku',
                       'kategori'=> $kategori,
                       'isi'    => 'admin/buku/tambah'
                    );
                     $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // edit

    public function edit($id_buku)
    {
        $buku = $this->buku_model->detail($id_buku);
        $kategori= $this->kategori_model->listing();

        $file1= empty($_FILES['buku']['name']);
        $file2= empty($_FILES['gambar']['name']);
        
        $valid = $this->form_validation;

        $valid = $this->form_validation->set_rules('judul_buku', 'Judul Buku','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('penulis', 'Penulis','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('penerbit', 'Penerbit','required',
                                        array('required'=>'%s Harus diisi'));
        $valid = $this->form_validation->set_rules('tahun_buku', 'Tahun Buku', 'trim|min_length[4]');
       
        if ($valid->run()) 
        {
            // buku
            // if(){
                    if(!$file1){
                    $config['upload_path']          = './assets/upload/buku/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
                    $config['max_size']             = 10000;
                    $config['max_width']            = 50000;
                    $config['max_height']           = 50000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( !$this->upload->do_upload('buku')){

                           $data = array( 'title' => 'Edit Buku',
                               'kategori'=> $kategori,
                               'error_upload'=> $this->upload->display_errors(),
                               'isi'    => 'admin/buku/edit'
                            );
                             $this->load->view('admin/layout/wrapper', $data, FALSE);

                    }else{
                        
                            $upload_file  = array('files' => $this->upload->data());
                            if($buku->buku != "") { unlink('./assets/upload/buku/'.$buku->buku); }

                        }
                    }


            // gambar
            if(!$file2){

                $config['upload_path']          = './assets/upload/img/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
                $config['max_size']             = 10000;
                $config['max_width']            = 50000;
                $config['max_height']           = 50000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( !$this->upload->do_upload('gambar')){

                       $data = array( 'title' => 'Edit Buku',
                           'kategori'=> $kategori,
                           'error_upload'=> $this->upload->display_errors(),
                           'isi'    => 'admin/buku/edit'
                        );
                         $this->load->view('admin/layout/wrapper', $data, FALSE);

                }else{


                    $upload_data  = array('uploads' => $this->upload->data());


                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/img/'.$upload_data['uploads']['file_name'];
                    $config['new_image']  = './assets/upload/thumbs/'.$upload_data['uploads']['file_name'];
                    $config['thumb_marker']  = '';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 200;
                    $config['height']       = 200;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    if($buku->gambar != ""){
                        unlink('./assets/upload/img/'.$buku->gambar);
                        unlink('./assets/upload/thumbs/'.$buku->gambar); }

                }
            }
            // masukan data
             if(!$file1 && !$file2 === true){
                $data = array(    'id_buku'    => $id_buku,
                               'id_kategori' => $this->input->post('jenis_buku'),
                               'judul_buku'        => $this->input->post('judul_buku'),
                               'penulis'    => $this->input->post('penulis'),
                               'penerbit' => $this->input->post('penerbit'),
                               'jenis_buku' => $this->input->post('jenis_buku'),
                               'tahun_buku' => $this->input->post('tahun_buku'),
                               'slug_buku' => url_title($this->input->post('jenis_buku'), 'dash', TRUE),
                               'buku' => $upload_file['files']['file_name'],
                               'gambar' => $upload_data['uploads']['file_name'],
                               'status_buku' => $this->input->post('status_buku')
                            );
                $this->buku_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diubah');
                
                redirect(base_url('admin/buku'));
             }else if(!$file1===true){
                $data = array(    'id_buku'    => $id_buku,
                               'id_kategori' => $this->input->post('jenis_buku'),
                               'judul_buku'        => $this->input->post('judul_buku'),
                               'penulis'    => $this->input->post('penulis'),
                               'penerbit' => $this->input->post('penerbit'),
                               'jenis_buku' => $this->input->post('jenis_buku'),
                               'tahun_buku' => $this->input->post('tahun_buku'),
                               'slug_buku' => url_title($this->input->post('jenis_buku'), 'dash', TRUE),
                               'buku' => $upload_file['files']['file_name'],
                               // 'gambar' => $upload_data['uploads']['file_name'],
                               'status_buku' => $this->input->post('status_buku')
                            );
                $this->buku_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diubah');
                
                redirect(base_url('admin/buku'));
             }else if(!$file2===true){
                $data = array(    'id_buku'    => $id_buku,
                               'id_kategori' => $this->input->post('jenis_buku'),
                               'judul_buku'        => $this->input->post('judul_buku'),
                               'penulis'    => $this->input->post('penulis'),
                               'penerbit' => $this->input->post('penerbit'),
                               'jenis_buku' => $this->input->post('jenis_buku'),
                               'tahun_buku' => $this->input->post('tahun_buku'),
                               'slug_buku' => url_title($this->input->post('jenis_buku'), 'dash', TRUE),
                               // 'buku' => $upload_file['files']['file_name'],
                               'gambar' => $upload_data['uploads']['file_name'],
                               'status_buku' => $this->input->post('status_buku')
                            );
                $this->buku_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diubah');
                
                redirect(base_url('admin/buku'));
             }else{
                $data = array(    'id_buku'    => $id_buku,
                               'id_kategori' => $this->input->post('jenis_buku'),
                               'judul_buku'        => $this->input->post('judul_buku'),
                               'penulis'    => $this->input->post('penulis'),
                               'penerbit' => $this->input->post('penerbit'),
                               'jenis_buku' => $this->input->post('jenis_buku'),
                               'tahun_buku' => $this->input->post('tahun_buku'),
                               'slug_buku' => url_title($this->input->post('jenis_buku'), 'dash', TRUE),
                               // 'buku' => $upload_file['files']['file_name'],
                               // 'gambar' => $upload_data['uploads']['file_name'],
                               'status_buku' => $this->input->post('status_buku')
                            );
                $this->buku_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diubah');
                
                redirect(base_url('admin/buku'));
             }

       
         }   
               
         $data = array( 'title' => 'Rubah Buku',
                       'kategori'=> $kategori,
                       'buku'=> $buku,
                       'isi'    => 'admin/buku/edit'
                    );
                     $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function delete($id_buku)
    {
        // protek delete
        $this->check_login->check();
        $buku = $this->buku_model->detail($id_buku);

        $data = array( 'id_buku'     => $buku->id_buku );

        if($buku->gambar != ""){
            unlink('./assets/upload/img/'.$buku->gambar);
            unlink('./assets/upload/thumbs/'.$buku->gambar);
        }

        if($buku->buku != ""){
            unlink('./assets/upload/buku/'.$buku->buku);
        }

            $this->buku_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            
            redirect(base_url('admin/buku'));
            
    }

}

/* End of file Buku.php */
