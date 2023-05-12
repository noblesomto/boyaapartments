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
                   <h1>Account Dashboard</h1>
                   <ol class="breadcrumb">
                       <li><a href="/">Home</a></li>
                
                       <li>Dashboard</li>
                   </ol>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="price">
                       <div class="inner">
                           Profile</span>
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
                    <div class="col-md-12 bg-white">
                        <div class="row mt20 text-center ">
                            @if(session('status'))
                               <div class="alert alert-{{session('status')['type']}}">
                                   <h4 class="text-success">{{session('status')['text']}}</h4>
                               </div>
                           @endif
                        </div>

                        <div class="row ">
                            <div class="col-md-3 dashboard-side">
                                <div class="row text-left">
                                     <p><a class="btn btn-primary col-md-12 col-xs-12" href="/user/index"><i class="fa fa-tachometer"></i> Dashboard</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/orders"><i class="fa fa-shopping-cart"></i> Orders</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/profile"><i class="fa fa-user"></i> Account Details</a></p>

                                     <p><a class="btn btn-primary col-md-12 col-xs-12 mt-1" href="/user/logout"><i class="fa fa-sign-out"></i> Logout</a></p>
                                    </div>
                            </div>
                            <div class="col-md-9 dashboard-content">
                                <div class="dashboard-content-title">
                                    <h4>Account Settings</h4>
                                </div>
                                <form class="contact-form-page" action="/user/profile" method="POST">
                                  @csrf
                                   <div class="row">
                                       <div class="form-group col-md-6 col-sm-6">
                                           <label class="control-label">First Name</label>
                                           <input type="text" class="form-control" name="first_name" placeholder="Your Name" value="{{ $user->first_name }}" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6">
                                           <label class="control-label">Last Name</label>
                                           <input type="text" class="form-control" name="last_name" placeholder="Your Name" value="{{ $user->last_name }}" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6">
                                           <label class="control-label">Email</label>
                                           <input type="email" class="form-control" name="email" placeholder="Your Email" readonly value="{{ $user->email }}">
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6">
                                           <label class="control-label">Phone</label>
                                           <input type="text" class="form-control" name="phone" placeholder="Phone" required value="{{ $user->phone }}">
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12">
                                           <label class="control-label">City</label>
                                           <input type="text" class="form-control" name="city" placeholder="City" required value="{{ $user->city }}">
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12">
                                           <label class="control-label">Address</label>
                                           <input type="text" class="form-control" name="address" placeholder="Address" required value="{{ $user->address }}">
                                       </div>

                                       <div class="form-group col-md-12">
                                           <button type="submit" class="button  btn_blue mt40 upper pull-right">
                                               <i class="fa fa-paper-plane-o" aria-hidden="true"></i> UPDATE
                                           </button>
                                       </div>
                                   </div>
                               </form>
                            </div>
                        </div>
                    </div>
                    
      
                </div>
            </div>
        </main>
    


@include('frontend.layouts.footer')
