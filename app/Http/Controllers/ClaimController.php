<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Patient;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // Menampilkan daftar klaim
    public function index()
    {
        $claims = Claim::with('patient')->get(); // Mengambil klaim beserta data pasien
        return view('claims.index', compact('claims'));
    }

    // Menampilkan form untuk menambah klaim
    public function create()
    {
        $patients = Patient::all(); // Mengambil semua pasien untuk dropdown
        return view('claims.create', compact('patients'));
    }

    // Menyimpan data klaim baru
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'nama_lengkap' => 'required|string|max:255',
            'no_rm' => 'required|string|max:255',
            'no_bpjs' => 'required|string|max:255',
            'no_sep' => 'required|string|max:255',
            'kelas_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'alamat' => 'required|string',
            'klaim' => 'required|numeric',
            'diagnosa' => 'required|string|max:255',
        ]);

        Claim::create($request->all());

        return redirect()->route('claims.index')->with('success', 'Klaim berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit klaim
    public function edit(Claim $claim)
    {
        $patients = Patient::all(); // Mengambil semua pasien untuk dropdown
        return view('claims.edit', compact('claim', 'patients'));
    }

    // Memperbarui data klaim
    public function update(Request $request, Claim $claim)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'nama_lengkap' => 'required|string|max:255',
            'no_rm' => 'required|string|max:255',
            'no_bpjs' => 'required|string|max:255',
            'no_sep' => 'required|string|max:255',
            'kelas_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'alamat' => 'required|string',
            'klaim' => 'required|numeric',
            'diagnosa' => 'required|string|max:255',
        ]);

        $claim->update($request->all());

        return redirect()->route('claims.index')->with('success', 'Klaim berhasil diperbarui.');
    }

    // Menghapus data klaim
    public function destroy(Claim $claim)
    {
        $claim->delete();
        return redirect()->route('claims.index')->with('success', 'Klaim berhasil dihapus.');
    }
}
