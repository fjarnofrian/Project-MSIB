@extends('admin.layout.index')
@section('content')
<div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Peserta</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$peserta_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Pengajar</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$pengajar_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Kelas</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$kelas_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
</div>
              
@endsection