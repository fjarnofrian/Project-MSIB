@extends('admin.layout.index')
@section('content')
<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @empty($pesert->foto)
            <img id='ghhh-img' src="{{url('admin/assets/images/')}}" class="card-img-top">
            @else
              <img id='ghhh-img' src="{{url('admin/assets/images/')}}/{{$pesert->foto}}" class="card-img-top">
            @endempty
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button id="psrta-dtaaa" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 id="psrta-dtaa" class="card-title">Detail Peserta</h5>

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label ">Name</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{ $pesert->nama }}</div>
                  </div>

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label ">Gender</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{ $pesert->gender }}</div>
                  </div>

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label">telp</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{ $pesert->telp }}</div>
                  </div>

				  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label">E-Mail</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{ $pesert->email }}</div>
                  </div>

				  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label">Alamat</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{ $pesert->alamat }}</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->
              <a href="{{ url('/peserta') }}" id='tbn-goback' class="btn btn-warning btn-lg">Go Back</a>
            </div>
          </div>

        </div>
      </div>
</section>
@endsection