<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'claims';

    protected $fillable = [
        'no_rm',
        'nama_lengkap', 
        'no_bpjs',
        'no_sep',
        'kelas_pasien',
        'tanggal',
        'alamat',
        'diagnosa',
        'keterangan',
        'total_klaim'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'total_klaim' => 'decimal:2'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'no_rm', 'no_rm');
    }
}
