@include('frontend.layouts.header')
@include('frontend.layouts.nav-2')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- =========== PAGE TITLE ========== -->
<div class="page_title gradient_overlay" style="background: url({{ asset('frontend/images/page-title.png') }});">
   <div class="container">
       <div class="inner">
           <div class="row">
               <div class="col-md-7 col-sm-7">
                   <h1>{{ $page_title }}</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                       <li>Rooms</li>
                       <li>{{ $page_title }}</li>
                   </ol>
               </div>
               <div class="col-md-5 col-sm-5">
            
               </div>
           </div>
       </div>
   </div>
</div>

<main id="rooms_list">
   <div class="container">
    @foreach ( $room as $row )
      <!-- ITEM -->
      <article class="room_list">
         <div class="row row-flex">
            <div class="col-lg-4 col-md-5 col-sm-12">
               <figure>
                  <a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}" class="hover_effect h_link h_blue">
                  <img src="{{  asset('uploads/'.$row->room_picture) }}" class="img-responsive" alt="Image">
                  </a>
               </figure>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12">
               <div class="room_details row-flex">
                  <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                     <h3><a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}">{{ $row->apartment }} - {{Str::limit($row->room_title, 35, $end='...')}} </a></h3>
                     <p>{!! Str::words($row->room_description, 40) !!}.</p>

                     <?php 
                       $features= $row->room_features;
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
                        <span class="room_price_number">₦{{ number_format($row->room_price, 0, '.', ',') }} </span>
                        <small class="upper"> per night </small>
                        <a href="/room/{{ $row->room_id }}/{{ $row->room_slug }}" class="button  btn_yellow btn_full upper">Book Now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </article>
      @endforeach

    
     <nav class="a_center">
        <ul class="pagination mt50 mb0">
            {!! $room->links() !!}
        </ul>
  </nav>
       
   </div>
</main>

@include('frontend.layouts.footer')
