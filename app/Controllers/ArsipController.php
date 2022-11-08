<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Arsip;
use App\Models\Kategori;
use Exception;

class ArsipController extends BaseController
{
    protected $arsip;
    // private Arsip $arsip;

    public function __construct()
    {
        $this->arsip = new Arsip();
        $this->arsip->asObject();
    }

    public function index()
    {
        $data['arsip'] = $this->arsip->get_data();
        $data['title'] = 'List Arsip';
		echo view('arsip/data', $data);
    }

    public function new()
    {
        $kategori = new Kategori();
        $data = [
            'title' => 'Tambah Arsip',
            'kategori' => $kategori->findAll(),
            'validation' => \Config\Services::validation()
        ];
       
		echo view('arsip/add', $data);
    }

    public function save()
    {
        $file = $this->request->getFile('file_surat');
        
        $namaFile = $file->getName();
        $file->move('uploads', $namaFile);
        $data = [
            'nomor_surat' => $this->request->getVar('nomor_surat'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'file_surat' => $namaFile
        ];
        
        if(!$this->validate([
            'nomor_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Surat harus diisi'
                ]
            ],
            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Harus Dipilih'
                ]
            ],
            'judul_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Harus Diisi'
                ]
            ],
            'file_surat' => [
                'rules' => 'uploaded[file_surat]|mime_in[file_surat,application/pdf]|max_size[file_surat,2048]',
                'errors' => [
                    'uploaded' => 'File Surat Harus Diupload',
                    'mime_in' => 'File Surat Harus PDF',
                    'max_size' => 'File Surat Maksimal 2MB',
                ]
            ]
        ]))

        
        try {
            $this->arsip->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('arsip/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        return redirect()->to('/')->with('success', 'Berhasil menambahkan data');

    }
    public function download($id)
    {
        $arsip = new Arsip();
        $data = $arsip->find($id);
        return $this->response->download('uploads/'.$data->file_surat, null);
    }
    public function lihat($id)
    {
        $arsip = new Arsip();
        $data = $arsip->find($id);
        
    }

    public function store()
    {
        $file = $this->request->getFile('file_surat');
        $file->move(ROOTPATH . 'public/uploads');
        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'judul_surat' => $this->request->getPost('judul_surat'),
            'file_surat' => $file->getName(),
        ];


        if (!$this->arsip->validate($data)) {
            return redirect()->to('arsip/new')->withInput()->with('errors', $this->arsip->errors());
        }

        try {
            $this->arsip->protect(false)->insert($data);
        } catch (Exception $e) {
            return redirect()->to('arsip/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/')->with('success', 'Berhasil menambahkan data');
    }

    
    public function delete($id){
        try {
            $this->arsip->delete($id);
        } catch (Exception $e) {
            return redirect()->to('/')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        return redirect()->to('/')->with('success', 'Berhasil menghapus data');
    }
}
