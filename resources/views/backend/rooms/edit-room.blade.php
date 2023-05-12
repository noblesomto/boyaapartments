@include('backend.layouts.header')
@include('backend.layouts.nav')

<script src="{{ asset ('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
function deleteimage(image_id)
{

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

var answer = confirm ("Are you sure you want to delete Image?");
if (answer)
{
       $.ajax({
            type: "POST",
            url: "{{ url('/admin/deleteimage') }}",
            data: "image_id="+image_id, 
            success: function (response) {
              if (response == 1) {
                $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                
              };
              location.reload();
            }
        });
  }
}


</script>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Apartment</h1>
  
    </div><!-- End Page Title -->
    
    <section class="section">
    <div class="row">
    <div class="col-lg-12">
    
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Apartment</h5>
            @if(session('status'))
                <div class="alert alert-{{session('status')['type']}}">
                    {{session('status')['text']}}
                </div>
            @endif
            <!-- General Form Elements -->
            <form action="/admin/edit-apartment/{{ $room->room_id }}" method="POST" role="form" class="" enctype="multipart/form-data">
             @csrf 
             @method('PUT')
    
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Name</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_title'))
                        <span class="text-danger">{{ $errors->first('room_title') }}</span>
                    @endif
                <input type="text" name="room_title" class="form-control" placeholder="Apartment Name" value="{{ $room->room_title }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Label</label>
                <div class="col-sm-10">
                    @if ($errors->has('apartment'))
                        <span class="text-danger">{{ $errors->first('apartment') }}</span>
                    @endif
                <input type="text" name="apartment" class="form-control" placeholder="Apartment Label" value="{{ $room->apartment }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Price</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_price'))
                        <span class="text-danger">{{ $errors->first('room_price') }}</span>
                    @endif
                <input name="room_price" maxlength="11" pattern="[0-9]*" class="form-control" placeholder="eg 35000" type="text" value="{{ $room->room_price }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">7 days Discount Price</label>
                <div class="col-sm-9">
                    @if ($errors->has('discount_7'))
                        <span class="text-danger">{{ $errors->first('discount_7') }}</span>
                    @endif
                <input name="discount_7" maxlength="11" pattern="[0-9]*" class="form-control" placeholder="eg 5000" type="text" value="{{ $room->discount_7 }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">30 days Discount Price</label>
                <div class="col-sm-9">
                    @if ($errors->has('discount_30'))
                        <span class="text-danger">{{ $errors->first('discount_30') }}</span>
                    @endif
                <input name="discount_30" maxlength="11" pattern="[0-9]*" class="form-control" placeholder="eg 5000" type="text" value="{{ $room->discount_30 }}" >
                </div>
            </div>

    
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Room Description</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_description'))
                        <span class="text-danger">{{ $errors->first('room_description') }}</span>
                    @endif
                <textarea class="form-control" name="room_description" id="tiny" style="height: 100px" required>{{ $room->room_description }}</textarea>
                </div>
            </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'tiny' );
            </script>


            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Apartment Location</label>
                <div class="col-sm-10">
                    @if ($errors->has('location'))
                        <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                <select name="location" class="form-select" aria-label="Default select example" required>
                    <option value="">Select Location</option>
                      <option value="Gwarinpa" {{ ($room->location =='Gwarinpa') ? "selected" : ""; }}>Gwarinpa</option>
                      <option value="Mabushi" {{ ($room->location =='Mabushi') ? "selected" : ""; }}>Mabushi</option>
                      
                </select>
                </div>
            </div>
    
           
           <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Type of Bedroom</label>
                <div class="col-sm-10">
                    @if ($errors->has('bedrooms'))
                        <span class="text-danger">{{ $errors->first('bedrooms') }}</span>
                    @endif
                <select name="bedrooms" class="form-select" aria-label="Default select example" required>
                    <option value="">Select Bedroom</option>
                    <option value="Penthouse Studio" {{ ($room->bedrooms =='Penthouse Studio') ? "selected" : ""; }}>Penthouse Studio</option>
                    <option value="1 Bedroom" {{ ($room->bedrooms =='1 Bedroom') ? "selected" : ""; }}>1 Bedroom</option>
                    <option value="2 Bedrooms" {{ ($room->bedrooms =='2 Bedrooms') ? "selected" : ""; }}>2 Bedrooms</option>
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Number Of Beds</label>
                <div class="col-sm-10">
                    @if ($errors->has('beds'))
                        <span class="text-danger">{{ $errors->first('beds') }}</span>
                    @endif
                <select name="beds" class="form-select" aria-label="Default select example" required>
                    <option value="">Select Number of Bed</option>
                      <option value="1" {{ ($room->beds =='1') ? "selected" : ""; }}>1 Bed</option>
                      <option value="2" {{ ($room->beds =='2') ? "selected" : ""; }}>2 Beds</option>
                      <option value="3" {{ ($room->beds =='3') ? "selected" : ""; }}>3 Beds</option>
                </select>
                </div>
            </div>




            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Number Of Baths</label>
                <div class="col-sm-10">
                    @if ($errors->has('baths'))
                        <span class="text-danger">{{ $errors->first('baths') }}</span>
                    @endif
                <select name="baths" class="form-select" aria-label="Default select example" required>
                      <option value="">Select Number of Baths</option>
                      <option value="1" {{ ($room->baths =='1') ? "selected" : ""; }}>1 Bath</option>
                      <option value="2" {{ ($room->baths =='2') ? "selected" : ""; }}>2 Baths</option>
                      <option value="3" {{ ($room->baths =='3') ? "selected" : ""; }}>3 Baths</option>
                      <option value="4" {{ ($room->baths =='4') ? "selected" : ""; }}>4 Baths</option>
                      
                </select>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Number Of Guest</label>
                <div class="col-sm-10">
                    @if ($errors->has('guests'))
                        <span class="text-danger">{{ $errors->first('guests') }}</span>
                    @endif
                <select name="guests" class="form-select" aria-label="Default select example" required>
                      <option value="">Select Number of Guests</option>
                      <option value="1" {{ ($room->guest =='1') ? "selected" : ""; }}>1 Guest</option>
                      <option value="2" {{ ($room->guest =='2') ? "selected" : ""; }}>2 Guests</option>
                      <option value="3" {{ ($room->guest =='3') ? "selected" : ""; }}>3 Guests</option>
                      <option value="4" {{ ($room->guest =='4') ? "selected" : ""; }}>4 Guests</option>
                      <option value="5" {{ ($room->guest =='5') ? "selected" : ""; }}>5 Guests</option>
                </select>
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Amenities</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_feature[]'))
                        <span class="text-danger">{{ $errors->first('room_feature[]') }}</span>
                    @endif
                    @php 
                       $features=  $room->room_features;
                       $features = explode(",",$features);
                    @endphp
               <select name="room_feature[]" class="js-example-basic-multiple form-control custom-select" multiple="multiple" style="height: 36px;width: 100%; color: blue;">
                  @php 
                    if( !empty($amenity) ) {
                    foreach($amenity as $row) { 
                    @endphp
                      
                      <option
                         value="{{ $row->features }}"
                         @php foreach ($features as $feature ){ @endphp {{   ($row->features ==$feature ) ? "selected" : ""; }}   @php } @endphp >
                         {{ $row->features }} 
                        </option>
                
                
                
                @php }} @endphp
              </select>
                </div>
            </div>
         
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Featured Picture</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_picture'))
                        <span class="text-danger">{{ $errors->first('room_picture') }}</span>
                    @endif
                    <img width="150px" src="{{ asset('uploads/'.$room->room_picture) }}">
                <input class="form-control" type="file" name="room_picture" accept="image/*" onchange="preview_image(event)">
                <img id="output_image"/>
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Add more Photos for Rooms<br> <small>Multiple Pictures allowed</small></label>
                <div class="col-sm-10">
                    @if ($errors->has('images[]'))
                        <span class="text-danger">{{ $errors->first('images[]') }}</span>
                    @endif

                <input class="form-control" type="file" name="images[]" id="files" accept=".png,.jpg,.jpeg,.gif" multiple>

                <div class="row">
                    @foreach ( $image as $pix )
                      <div class="col-sm-3 other-pix imagelocation{{ $pix->id }} ">
                        <div class="action">
                        <span style="cursor:pointer;" onclick="javascript:deleteimage({{ $pix->id }})">X</span>
                        </div>
                        <img width="100%" src="{{ asset('uploads/images/'.$pix->image) }}" class="img-responsive" />
                        </div>
                      @endforeach 
                </div>
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Featured Room</label>
                <div class="col-sm-10">
                    
                <select name="featured" class="form-select" aria-label="Default select example" required>
                   
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Keywords <small>meta Keywords for SEO</small></label>
                <div class="col-sm-10">
                    @if ($errors->has('keyword'))
                        <span class="text-danger">{{ $errors->first('keyword') }}</span>
                    @endif
                <input type="text" name="keyword" class="form-control" placeholder="Meta Keywords" value="{{ $room->keyword }}" >
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Description <small>Advert Description for Search Engine</small></label>
                <div class="col-sm-10">
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                 <textarea name="meta_description" rows="3" class="form-control" placeholder="">{{ $room->meta_description }}</textarea>
                </div>
            </div>
    
            
    
    
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit Apartment</button>
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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

<script type="text/javascript">
  
 $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>


    @include('backend.layouts.footer')