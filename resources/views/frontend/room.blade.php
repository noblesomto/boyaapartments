@include('frontend.layouts.header-2')
@include('frontend.layouts.nav-2')
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

<div class="container">
    <div class="row mt20">
        @if(session('status'))
           <div class="alert alert-{{session('status')['type']}}">
               <h3 class="text-danger">{{session('status')['text']}}</h3>
           </div>
       @endif
    </div>
</div>

<!-- =========== MAIN ========== -->
<main id="room_page">
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               <div class="slider">
                   <div id="slider-larg" class="owl-carousel image-gallery">
                       <!-- ITEM -->
                       <div class="item lightbox-image-icon">
                           <a href="{{  asset('uploads/'.$room->room_picture) }}" class="hover_effect h_lightbox h_blue">
                               <img class="img-responsive" src="{{  asset('uploads/'.$room->room_picture) }}" alt="Image">
                           </a>
                       </div>
                       @foreach ( $image as $pix )
                       <!-- ITEM -->
                       <div class="item lightbox-image-icon">
                           <a href="{{ asset('uploads/images/'.$pix->image) }}" class="hover_effect h_lightbox h_blue">
                               <img class="img-responsive" src="{{ asset('uploads/images/'.$pix->image) }}" alt="Image">
                           </a>
                       </div>
                       @endforeach
                       
                   </div>
                   <div id="thumbs" class="owl-carousel">
                       <!-- ITEM -->
                       <div class="item"><img class="img-responsive" src="{{  asset('uploads/'.$room->room_picture) }}" alt="Image"></div>
                       @foreach ( $image as $pix )
                       <!-- ITEM -->
                       <div class="item"><img class="img-responsive" src="{{ asset('uploads/images/'.$pix->image) }}" alt="Image"></div>
                       @endforeach
                       
                   </div>
               </div>
               <div class="main_title mt50">
                   <h2>{{ $room->apartment }} - {{ $room->room_title }}</h2>
               </div>
               <span class="text-black">{!! $room->room_description !!}</span>
               
               
               <div class="main_title t_style a_left s_title mt50">
                   <div class="c_inner">
                       <h2 class="c_title">ROOM SERVICES</h2>
                   </div>
               </div>

               <?php 
                   $features= $room->room_features;
                   $features = explode(",",$features);
                ?>
                         
                 <div class="room_services">

                     <?php foreach ($features as $feature){ ?>
                     <div class="features-list">
                        <img src="{{ asset('frontend/images/icons/') }}/<?= $feature ?>.png" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?= $feature ?>" > <br>
                    <span ><?= $feature ?></span>
                     </div>
                    
                    <?php } ?>

                 </div>

                 <div class="mt20">
                    <div class="main_title t_style a_left s_title mt50">
                       <div class="c_inner">
                           <h2 class="c_title">ROOM AVAILABILITY</h2>
                       </div>
                   </div>
                      <div id='calendar'></div>
                 </div>

 
               <div class="similar_rooms">
                   <div class="main_title t_style5 l_blue s_title a_left">
                       <div class="c_inner">
                           <h2 class="c_title">SIMILAR ROOMS</h2>
                       </div>
                   </div>
                   <div class="row">
                    @foreach ( $similar as $row )
                       <div class="col-md-4">
                           <article>
                               <figure>
                                   <a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}" class="hover_effect h_blue h_link"><img src="{{  asset('uploads/'.$row->room_picture) }}" alt="Image" class="img-responsive"></a>
                                   <div class="price">₦{{ number_format($row->room_price, 0, '.', ',') }}<span> night</span></div>
                                   <figcaption>
                                       <h4><a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}">{{ $row->apartment }} - {{Str::limit($row->room_title, 40, $end='...')}}</a></h4>
                                   </figcaption>
                               </figure>
                           </article>
                       </div>
                       @endforeach
                      
                   </div>
               </div>
           </div>
           <div class="col-md-4">
               <div class="sidebar">
                   <aside class="widget">
                       <div class="vbf">
                           <h2 class="form_title"><i class="fa fa-calendar"></i> BOOK ONLINE</h2>
                           <form action="/book/{{ $room->room_id }}" class="inner">
                              @csrf
   
                              <div class="form-group col-md-12 col-sm-6 col-xs-12 nopadding">
                                   <div class="input-group">
                                       <div class="form_date">
                                           <div class="date" id="dateArrival" data-text="Arrival Date">
                                            <div class="pt-1"></div>
                                            <input type="text" id="from" name="checkin" placeholder="Arrival Date" class="form-control" required>
                                        </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="form-group col-md-12 col-sm-6 col-xs-12 nopadding">
                                   <div class="input-group">
                                       <div class="form_date">
                                           <div class="date" id="dateDeparture" data-text="Departure Date">
                                               <div class="pt-1"></div>
                                              <input type="text" id="to" name="checkout" placeholder="Departure Date" class="form-control" required>
                                           </div>
                                       </div>
                                   </div>
                               </div>


                               <div class="form-group col-md-12 col-sm-6 col-xs-12 nopadding">
                                   <div class="form_select">
                                       <select name="guests" id="qty-result" class="form-control md_noborder_right" title="Guests" data-header="Guests" required>
                        
                                           <option value="1" selected>1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                       </select>
                                   </div>
                               </div>

                              
                
                               <div class="form-group">
                                   <h4><div id="days"></div></h4>
                                    <input type="hidden" id="total" name="days" class="form-control">
                               </div>
                               <button class="button btn_lg btn_blue btn_full" type="submit">BOOK ROOM NOW</button>
                               <input type="hidden" name="room_id" value="{{ $room->room_id }}">
                           </form>
                       </div>
                   </aside>
                   <aside class="widget">
                       <h4>NEED HELP?</h4>
                       <div class="help">
                           If you have any question please don't hesitate to contact us
                           <div class="phone"><i class="fa  fa-phone"></i><a href="tel:08067976421"> 08067976421 </a></div>
                           <div class="email"><i class="fa  fa-envelope-o "></i><a href="mailto:info@boyaapartments.com.ng">info@boyaapartments.com.ng</a> or use <a href="/contact"> contact form</a></div>
                       </div>
                   </aside>

                   <aside class="widget">
                     <div class="vbf house-rules">
                     <h4>APARTMENT RULES</h4>
                     <ul class="text-black">
                        <li><strong>Check-In:</strong> 2PM</li>
                        <li><strong>Check-Out:</strong> 12PM</li>
                        <li><strong>Cancellation/Repayment:</strong> Cancellation must be a day before the checkin date, and Repayment is done within 5 working days from the cancellation date.  </li>
                        <li><strong>Pets:</strong> Pets are not allowed.</li>
                        <li><strong>Parties:</strong> Parties are not allowed.</li>
                        <li><strong>Smoking:</strong> Smoking is not allowed.</li>
                   
                     </ul>
                  </div>
                   </aside>
                 
               </div>
           </div>
       </div>
   </div>
</main>

 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar:{
                left:'prev,next today',
                center:'title',
                right:'dayGridMonth,timeGridWeek'
            },

            locale:"en",
            displayEventTime:false, 
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            validRange: function (nowDate) {
              return {
                start: nowDate
              };
            },
            events: <?php echo json_encode($events); ?>

          });
          calendar.render();
        });
  
      </script>

<script>
  $(function() {
    
    $('.submit').hide();
    $('.days').html('please select atleast a day');
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
    
    $('#to').on('change',function(){
     var days = (daydiff(parseDate($('#from').val()), parseDate($('#to').val())));
      $('#days').html('Total of ' + days + ' day(s)' );
      document.getElementById('total').value = days;
      if(days){
        $('.submit').show();
      }
      
    })
    
    function parseDate(str) {
    var mdy = str.split('/')
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function daydiff(first, second) {
    return (second-first)/(1000*60*60*24);
}
    
  });
  </script>

@include('frontend.layouts.footer')
