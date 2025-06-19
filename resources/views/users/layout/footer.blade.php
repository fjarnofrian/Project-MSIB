    <!-- ======= Footer ======= -->
    <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">E-Schedule</a>
            <p>An information system website to monitor your schedule such as office schedules, 
              class schedules, and so on.  A system that is easy to understand and can be accessed 
              comfortably and efficiently on your handphone.
        </p>
            

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Tentang Kami</h4>

            <ul class="list-unstyled">
            <li><a href="https://www.nurulfikri.com/faq/">FAQ</a></li>
              <li><a href="https://www.nurulfikri.com/tentang-kami/">Tentang NF Computer</a></li>
              <li><a href="{{url('/teacher')}}">Techer</a></li>
              <li><a href="https://www.nurulfikri.com/category/article/">Artikel</a></li>
              
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="list-menu">

            <h4>Kelas</h4>
            

            <ul class="list-unstyled">
            @foreach($kelas as $data)
              <li><a href="#">{{
                $data->nama}}</a></li>
                @endforeach
            </ul>
            

          </div>
              </div>

      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights E-Schedule. All rights reserved.</p>
        <div class="credits">
          Designed by <a href="https://github.com/dtscorp/E-Schedule.git">E-Schedule</a>
        </div>
      </div>
    </div>
</footer>
    <!-- =======  End  Footer =======  -->