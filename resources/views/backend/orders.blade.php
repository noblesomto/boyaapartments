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
          <h5 class="card-title">All Orders</h5>
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
                <th>Order ID</th>
                <th>Apartment</th>
                <th>Checkin</th>
                <th>CheckOut</th>
                <th>Days</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $orders as $row )
              <tr>
                <td>
                    <a href="/admin/order-details/{{ $row->order_id }}"><?= $row['order_id'] ?></a>
                </td>
                <td><a href="/admin/order-details/{{ $row->order_id }}">{{ $row->apartment }}</a></td>
                <td>{{ date('j F Y', strtotime($row->checkin)); }}</td>
                <td>{{ date('j F Y', strtotime($row->checkout)); }}</td>
                <td><?= $row['days'] ?></td>
                <td>
                    <?php $number = $row['amount']   ?>
                    ₦<?php echo $english_format_number = number_format($number); ?>
                </td>
                <td><?= $row['payment'] ?></td>
                <td><a href="/admin/order-details/{{ $row->order_id }}" class="btn btn-warning" >Order Details</a></td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
          <div class="row">
            <div class="col-lg-8 offset-md-2">
                {!! $orders->links() !!}
            </div>
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