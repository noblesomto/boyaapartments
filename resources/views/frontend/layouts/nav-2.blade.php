<body>

    <div id="smoothpage" class="wrapper">


  <!-- ========== HEADER ========== -->
  <header class="fixed">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse" data-target=".mobile_menu" aria-expanded="false">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">
                  <img src="{{ asset('frontend/images/logo-2.png') }}" height="40" alt="Boya Apartments">
              </a>
          </div>
          <nav id="main_menu" class="mobile_menu navbar-collapse">
              <ul class="nav navbar-nav">
                  
                  <li class="mobile_menu_title" style="display:none;">MENU</li>
                  <li class="simple_menu {{ (request()->is('/')) ? 'active' : '' }}"><a href="/">HOME</a></li>
                  <li class="{{ (request()->is('about-us')) ? 'active' : '' }}"><a href="/about-us">ABOUT US</a></li>
                  
                  
                  <li class="{{ (request()->is('how-it-works')) ? 'active' : '' }}"><a href="/how-it-works">HOW IT WORKS</a></li>
                  <li class="{{ (request()->is('contact-us')) ? 'active' : '' }}"><a href="/contact-us">CONTACT US</a></li>
                  @if( session()->get('user_id') =='')
                      <li class="{{ (request()->is('login')) ? 'active' : '' }}"><a href="/login">LOGIN</a></li>
                  @else
                      <li class="{{ (request()->is('user/index')) ? 'active' : '' }}"><a href="/user/index">MY ACCOUNT</a></li>
                  @endif
                  <li class="menu_button">
                      <a href="/rooms" class="button  btn_yellow"><i class="fa fa-calendar"></i>BOOK A ROOM</a>
                  </li>
              </ul>
          </nav>
      </div>
  </header>