@include('frontend.layouts.header')
@include('frontend.layouts.nav-2')

<!-- ========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url({{ asset('frontend/images/page-title.png') }});">
    <div class="container">
        <div class="inner">
            <h1>CONTACT US</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>CONTACT US</li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt20">
        @if(session('status'))
           <div class="alert alert-{{session('status')['type']}}">
               <h3 class="text-danger">{{session('status')['text']}}</h3>
           </div>
       @endif
    </div>
</div>

<!-- ========== MAIN ========== -->
<main id="contact_page">
   <div class="container">
       <div class="row">
           
           <div class="col-md-8">
               <div class="main_title a_left">
                   <h2>CONTACT US</h2>
               </div>
               <form class="contact-form-page" action="/contact-us" method="POST">
                  @csrf
                   <div class="row">
                       <div class="form-group col-md-6 col-sm-6">
                           <label class="control-label">Name</label>
                           <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                       </div>
                       <div class="form-group col-md-6 col-sm-6">
                           <label class="control-label">Phone</label>
                           <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                       </div>
                       <div class="form-group col-md-6 col-sm-6">
                           <label class="control-label">Email</label>
                           <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                       </div>
                       <div class="form-group col-md-6 col-sm-6">
                           <label class="control-label">Subject</label>
                           <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                       </div>
                       <div class="form-group col-md-12">
                           <label class="control-label">Message</label>
                           <textarea class="form-control" name="message" placeholder="Your Message..." required></textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <button type="submit" class="button  btn_blue mt40 upper pull-right">
                               <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send Your Message
                           </button>
                       </div>
                   </div>
               </form>
           </div>
           
           <div class="col-md-4">
               <div class="main_title a_left">
                   <h2>GET IN TOUCH</h2>
               </div>
               <ul class="contact-info upper">
                   <li>
                       <span>ADDRESS:</span> Plot 405, road 45, 1st avenue,  Gwarinpa. Abuja
                   </li>
                   <li>
                       <span>EMAIL:</span> info@boyaapartments.com.ng
                   </li>

                   <li>
                       <span>PHONE:</span> +234 <strong>08067976421</strong>
                   </li>
                   <li>
                       <span>PHONE:</span> +234 <strong>08175057505</strong>
                   </li>
               </ul>
               <div class="social_media">
                   <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                   <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                   
                   <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
               </div>
           </div>
       </div>
   </div>
</main>


@include('frontend.layouts.footer')
