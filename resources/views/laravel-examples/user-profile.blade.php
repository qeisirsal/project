@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto"></div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">{{ __('KLAIM BPJS PASIEN') }}</h5>
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

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Input Data Pasien') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('claims.index') }}" method="POST" role="form text-left">
                    @csrf

                    @if($errors->any())
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">{{ $errors->first() }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_rm">No RM</label>
                                <input class="form-control" type="text" name="no_rm" pattern="[0-9]{5}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_bpjs">No BPJS</label>
                                <input class="form-control" type="text" name="no_bpjs" pattern="[0-9]{13}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_sep">No SEP</label>
                                <input class="form-control" type="text" name="no_sep" pattern="[0-9]{5}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="kelas_pasien">Kelas Pasien</label>
                                <select id="kelas_pasien_select" class="form-control" name="kelas_pasien" required>
                                    <option value="">-- Pilih Kelas Pasien --</option>
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                    <option value="3">Kelas 3</option>
                                    <option value="4">Kelas 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input class="form-control" type="date" name="tanggal" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">    
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diagnosa">Diagnosa</label>
                                <select id="diagnosa-select" class="form-control" name="diagnosa" required>
                                    <option value="">-- Pilih Diagnosa --</option>
                                    <option value="serviks">Serviks</option>
                                    <option value="DiabetesMelitus">Diabetes Melitus</option>
                                    <option value="HIV">HIV</option>
                                    <option value="Hipertensi">Hipertensi</option>
                                    <option value="TBParu">TB Paru</option>
                                </select>
                            </div>
                            <!-- Div untuk Serviks -->
                            <div id="infoServiks" class="mt-4 animate_animated animate_fadeIn" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; width: 80%; max-width: 600px;">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mb-3"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h5>
                                        <ul class="mb-4">
                                            <li>Perdarahan pervagina abnormal</li>
                                            <li>Perdarahan post koital</li>
                                            <li>Perdarahan pasca menopause</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Penunjang</h5>
                                        <ul class="mb-4">
                                            <li>Foto rontgen paru-paru</li>
                                            <li>Pemeriksaan hispatologi jaringan serviks bila perlu dilakukan dilatasi kuretase</li>
                                        </ul>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger me-3" onclick="showWarning('serviks')">Belum Sesuai</button>
                                            <button type="button" class="btn btn-success" onclick="closeInfoServiks()">Sudah Sesuai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function closeInfoServiks() {
                                    document.getElementById('infoServiks').style.display = 'none';
                                }
                                
                                function showWarning(diagnosa) {
                                    Swal.fire({
                                        title: 'Peringatan!',
                                        text: 'Pastikan semua kriteria diagnosa ' + diagnosa + ' terpenuhi sebelum melanjutkan',
                                        icon: 'warning',
                                        confirmButtonText: 'Mengerti'
                                    });
                                }
                            </script>

                            <!-- Div untuk Diabetes Melitus -->
                            <div id="infoDiabetesMelitus" class="mt-4 animate_animated animate_fadeIn" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; width: 80%; max-width: 600px;">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mb-3"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h5>
                                        <ul class="mb-4">
                                            <li>Adakah penurunan penglihatan dan disfungsi seksual</li>
                                            <li>Adakah keluhan gastrointestinal seperti mual, muntah, konstipasi atau diare</li>
                                            <li>Tanyakan riwayat penyakit keluarga</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Kriteria Diagnosis</h5>
                                        <ul class="mb-4">
                                            <li>Gula darah puasa ≥ 126 mg/dL (diabetes melitus tipe 2)</li>
                                            <li>Gula darah puasa 100–125 mg/dL (prediabetes)</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Penunjang</h5>
                                        <ul class="mb-4">
                                            <li>Pemeriksaan laboratorium (GDP, GDS, HbA1c, OGTT)</li>
                                        </ul>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger me-3" onclick="showWarning('Diabetes Melitus')">Belum Sesuai</button>
                                            <button type="button" class="btn btn-success" onclick="closeInfoDiabetesMelitus()">Sudah Sesuai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function closeInfoDiabetesMelitus() {
                                    document.getElementById('infoDiabetesMelitus').style.display = 'none';
                                }
                            </script>

                            <!-- Div untuk HIV -->
                            <div id="infoHIV" class="mt-4 animate_animated animate_fadeIn" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; width: 80%; max-width: 600px;">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mb-3"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h5>
                                        <ul class="mb-4">
                                            <li>Riwayat perilaku berisiko</li>
                                            <li>Riwayat transfusi darah</li>
                                            <li>Gejala konstitusional (demam, penurunan berat badan)</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Penunjang</h5>
                                        <ul class="mb-4">
                                            <li>Tes HIV Rapid</li>
                                            <li>Pemeriksaan CD4</li>
                                            <li>Viral Load</li>
                                        </ul>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger me-3" onclick="showWarning('HIV')">Belum Sesuai</button>
                                            <button type="button" class="btn btn-success" onclick="closeInfoHIV()">Sudah Sesuai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function closeInfoHIV() {
                                    document.getElementById('infoHIV').style.display = 'none';
                                }
                            </script>

                            <!-- Div untuk Hipertensi -->
                            <div id="infoHipertensi" class="mt-4 animate_animated animate_fadeIn" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; width: 80%; max-width: 600px;">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mb-3"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h5>
                                        <ul class="mb-4">
                                            <li>Riwayat hipertensi keluarga</li>
                                            <li>Keluhan sakit kepala, pusing</li>
                                            <li>Riwayat konsumsi garam berlebih</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Penunjang</h5>
                                        <ul class="mb-4">
                                            <li>Pengukuran tekanan darah serial</li>
                                            <li>EKG</li>
                                            <li>Laboratorium darah lengkap</li>
                                        </ul>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger me-3" onclick="showWarning('Hipertensi')">Belum Sesuai</button>
                                            <button type="button" class="btn btn-success" onclick="closeInfoHipertensi()">Sudah Sesuai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function closeInfoHipertensi() {
                                    document.getElementById('infoHipertensi').style.display = 'none';
                                }
                            </script>

                            <!-- Div untuk TB Paru -->
                            <div id="infoTBParu" class="mt-4 animate_animated animate_fadeIn" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; width: 80%; max-width: 600px;">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="mb-3"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h5>
                                        <ul class="mb-4">
                                            <li>Batuk berdahak > 2 minggu</li>
                                            <li>Demam subfebris</li>
                                            <li>Penurunan berat badan</li>
                                        </ul>

                                        <h5 class="mb-3"><i class="fas fa-microscope me-2"></i>Penunjang</h5>
                                        <ul class="mb-4">
                                            <li>Pemeriksaan sputum BTA</li>
                                            <li>Foto thorax</li>
                                            <li>GeneXpert MTB/RIF</li>
                                        </ul>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger me-3" onclick="showWarning('TB Paru')">Belum Sesuai</button>
                                            <button type="button" class="btn btn-success" onclick="closeInfoTBParu()">Sudah Sesuai</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <script>
                                function closeInfoTBParu() {
                                    document.getElementById('infoTBParu').style.display = 'none';
                                }
                            </script>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="klaim">Klaim</label>
                                <input class="form-control" name="klaim" required>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total-klaim">Total Klaim</label>
                                <!-- <p id="harga-diagnosa">Harga: Rp 0</p> -->
                                <p id="total-klaim">Total: Rp <span id="total-harga">0</span></p>
                                <input type="hidden" name="total_klaim" id="total_klaim_input">
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan CSS Select2 -->
                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
                    <!-- Tambahkan JS jQuery dan Select2 -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
                    <!-- Tambahkan SweetAlert2 -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <!-- Inisialisasi Select2 -->
                    <script>
    $(document).ready(function() {
        $('#diagnosa-select').select2({
            placeholder: '-- Pilih Diagnosa --',
            width: '100%'
        });

        const hargaKelas = {
            1: 100000, // Kelas 1
            2: 80000,  // Kelas 2
            3: 60000,  // Kelas 3
            4: 40000   // Kelas 4
        };

        const hargaDiagnosa = {
            serviks: 500000,
            DiabetesMelitus: 300000,
            HIV: 250000,
            Hipertensi: 400000,
            TBParu: 150000,
            // Tambahkan harga untuk diagnosa lainnya
        };

        function updateHarga() {
            const kelas = $('#kelas_pasien').val();
            const hargaKelasPasien = hargaKelas[kelas] || 0;
            const diagnosa = $('#diagnosa-select').val();
            const hargaDiagnosaPilihan = hargaDiagnosa[diagnosa] || 0;
            const total = hargaKelasPasien + hargaDiagnosaPilihan;

            $('#harga-diagnosa').text('Harga: Rp ' + hargaDiagnosaPilihan);
            $('#total-harga').text(total);
            $('#total_klaim_input').val(total);

            // Sembunyikan semua info diagnosa
            $('#infoServiks').fadeOut();
            $('#infoDiabetesMelitus').fadeOut();
            $('#infoHIV').fadeOut();
            $('#infoHipertensi').fadeOut();
            $('#infoTBParu').fadeOut();

            // Tampilkan info sesuai diagnosa yang dipilih
            switch(diagnosa) {
                case 'serviks':
                    $('#infoServiks').fadeIn();
                    break;
                case 'DiabetesMelitus':
                    $('#infoDiabetesMelitus').fadeIn();
                    break;
                case 'HIV':
                    $('#infoHIV').fadeIn();
                    break;
                case 'Hipertensi':
                    $('#infoHipertensi').fadeIn();
                    break;
                case 'TBParu':
                    $('#infoTBParu').fadeIn();
                    break;
            }
        }

        function closeInfoDiabetesMelitus() {
            $('#infoDiabetesMelitus').fadeOut();
        }

        function closeInfoHIV() {
            $('#infoHIV').fadeOut();
        }

        function closeInfoHipertensi() {
            $('#infoHipertensi').fadeOut();
        }

        function closeInfoTBParu() {
            $('#infoTBParu').fadeOut();
        }

        $('#kelas_pasien').change(updateHarga);
        $('#diagnosa-select').change(updateHarga);
    });
</script>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection