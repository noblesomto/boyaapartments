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
               <div class="col-md-12 col-sm-12">
                   <h1>{{ $room->apartment }} - {{ $room->room_title }}</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                       <li>Rooms</li>
                       <li>{{ $room->apartment }} - {{ $room->room_title }}</li>
                   </ol>
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
            <li class="col-md-4 active">
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

       <div class="row">
           <div class="col-md-6">
               <div class="sidebar">
                   <aside class="widget">
                       <div class="vbf order-page">
                           <h2 class="form_title"><i class="fa fa-calendar"></i> GUEST INFORMATION</h2>
                           
                              <div class="row booking">
                                 <div class="col-md-7"><h5>Name</h5></div>
                                 <div class="col-md-5">{{ $user->first_name }} {{ $user->last_name }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Phone</h5></div>
                                 <div class="col-md-5">{{ $user->phone }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Email</h5></div>
                                 <div class="col-md-5">{{ $user->email }}</div>
                              </div>

                

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Address</h5></div>
                                 <div class="col-md-5">{{ $user->address }}</div>
                              </div>

                     
                              <div class="row booking">
                                 <div class="col-md-7"><h5>City</h5></div>
                                 <div class="col-md-5">{{ $user->city }}   </div>
                              </div>

                              <div class="mt20 text-center">
                                <h4>Order QR Code</h4>

                                  {!! QrCode::size(200)->generate('https://boyaapartments.com.ng/booking/'.$order->order_id) !!}
                              </div>
        
                       </div>
                   </aside>
  
               </div>
            </div>
           <div class="col-md-6">
               <div class="sidebar">
                   <aside class="widget">
                       <div class="vbf order-page">
                           <h2 class="form_title"><i class="fa fa-calendar"></i> RESERVATION DETIALS</h2>
                              
                              <div class="row booking">
                                 <div class="col-md-7"><h5>Order ID</h5></div>
                                 <div class="col-md-5">{{ $order->order_id }}</div>
                              </div>
                              <div class="row booking">
                                 <div class="col-md-7"><h5>Apartment</h5></div>
                                 <div class="col-md-5">{{ $room->room_title }} ({{ $room->apartment }})</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Arrival date</h5></div>
                                 <div class="col-md-5">{{ date('j F Y', strtotime($order->checkin)); }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Departure date</h5></div>
                                 <div class="col-md-5">{{ date('j F Y', strtotime($order->checkout)); }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Guest(s)</h5></div>
                                 <div class="col-md-5">{{ $order->guests }}</div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Day(s)</h5></div>
                                 <div class="col-md-5">{{ $order->days }}</div>
                              </div>

                              
                     
                              <div class="row booking">
                                 <div class="col-md-7"><h5>AMOUNT</h5></div>
                                 <div class="col-md-5">

                                    ₦{{ number_format($order->amount, 2, '.', ',') }}
                                 </div>
                              </div>

                              <div class="row booking">
                                 <div class="col-md-7"><h5>Payment Status</h5></div>
                                 <div class="col-md-5"> <span class="button btn_lg btn_blue text-uppercase">{{ $order->payment }}</span> </div>
                              </div>

                       </div>
                   </aside>
  
               </div>
           </div>
       </div>
   </div>
</main>


@include('frontend.layouts.footer')
