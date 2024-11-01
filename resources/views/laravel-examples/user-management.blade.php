@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto"></div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">{{ __('PENANGANAN PASIEN') }}</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <h5>Form Laporan Biaya Pasien</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_rm">No RM</label>
                                    <input type="text" class="form-control" name="no_rm" required> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Pendaftaran & Administrasi</label>
                                    <input type="number" class="form-control biaya" name="biaya_administrasi" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Akomodasi Rawat Inap</label>
                                    <input type="number" class="form-control biaya" name="biaya_rawat_inap" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Pemeriksaan & Konsultasi</label>
                                    <input type="number" class="form-control biaya" name="biaya_pemeriksaan" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Tindakan Medis Spesialistik & Non Spesialistik</label>
                                    <input type="number" class="form-control biaya" name="biaya_tindakan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Ibu, Bayi, dan Balita</label>
                                    <input type="number" class="form-control biaya" name="biaya_ibu_anak" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Biaya Obat & Bahan Medis</label>
                                    <input type="number" class="form-control biaya" name="biaya_obat" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary">Simpan Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk menghitung total dan memeriksa batas -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const biayaInputs = document.querySelectorAll('.biaya');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        let total = 0;
        biayaInputs.forEach(input => {
            total += Number(input.value) || 0;
        });

        const nik = document.querySelector('input[name="nik"]').value; // Pastikan 'nik' input ada
        
        try {
            const response = await fetch('/check-limit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ nik, total })
            });

            const data = await response.json();
            
            if (data.exceeded) {
                if (confirm('Biaya Pasien Melebihi Batas Klaim!! Tetap simpan data?')) {
                    form.submit();
                }
            } else {
                form.submit();
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
});
</script>

@endsection
