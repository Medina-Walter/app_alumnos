<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">App de Alumnos</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
          <i class="fa-regular fa-circle-user"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
        </a><!-- End Profile Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->name }}</h6>
            <span>{{ Auth::user()->role }}</span>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          @if(Auth::user()->rol === 'alumno')
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                <i class="fa-regular fa-circle-user"></i>
                <span>Perfil</span>
              </a>
            </li>
          @endif

          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Salir</span>
              </button>
            </form>
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->

</header>
