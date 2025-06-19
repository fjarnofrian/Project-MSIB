@extends('admin.layout.index')
@section('content')

<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <h5 id="psrta-dtaa" class="card-title">Detail Materi</h5>
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

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label ">Kode Kelas</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{$materi->kode_materi}}</div>
                  </div>

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label ">Nama Kelas</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{$materi->nama}}</div>
                  </div>

                  <div class="row">
                    <div id="psrta-dta" class="col-lg-3 col-md-4 label">Deksripsi</div>
                    <div id="psrta-dta" class="col-lg-9 col-md-8"> : {{$materi->desk}}</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->
              <a href="{{Route('materi.index')}}" id='tbn-goback' class="btn btn-warning btn-lg">Go Back</a>
            </div>
          </div>

        </div>
      </div>
</section>

@endsection