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
               <div class="col-md-8 col-sm-8">
                   <h1>Account Dashboard</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                
                       <li>Dashboard</li>
                   </ol>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="price">
                       <div class="inner">
                           Orders</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- ========== MAIN ========== -->
        <main id="contact_page" class="bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="row mt20 text-center ">
                            @if(session('status'))
                               <div class="alert alert-{{session('status')['type']}}">
                                   <h4 class="text-success">{{session('status')['text']}}</h4>
                               </div>
                           @endif
                        </div>

                        <div class="row ">
                            <div class="col-md-3 dashboard-side">
                                <div class="row text-left">
                                     <p><a class="btn btn-primary col-md-12 col-xs-12" href="/user/index"><i class="fa fa-tachometer"></i> Dashboard</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/orders"><i class="fa fa-shopping-cart"></i> Orders</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/profile"><i class="fa fa-user"></i> Account Details</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/logout"><i class="fa fa-sign-out"></i> Logout</a></p>
                                    </div>
                            </div>
                            <div class="col-md-9 dashboard-content">
                                <div class="dashboard-content-title">
                                    <h4>Orders</h4>
                                </div>
                                <div class="white-block">

                    <div class="row">
                      
                            <div class="table-responsive">
                                 <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Apartment</th>
                                            <th>Checkin</th>
                                            <th>CheckOut</th>
                                            <th>Days</th>
                                            <th>Amount</th>
                                            <th>Payment Status</th>
                                            <th>Cancel Reservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $orders as $row )
                                        <tr>
                                            <td>
                                                <a href="/book_apartment_3/{{ $row->room_id }}/{{ $row->order_id }}"><?= $row['order_id'] ?></a>
                                            </td>
                                            <td><a href="/book_apartment_3/{{ $row->room_id }}/{{ $row->order_id }}">{{ $row->room_title }}</a></td>
                                            <td>{{ date('j F Y', strtotime($row->checkin)); }}</td>
                                            <td>{{ date('j F Y', strtotime($row->checkout)); }}</td>
                                            <td><?= $row['days'] ?></td>
                                            <td>
                                                <?php $number = $row['amount']   ?>
                                                ₦<?php echo $english_format_number = number_format($number); ?>
                                            </td>
                                            <td>
                                                @if($row->payment == "Pending")
                                                
                                    <form method="POST" action="{{ route('makepayment') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                    @csrf
                                        <?php $order_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8); ?>
                                        <input type="hidden" name="reference" value="{{ $order_id }}">
                                        <input type="hidden" name="email" value="{{ $user->email }}">      
                                        <input type="hidden" name="orderID" value="{{ $order_id }}">
                                        <input type="hidden" name="id" value="{{ $order_id }}">
                                        <input type="hidden" name="amount" value="{{ $row->amount * 100}}">
                                        <input type="hidden" name="plan" value="{{ $row->order_id }}" >
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="room_id" value="{{ $row->room_id }}" >

                                        {{ csrf_field() }} 
                                                        <input type="submit" name="submit" value="Make Payment" class="btn btn-danger">
                                                    </form>
                                                @else
                                                    <i class="fa fa-check" aria-hidden="true"></i> Paid
                                                @endif
                                            </td>
                                            <td>
                                                <?php if($row['status']=='0'){ ?>
                                                    Pending...
                                                <?php }elseif($row['status']=='2'){?>
                                                    Canceled..
                                                <?php }else{ ?>
                                                    <a class="btn btn-success" href="/account/cancel/<?= $row['order_id'] ?>">Cancel</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>

                </div>
                            </div>
                        </div>
                    </div>
                    
      
                </div>
            </div>
        </main>
    


@include('frontend.layouts.footer')
