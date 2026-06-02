<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama_lengkap',
        'nim',
        'prodi',
        'semester',
        'whatsapp',
        'email',
        'pengalaman',
        'alasan',
        'jadwal_pilihan',
        'status',
    ];

    protected $useTimestamps = true;
}