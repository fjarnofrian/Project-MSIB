<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Schedule</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- ======= Favicons ======= -->
  <link href="{{asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- ======= Google Fonts ======= -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- ======= Vendor CSS Files ======= -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- ======= Template Main CSS File ======= -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>

<section id='container-secLogin' class="vh-100">
  <div id="llaaaa" class="container py-5 h-100">
    <div id="lass" class="row d-flex justify-content-center align-items-center h-100">
      <div id="ssss" class="col col-xl-10">
        <div id='container-cardsss' class="card">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img id='container-ImgLogin' src="{{url('assets/img/hero.png')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form method="POST" action="{{route('register')}}">
                      @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-solid fa-calendar-days fa-2x me-3" style="color: #18d26e;"></i>
                    <span id='container-spLogin' class="h1 fw-bold mb-0">E-Sceduler</span>
                  </div>

                  <h5 id='container-HH5cLogin' class="fw-normal mb-3 pb-3">Sign into your account</h5>
                  <div class="form-outline mb-4">
                  <input id="id_card" type="id_card" class="form-control @error('id_card') is-invalid @enderror" placeholder="NIP/NIK" name="id_card" value="{{ old('id_card') }}" required autocomplete="id_card" autofocus>
                    @error('id_card')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                  <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                  <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-outline mb-4">
                  <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" autofocus>
                  </div>

                  <div class="pt-1 mb-4">
                    <button id='btnrgisss' class="btn btn-dark btn-lg btn-block" type="submit">{{ __('register') }}</button>
                    <p id='container-APRegggs' class="mb-5 pb-lg-2">have an account yet? <a class="contair" href="{{ route('login') }}">{{ __('Login Here') }}</a></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6e1b60fb-7351-451f-941c-ab0e266dfa4d";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

  <!-- ======= Template Main JS File ======= -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>