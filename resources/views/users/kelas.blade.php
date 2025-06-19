@extends('users.layout.index')
@section('content')

<div class="container" data-aos="fade-up">

  <div class="section-title text-center">

    <h2 id='container-schd'>available classes</h2>
    <p id='container-scd' class="separator">with materials that support skills</p>
  </div>
  
  <section id="pricing" class="padd-section text-cente">
        <div id="div-div" class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        @foreach($kelas as $k)
          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="pricing-table">
                <h4 id="div-KL">{{$k->nama}}</h4>
                <ul class="list-unstyled">
                    @foreach($materi as $m)
                    @if($m->kelas_id == $k->id)
                     <li><b class="lkksa">{{$m->nama}}</b></li>
                     @endif
                    @endforeach
                </ul>
                <div class="table_btn">
                  <a href="{{url('/show_class',$k->id)}}" class="btn"><i class="bi bi-eye"></i>Detail</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
  </section>
        </div>
@endsection