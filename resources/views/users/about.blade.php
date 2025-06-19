@extends('users.layout.index')
@section('content')

<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us padd-section">
<div class="container" data-aos="fade-up">
  <div class="row justify-content-center">

    <div class="col-md-5 col-lg-3">
      <img id="imscde" src="{{url('assets/img/schedule.png')}}" alt="About" data-aos="zoom-in" data-aos-delay="100">
    </div>

    <div class="col-md-7 col-lg-5">
      <div class="about-content" data-aos="fade-left" data-aos-delay="100">

        <h2><span>E-Schedule</span></h2>
        <p>An information system website to monitor your schedule such as office schedules, class schedules, and so on.  A system that is easy to understand and can be accessed comfortably and efficiently on your handphone.
        </p>

        <ul class="list-unstyled">
          @foreach($kelas as $data)
          <li><i class="vi bi-chevron-right"></i>{{$data->nama}}</li>
          @endforeach
        </ul>
        

      </div>
    </div>

  </div>
</div>
</section><!-- End About Us Section -->
@endsection