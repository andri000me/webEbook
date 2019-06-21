<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('tb_buku.*,tb_kategori.nama_kategori, tb_kategori.slug_kategori,tb_user.nama');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_buku.id_user', 'left');
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function buku()
	{
		$this->db->select('tb_buku.*,tb_kategori.nama_kategori, tb_kategori.slug_kategori,tb_user.nama');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_buku.id_user', 'left');
		$this->db->where('tb_buku.status_buku', 'publish');
		$this->db->order_by('id_buku','DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function bk_kategori($id_kategori,$limit,$start)
	{
		$this->db->select('tb_buku.*,tb_kategori.nama_kategori, tb_kategori.slug_kategori,tb_user.nama');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_buku.id_user', 'left');
		$this->db->where(array('status_buku'=>'publish',
							   'tb_buku.id_kategori'=>$id_kategori));
		$this->db->order_by('id_buku','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function total_kategori($id_kategori)
	{
		$this->db->select('tb_buku.*,tb_kategori.nama_kategori, tb_kategori.slug_kategori,tb_user.nama');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_buku.id_user', 'left');
		$this->db->where(array('status_buku'=>'publish',
							   'tb_buku.id_kategori'=>$id_kategori));
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_buku)
	{
		$this->db->select('*');
		$this->db->from('tb_buku');
		$this->db->where('id_buku', $id_buku);
		$this->db->order_by('id_buku');
		$query = $this->db->get();
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->update('tb_buku', $data);
		
	}

	public function tambah($data)	
	{
		$this->db->insert('tb_buku', $data);
		
	}

	public function delete($data)
	{
		$this->db->where('id_buku', $data['id_buku']);
		$this->db->delete('tb_buku', $data);
		
	}

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */