@include('frontend.layouts.header')
@include('frontend.layouts.nav')
@include('frontend.layouts.slider')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- ========== BOOKING FORM ========== -->
<div class="hbf_3">
    <div class="container">
        <div class="inner">
            <form action="/search-rooms" method="POST">
                @csrf
                <div class="row">
                  
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 arrival_date md_pl5 md_nopadding_right">
                                <div class="form-group">
                                    <div class="form_date">
                                           <div class="date" id="dateArrival" data-text="Arrival Date">
                                            <div class="pt-1"></div>
                                            <input type="text" id="from" name="checkin" placeholder="Arrival Date" class="form-control" required>
                                        </div>
                                       </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 departure_date md_pr5 md_nopadding_left">
                                <div class="form-group">
                                    <div class="form_date">
                                           <div class="date" id="dateDeparture" data-text="Departure Date">
                                               <div class="pt-1"></div>
                                              <input type="text" id="to" name="checkout" placeholder="Departure Date" class="form-control" required>
                                           </div>
                                       </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 adults md_pl5 md_nopadding_right">
                                <div class="form-group">
                                    <div class="form_select">
                                        <select name="guests" class="form-control md_noborder_right" title="Guests" data-header="Guests">
                                            <option value="1" >1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-black"><div id="days"></div></h4>
                            <input type="hidden" id="total" name="days" class="form-control">
                    </div>
                    <div class="col-md-2 md_pl5">
                        <button type="submit" class="button btn_yellow btn_full">SEARCH FOR ROOM</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ========== ROOMS ========== -->
<section class="white_bg" id="rooms">
   <div class="container">
       <div class="main_title mt_wave mt_yellow a_center">
           <h2>OUR POPULAR ROOMS</h2>
       </div> 
           <p class="main_description a_center text-black-50">Our apartments are contemporary-style designs, complete with a fully equipped kitchen, trendy art, and plush bed sheets. All of the apartments have ensuite bathrooms, QLED smart TVs, high speed internet and a dedicated 33KVA line with inverter for stable power supply. Our place is ideal for people who need a place to relax, spend time with friends and family while on a vacation and also work remotely.</p> 
       <div class="row">
            @foreach ($popular as $row)
           <div class="col-md-4">
               <article class="room">
                   <figure>
                       <div class="price">₦{{ number_format($row->room_price, 0, '.', ',') }} <span>/ night</span></div>
                       <a class="hover_effect h_blue h_link" href="/room/{{ $row->room_id }}/{{ $row->room_slug }}">
                           <img src="{{  asset('uploads/'.$row->room_picture) }}" class="img-responsive" alt="Image">
                       </a>
                       <figcaption>
                           <h4><a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}">{{ $row->apartment }} - {{Str::limit($row->room_title, 10, $end='...')}}</a></h4>
                           <span class="f_right"><a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}" class="button btn_sm btn_yellow">VIEW DETAILS</a></span>
                       </figcaption>
                   </figure>
               </article>
           </div>
           @endforeach
        
       </div>
       
   </div>
</section>

<!-- ========== FEATURES ========== -->
<section class="lightgrey_bg" id="features">
   <div class="container">
       <div class="main_title mt_wave mt_yellow a_center">
           <h2>OUR AWESOME SERVICES</h2>
       </div>
       <p class="main_description a_center"></p>
       
       <div class="row">
           <div class="col-md-7">
               <div data-slider-id="features" id="features_slider" class="owl-carousel">
                   <div><img src="{{ asset('frontend/images/generator.JPG') }}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{ asset('frontend/images/kitchen.JPG') }}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{ asset('frontend/images/car-park.png') }}" class="img-responsive" alt="Image"></div>
                   <div><img src="{{ asset('frontend/images/parlour.png') }}" class="img-responsive" alt="Image"></div>
               </div>
           </div>
           <div class="col-md-5">
               <div class="owl-thumbs" data-slider-id="features">
                   <div class="owl-thumb-item">
                       <span class="media-left"><img class="features-img" src="{{ asset('frontend/images/icons/wifi.png') }}"> </span>
                       <div class="media-body">
                           <h5>High Speed Internet</h5>
                           <p>High Speed Internet for your convinence</p>
                           <br>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><img class="features-img" src="{{ asset('frontend/images/icons/kitchen.png') }}"></span>
                       <div class="media-body">
                           <h5>Kitchen</h5>
                           <p>In Built Kitchen with Modern Facilities</p>
                           <br>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><img class="features-img" src="{{ asset('frontend/images/icons/parking.png') }}"></span>
                       <div class="media-body">
                           <h5>Secured Car Park</h5>
                           <p>Enough secured parking space within the facility</p>
                           <br>
                       </div>
                   </div>
                   <div class="owl-thumb-item">
                       <span class="media-left"><img class="features-img" src="{{ asset('frontend/images/icons/couch.png') }}"></span>
                       <div class="media-body">
                           <h5>Spacious Apartments</h5>
                           <p>Classy spacious apartments for Friends, family and Guests</p>
                           <br>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>

 <!-- =========== MAIN ========== -->
        <main id="rooms_list">
           <div class="container">
            @foreach ( $rooms as $room )
              <!-- ITEM -->
              <article class="room_list">
                 <div class="row row-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                       <figure>
                          <a href="/room/{{ $room->room_id }}/{{ $room->room_slug }}" class="hover_effect h_link h_blue">
                          <img src="{{  asset('uploads/'.$room->room_picture) }}" class="img-responsive" alt="Image">
                          </a>
                       </figure>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                       <div class="room_details row-flex">
                          <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                             <h3><a href="/room/{{ $room->room_id }}/{{ $room->room_slug }}">{{ $room->apartment }} - {{Str::limit($room->room_title, 30, $end='...')}}  </a></h3>
                             <p>{!! Str::words($room->room_description, 40) !!}.</p>

                             <?php 
                               $features= $room->room_features;
                               $features = explode(",",$features);
                            ?>
                         
                             <div class="room_services">

                                 <?php foreach ($features as $feature){ ?>
                                <img src="{{ asset('frontend/images/icons/') }}/<?= $feature ?>.png" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?= $feature ?>" > 
                                <?php } ?>

                             </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                             <div class="room_price_inner">
                                <span class="room_price_number">₦{{ number_format($room->room_price, 0, '.', ',') }} </span>
                                <small class="upper"> per night </small>
                                <a href="/room/{{ $room->room_id }}/{{ $room->room_slug }}" class="button  btn_yellow btn_full upper">Book Now</a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </article>
              @endforeach

            
             <div class="mt40 a_center">
           <a class="button btn_sm btn_yellow" href="/rooms">VIEW ROOMS LIST</a>
       </div>
               
           </div>
        </main>


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
