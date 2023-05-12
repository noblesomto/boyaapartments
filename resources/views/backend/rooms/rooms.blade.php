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
          <h5 class="card-title">All Apartments</h5>
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
                <th scope="col">Room</th>
                <th scope="col">Room Name</th>
                <th scope="col">Apartment</th>
                <th scope="col">Room Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ( $rooms as $row )
              <tr>
                <td> <img width="60px" src="{{  asset('uploads/'.$row->room_picture) }}" class="img-responsive" alt="Image"></td>
                <td>{{ $row->room_title }}</td>
                <td>{{ $row->apartment }}</td>
                <td>₦{{ number_format($row->room_price, 0, '.', ',') }} </td>
                <td><a href="/admin/edit-apartment/{{ $row->room_id }}">Edit</a></td>
                <td><a href="/admin/delete-user/{{ $row->room_id }}" onclick="return confirm('Are you sure you want to delete Apartment?');" >Delete</a></td>
                <td>
                    @if( $row->room_status == 1 )
                        <a href="/admin/room-status/{{ $row->room_id }}/0">Disable Room</a>
                    @else
                        <a href="/admin/room-status/{{ $row->room_id }}/1">Activate Room</a>
                    @endif  
                </td>
                
                
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
          <div class="row">
            <div class="col-lg-8 offset-md-2">
                {!! $rooms->links() !!}
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