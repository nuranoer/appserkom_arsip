<?php

namespace App\Models;

use CodeIgniter\Model;

class Arsip extends Model
{
    protected $table      = 'arsip';
    protected $primaryKey = 'nomor_surat';
    protected $returnType     = 'object';

    protected $allowedFields = ['nomor_surat', 'kategori_surat', 'judul_surat', 'tanggal_surat', 'file_surat'];

    protected $validationRules = [
        'nomor_surat' => 'required',
        'kategori_surat' => 'required',
        'judul_surat' => 'required',
        'tanggal_surat' => 'required',
    ];

    protected $validationMessages = [
        'nomor_surat' => [
            'required' => 'Nomor Surat harus diisi'
        ],
        'kategori_surat' => [
            'required' => 'Kategori Harus Dipilih'
        ],
        'judul_surat' => [
            'required' => 'Judul Harus Diisi'
        ],
        'tanggal_surat' => [
            'required' => 'Tanggal Harus Diisi'
        ],
    ];

    public function get_data()
    {
    	return $this->db->table($this->table)
	    	->join('kategori', 'kategori.id_kategori = '.$this->table.'.id_kategori', 'left')
            ->select('arsip.*, kategori.nama_kategori AS nama_kategori')
	    	->orderBy($this->table.'.id_kategori', 'desc')->get()->getResultObject();
    }

}
