<!-- @extends('layouts.user_type.auth')

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
                        <h5 class="mb-1">{{ __('PANDUAN PRAKTIK KLINIS') }}</h5>
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
                <h6 class="mb-0">{{ __('Pilih Diagnosa') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="form-group">
                    <label for="diagnosa" class="h6 text-primary">Diagnosa</label>
                    <select id="diagnosa" class="form-control form-control-lg">
                        <option value="">-- Pilih Diagnosa --</option>
                        <option value="serviks">Serviks</option>
                        <option value="diagnosa2">Diabetes Melitus</option>
                        <option value="diagnosa3">HIV</option>
                        <option value="diagnosa4">Hipertensi</option>
                        <option value="diagnosa5">TB Paru</option>
                    </select>
                </div>
                <div id="infoServiks" class="mt-4 animate__animated animate__fadeIn" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="fas fa-notes-medical me-2"></i>Anamnesis</h6>
                        </div>
                        <div class="card-body">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">
                                    <i class="fas fa-circle me-2"></i>Perdarahan pervagina abnormal
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-circle me-2"></i>Perdarahan post koital
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-circle me-2"></i>Perdarahan pasca menopause
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="fas fa-microscope me-2"></i>Penunjang</h6>
                        </div>
                        <div class="card-body">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">
                                    <i class="fas fa-circle me-2"></i>Foto rontgen paru-paru
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-circle me-2"></i>Pemeriksaan hispatologi jaringan serviks bila perlu dilakukan dilatasi kuretase
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="alert alert-success mt-3 shadow-lg border-0" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Sudah Sesuai Kriteria Anjuran Dokter</strong>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('user-profile') }}" class="btn bg-gradient-primary btn-lg">
                        <i class="fas fa-arrow-right me-2"></i>{{ __('Lanjutkan') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

Add Font Awesome and Animate.css CDN
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<script>
document.getElementById('diagnosa').addEventListener('change', function() {
    var infoServiks = document.getElementById('infoServiks');
    if (this.value === 'serviks') {
        infoServiks.style.display = 'block';
    } else {
        infoServiks.style.display = 'none';
    }
});
</script>

@endsection

<!--    
<a href="{{ route('user-profile') }}" class="text-decoration-none"> 
<h5 class="mb-0">Lanjutkan</h5>
</a>  --> -->