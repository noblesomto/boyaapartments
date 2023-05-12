@include('backend.layouts.header')
@include('backend.layouts.nav')

<script src="{{ asset ('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Apartment</h1>
  
    </div><!-- End Page Title -->
    
    <section class="section">
    <div class="row">
    <div class="col-lg-12">
    
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">New Apartment</h5>
            @if(session('status'))
                <div class="alert alert-{{session('status')['type']}}">
                    {{session('status')['text']}}
                </div>
            @endif
            <!-- General Form Elements -->
            <form action="/admin/new-apartment" method="POST" role="form" class="" enctype="multipart/form-data">
             @csrf 
    
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Name</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_title'))
                        <span class="text-danger">{{ $errors->first('room_title') }}</span>
                    @endif
                <input type="text" name="room_title" class="form-control" placeholder="Apartment Name" value="{{ old('room_title') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Label</label>
                <div class="col-sm-10">
                    @if ($errors->has('apartment'))
                        <span class="text-danger">{{ $errors->first('apartment') }}</span>
                    @endif
                <input type="text" name="apartment" class="form-control" placeholder="Apartment Label" value="{{ old('apartment') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Apartment Price</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_price'))
                        <span class="text-danger">{{ $errors->first('room_price') }}</span>
                    @endif
                <input name="room_price" maxlength="11" pattern="[0-9]*" class="form-control" placeholder="eg 35000" type="text" value="{{ old('room_price') }}" required>
                </div>
            </div>

    
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Room Description</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_description'))
                        <span class="text-danger">{{ $errors->first('room_description') }}</span>
                    @endif
                <textarea class="form-control" name="room_description" id="tiny" style="height: 100px" required>{{ old('room_description') }}</textarea>
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
                      <option value="Gwarinpa" selected>Gwarinpa</option>
                      <option value="Mabushi">Mabushi</option>
                      
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
                    <option value="Penthouse Studio">Penthouse Studio</option>
                    <option value="1 Bedroom">1 Bedroom</option>
                    <option value="2 Bedrooms">2 Bedrooms</option>
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
                    <option value="">Select Number of Bedrooms</option>
                      <option value="1">1 Bed</option>
                      <option value="2">2 Beds</option>
                      <option value="3">3 Beds</option>
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
                      <option value="1">1 Bath</option>
                      <option value="2">2 Baths</option>
                      <option value="3">3 Baths</option>
                      <option value="4">4 Baths</option>
                      <option value="5">5 Baths</option>
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
                      <option value="1">1 Guest</option>
                      <option value="2">2 Guests</option>
                      <option value="3">3 Guests</option>
                      <option value="4">4 Guests</option>
                      <option value="5">5 Guests</option>
                </select>
                </div>
            </div>
            

            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Amenities</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_feature[]'))
                        <span class="text-danger">{{ $errors->first('room_feature[]') }}</span>
                    @endif
               <select name="room_feature[]" class="js-example-basic-multiple form-control custom-select" multiple="multiple" style="height: 36px;width: 100%; color: blue;">
                  <?php if( !empty($amenity) ) {
                  foreach($amenity as $row) { ?>
                      <option value="<?= $row['features'] ?>"><?= $row['features'] ?></option>
                
                <?php }} ?>
              </select>
                </div>
            </div>
         
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Featured Picture</label>
                <div class="col-sm-10">
                    @if ($errors->has('room_picture'))
                        <span class="text-danger">{{ $errors->first('room_picture') }}</span>
                    @endif
                <input class="form-control" type="file" name="room_picture" accept="image/*" onchange="preview_image(event)" required >
                <img id="output_image"/>
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Add more Photos for Rooms<br> <small>Multiple Pictures allowed</small></label>
                <div class="col-sm-10">
                    @if ($errors->has('images[]'))
                        <span class="text-danger">{{ $errors->first('images[]') }}</span>
                    @endif
                <input class="form-control" type="file" name="images[]" required id="files" accept=".png,.jpg,.jpeg,.gif" multiple>

                <div id="preview"></div>
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
                <input type="text" name="keyword" class="form-control" placeholder="Meta Keywords" value="{{ old('keyword') }}" >
                </div>
            </div>


            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Meta Description <small>Advert Description for Search Engine</small></label>
                <div class="col-sm-10">
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                 <textarea name="meta_description" rows="3" class="form-control" placeholder="">{{ old('meta_description') }}</textarea>
                </div>
            </div>
    
            
    
    
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Publish</button>
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