<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomImage;
use App\Models\Booking;
use Mail;
use App\Mail\OrderMail;
use App\Mail\NotifyMail;

class RoomController extends Controller
{

    public function search_rooms(Request $request)
    {   
        $title = "Our Apartments - ". config('global.site_name');
        $page_title = "Available Apartments";

            $request->validate([
            'checkin' => 'required',
            'checkout' => 'required',
            'guests' => 'required|numeric',
            'days' => 'required',
           ]);

        $checkin = $request->input('checkin');
        $check_in = date("Y-m-d", strtotime($checkin));
        $checkout = $request->input('checkout');
        $check_out = date("Y-m-d", strtotime($checkout));

        $room = Room::whereNotIn('room_id', function($query) use ($check_in, $check_out) {
           $query->from('bookings')
            ->select('room_id')
            ->where("payment", "Paid")
            ->where('checkin', '<=', $check_out)
            ->where('checkout', '>=', $check_in);
                })->paginate(12);


        return view('frontend.search-rooms', compact('title','room', 'page_title', 'check_in', 'check_out'));
    
    }

    public function rooms(Request $request)
    {   
  
        $room = Room::where('room_status',1)->paginate(12);
        $title = "Our Apartments - ". config('global.site_name');
        $page_title = "Our Apartments";


        return view('frontend.rooms', compact('title','room', 'page_title'));
        
    }

    public function room($room_id, $slug)
    {   
        $room = Room::where('room_id', $room_id)->first();
        $image = RoomImage::where('room_id', $room_id)->get();
        $title = $room->room_title ." - ". config('global.site_name');
        $room_location = $room->location;

         $data = Booking::select("*")
                ->where('room_id', $room_id)
                ->where("payment", "Paid")
                ->get();
        $color = "#ffb600";
        $events = [];
         if(count($data) > 0){
            foreach ($data as $key => $item) {
                $events[$key] = [
                    'title' => "Apartment Booked",
                    'start' => $item->checkin ,
                    'end' => $item->checkout."T14:59:00",
                     'color' => $color
                ];       
            }
        }

        $similar = Room::inRandomOrder()->where('location', $room_location)->limit(3)->get();

        return view('frontend.room', compact('title','room','image','similar', 'events'));
    }

    public function book(Request $request,$room_id)
    {   
        $room = Room::where('room_id', $room_id)->first();
        $title = $room->room_title ." - ". config('global.site_name');
        $slug = $room->room_slug;

        $request->validate([
            'checkin' => 'required',
            'checkout' => 'required',
            'guests' => 'required|numeric',
            'days' => 'required',
           ]);

        $checkin = $request->input('checkin');
        $check_in = date("Y-m-d", strtotime($checkin));
        $checkout = $request->input('checkout');
        $check_out = date("Y-m-d", strtotime($checkout));
        $guests = $request->input('guests');
        $days = $request->input('days');

        $available = Booking::select("*")
                    ->where("room_id", $room_id)
                    ->where("payment", "Paid")
                    ->where("checkout",'>', $check_in)
                    ->where("checkin",'<', $check_out)
                    ->count();

        if ($available == 0) {
            $request->session()->put('checkin', $check_in);
            $request->session()->put('checkout', $check_out);
            $request->session()->put('guests', $guests);
            $request->session()->put('days', $days);
            $request->session()->put('room_id', $room_id);
            return redirect('/book-apartment/'.$room_id);
        } else {
            return redirect('/room/'.$room_id.'/'.$slug)->with('status', ['text'=>'Sorry! The Apartment is not available for the selected Checkin Date','type'=>'danger']);
        }

    }

    public function book_apartment($room_id)
    {   
        $room = Room::where('room_id', $room_id)->first();
        $title = $room->room_title ." - ". config('global.site_name');
        \DB::table('rooms')
               ->where('room_id', $room_id)
               ->increment('views', 1);

        return view('frontend.book-apartment', compact('title','room'));
    }

    public function book_apartment_2(Request $request,$room_id)
    {   
        $room = Room::where('room_id', $room_id)->first();
        $title = $room->room_title ." - ". config('global.site_name');
        $currentURL = url()->current();
        $request->session()->put('previous_url', $currentURL);
        $user_id = $request->session()->get('user_id');
        if(empty($user_id)) {
            return redirect('/login')->with('status', ['text'=>'Sorry! Please Login to Book Apartment','type'=>'danger']);
        }

        return view('frontend.book-apartment-2', compact('title','room'));
    }

    public function book_apartment_3(Request $request,$room_id, $order_id)
    {   
        $room = Room::where('room_id', $room_id)->first();
        $title = $room->room_title ." - ". config('global.site_name');

        $order = Booking::where('order_id', $order_id)->first();
        $user_id = $order->user_id;
        $user = User::where('user_id', $user_id)->first();
        $admin_email = config('global.admin_email');

        $details = [
                'email' => $user->email,
                'phone' => $user->phone,
                'name' => $user->first_name . " " .$user->last_name,
                'room' => $room->room_title,
                'apartment' => $room->apartment,
                'order_id'=> $order_id,
                'checkin'=> $order->checkin,
                'checkout'=> $order->checkout,
                'guests'=> $order->guests,
                'days'=> $order->days,
                'amount'=> $order->amount,
            ];

        Mail::to($user->email)->send(new OrderMail($details));
        Mail::to($admin_email)->send(new NotifyMail($details));
        if ($request->session()->has('checkin')) {
            $request->session()->forget(['checkin', 'checkout', 'guests', 'days', 'room_id']);
        }
        

        return view('frontend.book-apartment-3', compact('title','room', 'order', 'user'));
    }
}
