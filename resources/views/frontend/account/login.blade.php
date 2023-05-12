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
                   <h1>Account</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                
                       <li>Login</li>
                   </ol>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="price">
                       <div class="inner">
                           Login</span>
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
                            <h2 class="text-black">Login</h2>
                        </div>

                        <div class="row mt20 text-center ">
                            @if(session('status'))
                               <div class="alert alert-{{session('status')['type']}}">
                                   <h4 class="text-success">{{session('status')['text']}}</h4>
                               </div>
                           @endif
                        </div>

                        <form class="contact-form-page" action="/login" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label class="control-label"><strong class="text-black">Email:</strong></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label class="control-label"> <strong class="text-black">Password:</strong> </label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="form-group col-md-5 col-sm-5 pt20">
                                    <a href="/register">Register</a> | <a href="/forgot-password">Forgot Password</a>
                                </div>
                                
                                <div class="form-group col-md-7">
                                    <button type="submit" class="button btn_lg  btn_blue mt10 upper pull-right">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
      
                </div>
            </div>
        </main>
    


@include('frontend.layouts.footer')
