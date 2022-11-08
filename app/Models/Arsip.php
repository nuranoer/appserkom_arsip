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
        'judul_surat' => 'required'
    //     'file_surat' => [
    //         'uploaded[file_surat]',
    //         'mime_in[file_surat,application/pdf]',
    //         'max_size[file_surat,2048]',
        
    //     ],
    ];

    // protected $validationMessages = [
    //     'nomor_surat' => [
    //         'required' => 'Nomor Surat harus diisi'
    //     ],
    //     'id_kategori' => [
    //         'required' => 'Kategori Harus Dipilih'
    //     ],
    //     'judul_surat' => [
    //         'required' => 'Judul Harus Diisi'
    //     ],
    //     'file_surat' => [
    //         'uploaded' => 'File Surat Harus Diupload',
    //         'mime_in' => 'File Surat Harus PDF',
    //         'max_size' => 'File Surat Maksimal 2MB',
    //     ],
    // ];

    public function get_data()
    {
    	return $this->db->table($this->table)
	    	->join('kategori', 'kategori.id_kategori = '.$this->table.'.id_kategori', 'left')
            ->select('arsip.*, kategori.nama_kategori AS nama_kategori')
	    	->orderBy($this->table.'.id_kategori', 'desc')->get()->getResultObject();
    }

    // public function download($id)
    // {
    //     return $this->db->table($this->table)
    //         ->where('file_surat', $id)
    //         ->get()->getRowObject();
    // }

}
