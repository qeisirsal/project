<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Menampilkan form untuk menambah pasien
    public function create()
    {
        return view('patients.create');
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|string|max:255',
            'biaya_pendaftaran_administrasi' => 'required|numeric',
            'biaya_akomodasi_rawat_inap' => 'required|numeric',
            'biaya_pemeriksaan_konsultasi' => 'required|numeric',
            'biaya_tindakan_medical' => 'required|numeric',
            'biaya_ibu_bayi_balita' => 'required|numeric',
            'biaya_obat_bahan_medis' => 'required|numeric',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pasien
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Memperbarui data pasien
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'no_rm' => 'required|string|max:255',
            'biaya_pendaftaran_administrasi' => 'required|numeric',
            'biaya_akomodasi_rawat_inap' => 'required|numeric',
            'biaya_pemeriksaan_konsultasi' => 'required|numeric',
            'biaya_tindakan_medical' => 'required|numeric',
            'biaya_ibu_bayi_balita' => 'required|numeric',
            'biaya_obat_bahan_medis' => 'required|numeric',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    // Menghapus data pasien
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
