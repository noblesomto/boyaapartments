@include('backend.layouts.header')
@include('backend.layouts.nav')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>

</div><!-- End Page Title -->

<section class="section">
  <div class="row">


    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Order No: {{ $order->order_id }}</h5>
          @if(session('status'))
                <div class="alert alert-{{session('status')['type']}}">
                    {{session('status')['text']}}
                </div>
            @endif

          <!-- Table with stripped rows -->
          <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Room</th>
                <th>Apartment</th>
                <th>Checkin</th>
                <th>CheckOut</th>
                <th>Days</th>
                <th>Amount</th>
                <th>Payment Status</th>
                
              </tr>
            </thead>
            <tbody>
           
              <tr>
                <td>
                    {{ $order->apartment }}
                </td>
                <td>{{ $order->room_title }}</td>
                <td>{{ date('j F Y', strtotime($order->checkin)); }}</td>
                <td>{{ date('j F Y', strtotime($order->checkout)); }}</td>
                <td>{{ $order->days }}</td>
                <td>
                    <?php $number = $order->amount   ?>
                    ₦<?php echo $english_format_number = number_format($number); ?>
                </td>
                <td> {{ $order->payment }} </td>
                
          
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
<hr>
        <div>
          <table class="table table-bordered">
  <tr>
    <th></th>
    <th>Order Details</th>
  </tr>

  <tr>
    <td>Name</td>
    <td><?php echo $user['first_name'] .' '. $user['last_name'] ?> </td>
  </tr>

  <tr>
    <td>Phone</td>
    <td><?php echo $user['phone']; ?> </td>
  </tr>

   <tr>
    <td>Email</td>
    <td><?php echo $user['email']; ?> </td>
  </tr>

   <tr>
    <td>Address</td>
    <td><?php echo $user['address']; ?> </td>
  </tr>

   <tr>
    <td>City</td>
    <td><?php echo $user['city']; ?> </td>
  </tr>
<?php if($order->book_status == 1){ ?>
  <tr>
    <td>Order Status</td>
    <td><a href="/admin/order-status/{{ $order->order_id }}/0" onclick="return confirm('Are you sure you want to Cancel Order?');" class="btn btn-primary">Canclel Order</a></td>
  </tr>
  
  <?php }else{ ?>

    <tr>
    <td>Order Status</td>
    <td><a href="/admin/order-status/{{ $order->order_id }}/1" onclick="return confirm('Are you sure you want to Approve Order?');" class="btn btn-primary">Approve Order</a></td>
  </tr>
 <?php  }?>
  <tr>
    <td>Delete Order</td>
    <td><a href="/admin/delete-order/{{ $order->order_id }}" onclick="return confirm('Are you sure you want to Delete Order?');" class="btn btn-danger">Delete Order</a></td>
  </tr>

</table>
        </div>

        </div>
      </div>

      



    </div>
  </div>
</section>

</main><!-- End #main -->
<script>
function myFunction() {
  confirm("Are you sure you want to delete?");
}
</script>
@include('backend.layouts.footer')