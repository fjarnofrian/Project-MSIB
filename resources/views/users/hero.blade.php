@extends('users.layout.index')
@section('content')   
    <!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <h1>Welcome To E-Schedule</h1>
      <h2>An Information System Website To Monitor Your Schedule......</h2>
      <img src="{{url('assets/img/hero.png')}}" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      <a href="{{url('/about')}}" class="btn-get-started scrollto">Get Started</a>
      <div class="btns">
        @foreach($kelas as $data)
        <a href="{{url('/show_class',$data->id)}}"><i class="fa fa-apple fa-3x"></i>{{$data->nama}}</a>
        @endforeach
      </div>
    </div>
</section>
    <!-- ======= End Hero Section ======= -->
@endsection