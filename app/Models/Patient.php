<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'patients';

    // Tentukan kolom yang dapat diisi massal
    protected $fillable = [
        'no_rm',
        'biaya_pendaftaran_administrasi',
        'biaya_akomodasi_rawat_inap',
        'biaya_pemeriksaan_konsultasi',
        'biaya_tindakan_medical',
        'biaya_ibu_bayi_balita',
        'biaya_obat_bahan_medis',
    ];
}
