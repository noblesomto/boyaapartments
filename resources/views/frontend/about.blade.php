@include('frontend.layouts.header')
@include('frontend.layouts.nav-2')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!-- ========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url({{ asset('frontend/images/page-title.png') }});">
    <div class="container">
        <div class="inner">
            <h1>ABOUT BOYA APARTMENTS</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>ABOUT BOYA APARTMENTS</li>
            </ol>
        </div>
    </div>
</div>



 <!-- ========== MAIN SECTION ========== -->
<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="mb30">Boya Apartments</h1>
                <p>Boya Apartment is a luxury home away from home. We provide clean, comfortable, safe and secure living space. Our trained staff offer high end and courteous service to our esteemed guests. Please come on board.
                </p>

                
            </div>
            <div class="col-md-5">
                <div class="about_img">
                    <img src="{{ asset('frontend/images/boya.png') }}" class="img1 img-responsive" alt="Image">
                    <img src="{{ asset('frontend/images/boya.png') }}" class="img2 img-responsive" alt="Image">
                </div>

                <!-- 
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="150"></div>
                                <div class="text">Rooms</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="50"></div>
                                <div class="text">staffs</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="4"></div>
                                <div class="text">restaurant</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="countup_box">
                            <div class="inner">
                                <div class="countup number" data-count="3"></div>
                                <div class="text">pools</div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        
        
    </div>

</main>

@include('frontend.layouts.footer')
