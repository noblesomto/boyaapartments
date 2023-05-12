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
          <h5 class="card-title">Amenities</h5>
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
                <th scope="col">Feature</th>
                <th scope="col">Icon</th>
 
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $amenities as $row )
              <tr>
                <td>{{ $row->features }}</td>
                <td>{{ $row->icon  }} </td>

                <td><a href="/admin/delete-amenity/{{ $row->id }}" onclick="return confirm('Are you sure you want to delete?');" >Delete </a></td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
          <!-- End Table with stripped rows -->
          <div class="row">
            <div class="col-lg-8 offset-md-2">
                
            </div>
          </div>

        </div>
      </div>

      



    </div>
  </div>
</section>

<section class="section">
    <div class="row">
    <div class="col-lg-12">
    
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">New Amenity</h5>
       
            <!-- General Form Elements -->
            <form action="/admin/amenities" method="POST" role="form" class="" enctype="multipart/form-data">
             @csrf 
    
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Feature Name</label>
                <div class="col-sm-10">
                    @if ($errors->has('features'))
                        <span class="text-danger">{{ $errors->first('features') }}</span>
                    @endif
                <input type="text" name="features" class="form-control" placeholder="Feature Name" value="{{ old('features') }}" required>
                </div>
            </div>



            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Feature Icon</label>
                <div class="col-sm-10">
                    @if ($errors->has('icon'))
                        <span class="text-danger">{{ $errors->first('icon') }}</span>
                    @endif
                <input type="text" name="icon" class="form-control" placeholder="Feature Icon" value="{{ old('icon') }}">
                </div>
            </div>


           
    
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    
            </form><!-- End General Form Elements -->
    
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