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
          <h5 class="card-title">All Adverts</h5>
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
                <th scope="col">Ad Title</th>
                <th scope="col">Ad Price</th>
                <th scope="col">Category</th>
                <th scope="col">Owner</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $advert as $row )
              <tr>
                <td>{{ $row->ad_title }}</td>
                <td>€{{ number_format($row->ad_price, 2, '.', ',') }}</td>
                <td>{{ $row->ad_category  }} </td>
                <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                
                
                <td><a href="/admin/delete-ad/{{ $row->ad_id }}" onclick="return confirm('Are you sure you want to delete?');" >Delete Ad</a></td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
          <div class="row">
            <div class="col-lg-8 offset-md-2">
                {!! $advert->links() !!}
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