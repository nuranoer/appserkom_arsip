<?php

namespace App\Models;

use CodeIgniter\Model;

class Arsip extends Model
{
    protected $table      = 'arsip';
    protected $primaryKey = 'id_surat';
    protected $returnType     = 'object';

    protected $allowedFields = ['nomor_surat', 'id_kategori', 'judul_surat', 'file_surat'];

    protected $validationRules = [
        'nomor_surat' => 'required',
        'id_kategori' => 'required',
        'judul_surat' => 'required',
    ];

    public function get_data()
    {
    	return $this->db->table($this->table)
	    	->join('kategori', 'kategori.id_kategori = '.$this->table.'.id_kategori', 'left')
            ->select('arsip.*, kategori.nama_kategori AS nama_kategori')
	    	->orderBy($this->table.'.id_kategori', 'desc')->get()->getResultObject();
    }

    public function detail($id)
    {
    	return $this->db->table($this->table)
        	->join('kategori', 'kategori.id_kategori = '.$this->table.'.id_kategori', 'left')
            ->select('arsip.*, kategori.nama_kategori AS nama_kategori')
        	->where($this->table.'.id_surat', $id)->get()->getRowObject();
    }
}
