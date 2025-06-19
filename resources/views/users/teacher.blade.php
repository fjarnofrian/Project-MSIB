@extends('users.layout.index')
@section('content')

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">

    <h2 id='container-schd'>teacher</h2>
    <p id='container-scd' class="separator">My teacher</p>
  </div>
  <div class="row">
    @foreach($pengajar as $data)
      <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="feature-block">
        @empty($data->foto)
                      <img src="{{asset('admin/assets/images/nophoto.jpg')}}" class="card-img-top"  alt="...">
                      @else
                      <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" class="card-img-top" style="width : 100%; height : 100%" alt="{{$data->foto}}">
                      @endempty
          <h4>{{$data->nama}}</h4>
          <p>{{$data->desk}}</p>
          <a href="#">read more</a>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection