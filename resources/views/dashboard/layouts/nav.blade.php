<div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
             <!-- Sidebar Widgets -->
             <div class="user-profile">
               @if($user->profile_picture=="")
                <a href="/user/index"><img src="{{ asset('frontend/images/users/user.png') }}" width="50%" alt=""></a>
               @else
                  <a href="/user/index"><img src="{{ asset('/uploads/profile/'.$user->profile_picture) }}" width="50%" alt=""></a>
               @endif 
                <div class="profile-detail">
                   <h6>{{ $user->first_name }} {{ $user->last_name }}</h6>
                   <ul class="contact-details">
                      <li>
                         <i class="fa fa-map-marker"></i> {{ $user->city }}, {{ $user->country }}
                      </li>
                      <li>
                         <i class="fa fa-envelope"></i>{{ $user->email }}
                      </li>
                      <li>
                         <i class="fa fa-phone"></i> {{ $user->phone }}
                      </li>
                   </ul>
                </div>
                <ul>
                   <li  class="active"><a href="/user/index">Profile</a></li>
                   <li ><a href="/user/active-ads">My Ads <span class="badge">{{ $my_ads }}</span></a></li>
                   <li><a href="">Favourites Ads <span class="badge">0</span></a></li>
                   <li><a href="/user/logout">Logout</a></li>
                </ul>
             </div>
             <!-- Categories --> 

          </div>