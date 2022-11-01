<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $returnType     = 'object';

    protected $allowedFields = ['id_kategori', 'nama_kategori'];
}
