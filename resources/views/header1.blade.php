
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="{{Route('welcome')}}"><img src="img/logo1.png"  style="height: 32px ; width: 126px;"alt=""></a>

      </div>

      <nav id="navbar" class="navbar">
        <ul>
        @guest


          <li><a class="nav-link scrollto active" href="{{Route('welcome')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ Route('about') }}">About</a></li>
          <li><a class="nav-link scrollto" href="{{Route('faq')}}">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

         @else
          <li class="dropdown"><a href="#"><span>Event Catagories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Wedding</a></li>
              <li class="dropdown"><a href="#"><span>Corporate Function</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Seminar</a></li>
                  <li><a href="#">Conference</a></li>
                  <li><a href="#">Office Party</a></li>


                </ul>
              </li>
              <li><a href="#">Birthday party</a></li>
              <li><a href="#">Social Function</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Essential Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Catering</a></li>
              <li><a href="#">Car Rental</a></li>
              <li><a href="#">Music System Rental</a></li>
              <li><a href="#">Perlour</a></li>
              <li><a href="#">Worker</a></li>
              <li><a href="#">Gifts</a></li>



            </ul>
          </li>

                    <li><a class="nav-link scrollto" href="{{ route('users.index') }}">Users</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('products.index') }}">Products</a></li>
                    <li class="dropdown" aria-labelledby="navbarDropdown"><a href="#">
                    <span> {{ Auth::user()->name }} </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                              </a>
                                              </li>


                                              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                  @csrf
                                              </form>


                    </ul>


                                          </li>


          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section =======
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to Celebration</h1>
      <h2>Celebrate events efficiently</h2>

      @guest
        <a href="{{route('login')}}" class="btn-get-started">Sign in</a>
        <a href="{{route('register')}}" class="btn-get-started">Register</a>
      @else
        <p>You are logged in already.</p>
        <p> please continue to use service </p>
        <p> <i>This page is under construction </i> </p>
      @endguest
    </div>
  </section><!-- End Hero Section -->
