@extends('users.layout.index')
@section('content') 
<section id="features" class="padd-section text-center">

      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>{{$kelas_detail->nama}}</h2>
          <p class="separator">{{$kelas_detail->desk}}</p>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        @foreach($materi as $m)
        @if($m->kelas_id == $kelas_detail->id)
          <div class="col-md-6 col-lg-3">
            <div class="feature-block">
              <img src="{{asset('assets/img/bookmark.png')}}" alt="img">
              <h4>{{$m->nama}}</h4>
              <p>{{$m->desk}}</p>
            </div>
          </div>
          @endif
        @endforeach
        </div>
      </div>
    </section>
@endsection