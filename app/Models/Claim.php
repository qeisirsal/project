<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'claims';

    // Tentukan kolom yang dapat diisi massal
    protected $fillable = [
        'patient_id',
        'nama_lengkap',
        'no_rm',
        'no_bpjs',
        'no_sep',
        'kelas_pasien',
        'tanggal',
        'alamat',
        'klaim',
        'diagnosa',
    ];

    // Hubungan dengan model Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
