@include('frontend.layouts.header')
@include('frontend.layouts.nav-2')
<link href="{{ asset('frontend/css/step-form.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url({{ asset('frontend/images/page-title.png') }});">
   <div class="container">
       <div class="inner">
           <div class="row">
               <div class="col-md-8 col-sm-8">
                   <h1>{{ $room->apartment }} - {{ $room->room_title }}</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                       <li>Rooms</li>
                       <li>{{ $room->apartment }} - {{ $room->room_title }}</li>
                   </ol>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="price">
                       <div class="inner">
                           ₦{{ number_format($room->room_price, 0, '.', ',') }} <span>per night</span>
                       </div>
                   </div>
               </div>
           </div>
     
       </div>
   </div>
</div>

<div class="container reservation-section">
   <div class="row">
      <div class="col-md-12">
         <div class="step-wrapper">
            <div class="container">
            <div class="stepper">
            <ul class="row">
            <li class="col-md-4 active">
                <a href=""><span data-text="Room & rates"></span></a>
            </li>
            <li class="col-md-4 active">
                <a href=""><span data-text="Reservation"></span></a>
            </li>
            <li class="col-md-4">
                <a href=""><span data-text="Checkout"></span></a>
            </li>
            </ul>
            </div>
            </div>
            </div>
      </div>
   </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
   <div class="container">
      <div class="row mt20 text-center ">
          @if(session('status'))
             <div class="alert alert-{{session('status')['type']}}">
                 <h4 class="text-success">{{session('status')['text']}}</h4>
             </div>
         @endif
      </div>
       <div class="row">
           <div class="col-md-6">
               <div class="slider">
                   <div id="slider-larg" class="owl-carousel image-gallery">
                       <!-- ITEM -->
                       <div class="item lightbox-image-icon">
                           <a href="{{  asset('uploads/'.$room->room_picture) }}" class="hover_effect h_lightbox h_blue">
                               <img class="img-responsive" src="{{  asset('uploads/'.$room->room_picture) }}" alt="Image">
                           </a>
                       </div>
           
                       
                   </div>
       
               </div>
               <div class="main_title mt10">
                  <h2>{{ $room->apartment }} - {{ $room->room_title }}</h2>
               </div>



           </div>
           <div class="col-md-6">
               <div class="sidebar">
                   <aside class="widget">
                       <div class="vbf">
                           <h2 class="form_title"><i class="fa fa-calendar"></i> BOOKING DETIALS</h2>
                           
                              <div class="row booking">
                                 <div class="col-md-7"><h5>Arrival date</h5></div>
                                 <div class="col-md-5">{{ date('j F Y', strtotime(session()->get('checkin'))); }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Departure date</h5></div>
                                 <div class="col-md-5">{{ date('j F Y', strtotime(session()->get('checkout'))); }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Guest(s)</h5></div>
                                 <div class="col-md-5">{{ session()->get('guests') }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Days</h5></div>
                                 <div class="col-md-5">{{ session()->get('days') }} Day(s)</div>
                              </div>

                              @php if(session()->get('days')>=7 && session()->get('days')<30){ @endphp

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Discount Price</h5></div>
                                 <div class="col-md-5">₦{{ number_format($room->discount_7, 0, '.', ',') }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Cost</h5></div>
                                 <div class="col-md-5">₦{{ number_format($room->discount_7, 0, '.', ',') }} X {{ session()->get('days') }} Day(s) </div>
                              </div>
                              <hr>
                              <div class="row booking">
                                 <div class="col-md-7"><h4>TOTAL</h4></div>
                                 <div class="col-md-5">

                                    <?php $total = $room->discount_7 * session()->get('days')  ?> 
                                    ₦{{ number_format($total, 0, '.', ',') }}</div>
                              </div>
                              @php }elseif(session()->get('days')>=30){  @endphp

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Discount Price</h5></div>
                                 <div class="col-md-5">₦{{ number_format($room->discount_30, 0, '.', ',') }}</div>
                              </div>
                                
                                <div class="row booking">
                                     <div class="col-md-7"><h5>Cost</h5></div>
                                     <div class="col-md-5">₦{{ number_format($room->discount_30, 0, '.', ',') }} X {{ session()->get('days') }} Day(s) </div>
                                  </div>
                                  <hr>
                                  <div class="row booking">
                                     <div class="col-md-7"><h4>TOTAL</h4></div>
                                     <div class="col-md-5">

                                        <?php $total = $room->discount_30 * session()->get('days')  ?> 
                                        ₦{{ number_format($total, 0, '.', ',') }}</div>
                                  </div>

                              @php }else{ @endphp

                                    <div class="row booking">
                                         <div class="col-md-7"><h5>Room Price</h5></div>
                                         <div class="col-md-5">₦{{ number_format($room->room_price, 0, '.', ',') }}</div>
                                      </div>

                                    <div class="row booking">
                                         <div class="col-md-7"><h5>Cost</h5></div>
                                         <div class="col-md-5">₦{{ number_format($room->room_price, 0, '.', ',') }} X {{ session()->get('days') }} Day(s) </div>
                                      </div>
                                      <hr>
                                      <div class="row booking">
                                         <div class="col-md-7"><h4>TOTAL</h4></div>
                                         <div class="col-md-5">

                                            <?php $total = $room->room_price * session()->get('days')  ?> 
                                            ₦{{ number_format($total, 0, '.', ',') }}</div>
                                    </div>

                              @php } @endphp

                              <div class="row booking">
                                 <div class="col-md-5 pt40"><h5>MAKE PAYMENT</h5></div>
                                 <div class="col-md-7"> 
                                 <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            @csrf
                                 <?php $trans_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8); ?>
                                <input type="hidden" name="reference" value="{{ $trans_id }}">
                                <input type="hidden" name="email" value="{{ session()->get('email') }}">      
                                <input type="hidden" name="orderID" value="{{ $trans_id }}">
                                <input type="hidden" name="id" value="{{ $trans_id }}">
                                <input type="hidden" name="amount" value="{{ $total * 100}}">
                                <input type="hidden" name="plan" value="{{ $room->room_id }}" >
                                <input type="hidden" name="currency" value="NGN">

                                <input type="hidden" name="price000" value="{{ $total }}">
                                <input type="hidden" name="room_id" value="{{ $room->room_id }}" >
                                {{ csrf_field() }} 
                                    <button class="button btn_lg btn_blue btn_full"> <img class="img-responsive" src="{{ asset('frontend/images/paystack.png') }}">  </button></div>
                              </div>
                              

                               
                              
                
                               <div class="form-group">
                                  
                               </div>
                               
                               
                               
                          
                       </div>
                   </aside>
                  
                 
               </div>
           </div>
       </div>
   </div>
</main>


@include('frontend.layouts.footer')
