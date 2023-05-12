@include('frontend.layouts.header')
@include('frontend.layouts.nav-2')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!-- ========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url({{ asset('frontend/images/page-title.png') }});">
    <div class="container">
        <div class="inner">
            <h1>HOW IT WORKS</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>HOW IT WORKS</li>
            </ol>
        </div>
    </div>
</div>



 <!-- ========== MAIN SECTION ========== -->
<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="mb30">How It Works</h1>
                 <p>Step 1: Select an apartment, enter checkin and checkout date to check availability.</p>

                <p>Step 2: If the Apartment is available, then you create an account or login to proceed,</p>

                <p>Step 3: Make Payment Online for the selected Apartment and See the payment details</p>

                <p>Step 4: Login to your dashboard to see the booked apartment details </p>

                
            </div>

            </div>
        </div>
        
        
    </div>

</main>

@include('frontend.layouts.footer')
