@extends('users.layout.index')
@section('content')

<section id="contact" class="padd-section">
<div class="container" data-aos="fade-up">
  <div class="section-title text-center">
    <h2>Contact</h2>
  </div>

  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-3 col-md-4">

      <div class="info">
        <div>
          <i class="bi bi-geo-alt"></i>
          <p>Kampus NF <br> Jalan Lenteng Agung Raya <br>No. 20-21, Srengseng Sawah <br> Jagakarsa, Jakarta Selatan 12640</p>
        </div>

        <div class="email">
          <i class="bi bi-envelope"></i>
          <p>info@nurulfikri.co.id</p>
        </div>

        <div>
          <i class="bi bi-phone"></i>
          <p>+62 851 0218 5441</p>
        </div>
      </div>

      <div class="social-links">
        <a href="https://twitter.com/nurulfikricom" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://facebook.com/nurulfikricom" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/nf.computer/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/nf-computer-a30ab2138" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>

    <div class="col-lg-5 col-md-8">
      <div class="form">
        <form action="/kirim" method="post" role="form" class="php-email-form">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="form-group mt-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="komentar" rows="5" placeholder="Message" required></textarea>
          </div>
          <div id="lmmmm" class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End Contact Section -->
@endsection