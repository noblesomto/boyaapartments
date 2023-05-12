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
                           Dashboard</span>
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
                                    <h4>Dashboard</h4>
                                </div>
                                <p>
                                    Hello, {{ $user->first_name }} {{ $user->last_name }} (If Not {{ $user->first_name }}! <a href="/user/logout">Logout</a>) From your account dashboard. you can easily check & view your recent orders, manage your Apartments and edit your account details. 
                                </p>
                            </div>
                        </div>
                    </div>
                    
      
                </div>
            </div>
        </main>
    


@include('frontend.layouts.footer')
