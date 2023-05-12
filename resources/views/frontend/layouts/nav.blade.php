<body>
    
    <!-- ========== PRELOADER ========== 
    <div id="loading">
        <div class="inner">
            <div class="loading_effect">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    -->
    
    <div class="wrapper">
        
        <!-- ========== HEADER ========== -->
        <header class="fixed transparent">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse" data-target=".mobile_menu" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand light" href="/">
                        <img src="{{ asset('frontend/images/logo.png') }}" height="120" alt="Boya Apartments">
                    </a>
                    <a class="navbar-brand dark nodisplay" href="/">
                        <img src="{{ asset('frontend/images/logo-2.png') }}" height="40" alt="Boya Apartments">
                    </a>
                </div>
                <nav id="main_menu" class="mobile_menu navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="mobile_menu_title" style="display:none;">MENU</li>
                        <li class="simple_menu active"><a href="/">HOME</a></li>
                        <li class=""><a href="/about-us">ABOUT US</a></li>
                        
                        
                        <li><a href="/how-it-works">HOW IT WORKS</a></li>
                        <li><a href="/contact-us">CONTACT US</a></li>
                        @if( session()->get('user_id') =='')
                            <li><a href="/login">LOGIN</a></li>
                        @else
                            <li><a href="/user/index">MY ACCOUNT</a></li>
                        @endif
                        <li class="menu_button">
                            <a href="/rooms" class="button  btn_yellow"><i class="fa fa-calendar"></i>BOOK A ROOM</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header> 