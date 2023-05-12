<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Booking;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $title = "User Dashboard  " . config('global.site_name');
        $user_id = $request->session()->get('user_id');
        $user = User::where('users.user_id', $user_id)->first();
        
        return view('dashboard.index', compact('title','user'));
    }

    public function orders(Request $request)
    {   
        $title = "My Orders | " . config('global.site_name');
        $user_id = $request->session()->get('user_id');
        $user = User::where('users.user_id', $user_id)->first();
        $orders = Booking::select("*")
                ->leftJoin('rooms', 'rooms.room_id', '=', 'bookings.room_id')
                ->where('bookings.user_id', $user_id)
                ->orderBy("bookings.id", "desc")
                ->paginate(20);
        
        return view('dashboard.orders', compact('title','user', 'orders'));
    }


    public function profile(Request $request)
    {   
        $title = "My Profile | " . config('global.site_name');
        $user_id = $request->session()->get('user_id');
        $user = User::where('user_id', $user_id)->first();

        if ($request->isMethod('GET')) {
            return view('dashboard.profile', compact('title','user'));
        }

         if ($request->isMethod('POST')) {

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|numeric',
                'city' => 'required',
                'address' => 'required',
            ]);
            
            try {

                $user = DB::table('users')
                    ->where('user_id', $user_id)
                    ->update([
                        'first_name'=> $request->input('first_name'),
                        'last_name'=> $request->input('last_name'),
                        'phone'=> $request->input('phone'),
                        'city'=> $request->input('city'),
                        'address'=> $request->input('address'),
                    ]);
             
            
            return redirect("user/profile")->with('status', ['text'=>'Your Profile has been updated','type'=>'success']);

            } catch (Throwable $e) {
                
                 return redirect("user/profile")->with('status', ['text'=>'Sorry! There was an error while updating profile','type'=>'danger']);
            }
        }
    }

    public function logout(Request $request)
    {   
        $request->session()->forget('user_id');
        return redirect("login")->with('status', ['text'=>'Logged out Successfully','type'=>'success']);
    }

}
