<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Arsip;
use App\Models\Kategori;
use Exception;

class ArsipController extends BaseController
{
    private Arsip $arsip;

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
        $data['title'] = 'Tambah Arsip';
        $data['kategori'] = $kategori->findAll();
		//echo view('dashboard/prodi/create', $data);
    }

    public function store()
    {
        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'judul_surat' => $this->request->getPost('judul_surat'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'file_surat' => $this->request->getFile('file_surat'),
        ];

        if (!$this->prodi->validate($data)) {
            //return redirect()->to('/dashboard/prodi/new')->withInput()->with('errors', $this->prodi->errors());
        }

        try {
            $this->arsip->protect(false)->insert($data);
        } catch (Exception $e) {
            //return redirect()->to('/dashboard/prodi/new')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        //return redirect()->to('/dashboard/prodi')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $model = $this->arsip;
        $kategori = new Kategori();
        $data['data'] = $model->where('nomor_surat', $id)->first();
        $data['title'] = 'Update Data';
        $data['kategori'] = $kategori->findAll();
        
        echo view('dashboard/prodi/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'judul_surat' => $this->request->getPost('judul_surat'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'file_surat' => $this->request->getFile('file_surat'),
        ];

        if (!$this->arsip->validate($data)) {
            //return redirect()->to('/dashboard/prodi/'. $id .'/edit')->withInput()->with('errors', $this->prodi->errors());
        }

        try {
            $this->arsip->protect(false)->update($id, $data);
        } catch (Exception $e) {
            //return redirect()->to('/dashboard/prodi/'. $id .'/edit')->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        //return redirect()->to('/dashboard/prodi')->with('success', 'Berhasil mengupdate data');
    }
    
    public function delete($id){
        try {
            $this->arsip->delete($id);
        } catch (Exception $e) {
            //return redirect()->to('dashboard/prodi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        //return redirect()->to('/dashboard/prodi')->with('success', 'Berhasil menghapus data');
    }
}
