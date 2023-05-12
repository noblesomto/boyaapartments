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
                   <h1>Account Section</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                
                       <li>Register</li>
                   </ol>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="price">
                       <div class="inner">
                           Register</span>
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
                    
                    <div class="col-md-8 col-md-offset-2 bg-white">
                        <div class="main_title text-center pt10">
                            <h2 class="text-black">Create An Account</h2>
                        </div>
                        <div class="row mt20 text-center ">
                            @if(session('status'))
                               <div class="alert alert-{{session('status')['type']}}">
                                   <h4 class="text-success">{{session('status')['text']}}</h4>
                               </div>
                           @endif
                        </div>
                        <form class="contact-form-page" action="/register" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">First Name:</strong></label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">Last Name:</strong></label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">Email:</strong></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">Phone:</strong></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" required value="{{ old('phone') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">City:</strong></label>
                                    <input type="text" class="form-control" name="city" placeholder="City"  value="{{ old('city') }}">
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                    <label class="control-label"><strong class="text-black">Address:</strong></label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" required value="{{ old('address') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <label class="control-label"> <strong class="text-black">Password:</strong> </label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                    <label class="control-label"> <strong class="text-black">Confirm Password:</strong> </label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 pt20">
                                    <hr />
                                    
                                        <input type="checkbox" id="checkBoxId1" required>
                                        <label for="checkBoxId1">I have read, understood and accepted our <a href="/terms">terms & Conditions </a></label>
                                    
                                </div>

                                <div class="form-group col-md-5 col-sm-5 pt20">
                                    Already have an Account ? <a href="/login">Login</a>
                                </div>
                                
                                <div class="form-group col-md-7">
                                    <button type="submit" class="button btn_lg  btn_blue mt10 upper pull-right col-md-12">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
      
                </div>
            </div>
        </main>
    


@include('frontend.layouts.footer')
