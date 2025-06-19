<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img id='img-LogoKl' src="{{ asset('admin/assets/images/logos/logo.png') }}" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span id='contaimner-sideSpan' class="hide-menu">Home</span>
          </li>
          @if(Auth::user()->role_access == 'peserta')
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{url('/')}}" aria-expanded="false">
              <span>
              <i class="fa-solid fa-house"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Goback</span>
            </a>
          </li>
          @endif


          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{url('/dashboard')}}" aria-expanded="false">
              <span>
              <i class="fa-solid fa-house"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->role_access == 'pengajar')
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{url('/index_pengajar')}}" aria-expanded="false">
              <span>
              <i class="fa-solid fa-calendar-days"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Jadwal Kelas</span>
            </a>
          </li>
          @endif

          @if(Auth::user()->role_access == 'admin')
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{route('jadwal.index')}}" aria-expanded="false">
              <span>
              <i class="fa-solid fa-calendar-days"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Jadwal Kelas</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span id='contaimner-sideSpan' class="hide-menu">Master Data</span>
          </li>
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{route('materi.index')}}" aria-expanded="false">
              <span>
              <i class="fa-sharp fa-solid fa-book-open"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Materi Pelajaran</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{route('kelas.index')}}" aria-expanded="false">
              <span>
              <i class="fa-regular fa-rectangle-list"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Kelas</span>
            </a>
          </li>
          <li class="sidebar-item">

            <a id='container-sidLink' class="sidebar-link" href="{{route('pengajar.index')}}" aria-expanded="false">

              <span>
              <i class="fa-solid fa-user-group"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Pengajar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{route('peserta.index')}}" aria-expanded="false">
              <span>
              <i class="fa-solid fa-users"></i>
              </span>
              <span id='container-SPP' class="hide-menu">Peserta</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a id='container-sidLink' class="sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
              <span>
              <i class="bi bi-person-fill-add"></i>
              </span>
              <span id='container-SPP' class="hide-menu">User Management</span>
            </a>
          </li>
          @endif
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
