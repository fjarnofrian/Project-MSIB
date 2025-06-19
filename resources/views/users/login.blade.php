<!DOCTYPE html>
<html lang="en">

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
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div id='container-cardsss' class="card">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img id='container-ImgLogin' src="{{url('assets/img/hero.png')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-solid fa-calendar-days fa-2x me-3" style="color: #18d26e;"></i>
                    <span id='container-spLogin' class="h1 fw-bold mb-0">E-Sceduler</span>
                  </div>

                  <h5 id='container-HH5cLogin' class="fw-normal mb-3 pb-3">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="username" class="form-control form-control-lg" placeholder="Username" />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button id='btnLogin' class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                  </div>

                  <a id='container-APLogin' class="small text-muted" href="#">Forgot password?</a>
                  <p id='container-APLogin' class="mb-5 pb-lg-2">Don't have an account? <a id='container-APRegis' class="regiss" href="#">Register here</a></p>
                  <a id='container-APLogin' href="#" class="small text-muted">Terms of use.</a>
                  <a id='container-APLogin' href="#" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- ======= Vendor JS Files ======= -->
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