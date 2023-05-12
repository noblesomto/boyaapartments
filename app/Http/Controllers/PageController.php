<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomImage;
use Illuminate\Support\Str;
use Mail;
use App\Mail\NotifyMail;
use App\Mail\ContactMail;
use App\Mail\RegisterMail;
use Hash;
use Session;

class PageController extends Controller
{
    public function index()
    {   
        $title =  config('global.site_name') ." | " .config('global.site_title');
        $popular = Room::inRandomOrder()->where('featured', 'Yes')->limit(3)->get();
        $rooms = Room::inRandomOrder()->where('room_status', 1)->limit(6)->get();
        return view('frontend.index', compact('title','popular','rooms'));
    }


    public function about()
    {   
        $title = "About Us | " . config('global.site_name');
        return view('frontend.about', compact('title'));
    }

    public function how_it_works()
    {   
        $title = "How It Works | " . config('global.site_name');
        return view('frontend.how-it-works', compact('title'));
    }

    public function register(Request $request, $id = null)
    {   
        $title = "User Registration | " . config('global.site_name');

        if ($request->isMethod('GET')) {
            return view('frontend.account.register', compact('title'));
        }

         if ($request->isMethod('POST')) {

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
            
            $user_id = rand(11111,99999);
            $email = $request->input('email');
            $name = $request->input('first_name');
            $token  = Str::random(40);
            $details = [
                'user_id' => $user_id,
                'token' => $token,
                'name' => $name,
            ];
            

            try {
                Mail::to($email)->send(new RegisterMail($details));
                $user = User::create([
                'first_name'=> $request->input('first_name'),
                'last_name'=> $request->input('last_name'),
                'email'=> $request->input('email'),
                'phone'=> $request->input('phone'),
                'city'=> $request->input('city'),
                'address'=> $request->input('address'),
                'user_id'=> $user_id,
                'token'=> $token,
                'acc_status'=> 0,
                'password'=> Hash::make($request->input('password')),
            ]);

            return redirect("login")->with('status', ['text'=>'Great, you have successfully registered, Please verify your email','type'=>'success']);

            } catch (Throwable $e) {
                
                 return redirect("register")->with('status', ['text'=>'Error!, Your account could not be created, please contact admin','type'=>'danger']);
            }    

        }
    }


    public function verifyaccount($user_id, $token)
    {       
        $user = User::where('user_id', $user_id)->first();
        $token2 = $user->token;
        if($token == $token2){
            $post = DB::table('users')
            ->where('user_id', $user_id)
            ->update([
                'acc_status'=> 1,
            ]);
            return redirect("login")->with('status',['text'=>'Your Email has been Verified, Please login','type'=>'success']);
        }else{

            return redirect("login")->with('status',['text'=>'Error!, the token does not match','type'=>'danger']);
        }
 
       
        
    }

    public function login(Request $request)
    {
        $title = "Login | " . config('global.site_name');
        

        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:4',
            ]);
            
            $email = $request->email;
            $password = $request->password;

            $login = User::where('email', $email)
                        ->where('acc_status', 1)
                        ->first();
            if ($login) {
                if (Hash::check($password, $login->password)) {
                    $user_id = $login->user_id;
                    $name = $login->first_name;
                    $request->session()->put('user_id', $user_id);
                    $request->session()->put('name', $name);
                    $request->session()->put('email', $email);

                    if ($request->session()->has('previous_url')) {
                        $previous_url = $request->session()->get('previous_url');
                        return redirect($previous_url);
                    }else{   
                
                        return redirect()->action([UserController::class, 'index']);
                    }
                   
                }else{
                    return redirect("login")->with('status',['text'=>'Sorry, The password does not Match','type'=>'danger']);
                }
                
            }
      
            return redirect("login")->with('status',['text'=>'Opps! You have entered invalid credentials or account not Verified ','type'=>'danger']);
        }

        if ($request->isMethod('GET')) {
            return view('frontend.account.login', compact('title'));
        }
    }


    public function contact(Request $request)
    {   
        $title = "Contact Us | " . config('global.site_name');

        if ($request->isMethod('GET')) {
            return view('frontend.contact', compact('title'));
        }

         if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);


            $details = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'subject' =>  $request->input('subject'),
                'message' => $request->input('message'),
            ];

            $admin_email = config('global.admin_email');
            try {
                Mail::to($admin_email)->send(new ContactMail($details));
                return redirect("contact")->with('status', ['text'=>'Great! Your message was successfully sent, We will get back to you ASAP ','type'=>'success']);
            } catch (Throwable $e) {
                
                return redirect("contact")->with('status', ['text'=>'Error!, Email could not be sent now ','type'=>'danger']);
            }
                  

        }
    }


    public function adminlogin(Request $request)
    {
        $title = "Admin Login | " . config('global.site_name');

        if ($request->isMethod('POST')) {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:4',
            ]);
            
            $username = $request->username;
            $password = $request->password;

            $login = Admin::where('username', $username)
               ->where('password', md5($password))
               ->first();
            if ($login) {
                $admin_id = $login->admin_id;
                $request->session()->put('admin_id', $admin_id);

               return redirect()->action([AdminController::class, 'index']);
            }
      
            return redirect("adminlogin")->with('status',['text'=>'Error!, You are trying to use wrong credentials to login ','type'=>'danger']);
        }

        if ($request->isMethod('GET')) {
            return view('frontend.admin', compact('title'));
        }
    }

    public function booking($order_id)
    {   
        $title = "Booking Details | " . config('global.site_name');
        $order = Booking::where('order_id', $order_id)->first();
        $user_id = $order->user_id;
        $room_id = $order->room_id;
        $room = Room::where('room_id', $room_id)->first();
        $user = User::where('user_id', $user_id)->first();

        return view('frontend.booking', compact('title','room', 'order', 'user'));
    }

   public function email()
    {   
        $title = "Email" . config('global.site_title');
        $details = [
                'order_id' => 'MSKHIOODJIGD',
                'checkin' => '2021-02-10',
                'checkout' => "2023-01-20",
                'email' => "noblesomto1@gmail.com",
                'name' => "john",
                'phone' => "0494842314",
                'amount' => "60000",
            ];
        return view('email.orderMail', compact('title','details'));
    }
}
