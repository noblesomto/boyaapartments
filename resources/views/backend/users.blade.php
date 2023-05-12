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
          <h5 class="card-title">All Users</h5>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $user as $row )
              <tr>
                <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->city  }} </td>
                <td>
                    @if( $row->acc_status == "0" )
                        <a href="/admin/user-status/{{ $row->user_id }}/1">Verify</a>
                    @else
                       <span class="text-success">Verified</span>
                    @endif  
                </td>
                
                <td><a href="/admin/delete-user/{{ $row->user_id }}" onclick="return confirm('Are you sure you want to delete?');" >Delete User</a></td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
          <div class="row">
            <div class="col-lg-8 offset-md-2">
                {!! $user->links() !!}
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