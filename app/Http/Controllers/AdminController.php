<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomImage;

class AdminController extends Controller
{
     public function index()
    {   
        $title = "Admin Section -" . config('global.site_name');
        $count_room = Room::count();
        $count_users = Booking::count();
        
        return view('backend.index', compact('title','count_users','count_room'));
    }

    public function amenities(Request $request)
    {   

        $title = "Amenity - " . config('global.site_name');
        $amenities = Amenity::orderBy('features','asc')->get();
       
        if ($request->isMethod('POST')) {
            $request->validate([
                'features' => 'required',
                'icon' => 'required',
               ]);
          
            $post = Amenity::create([
                'features'=> $request->input('features'),
                'icon'=> $request->input('icon'),
            ]);

            return redirect('/admin/amenities')->with('status', ['text'=>'Amenity  Successfully published','type'=>'success']);
        }

        if ($request->isMethod('GET')) {
            return view('backend.amenities', compact('title', 'amenities'));
        }
        
    }


    public function users()
    {   
        $user = User::orderBy('created_at', 'desc')->paginate(20);
        $title = "Active Users -" . config('global.site_name');
        return view('backend.users', compact('title', 'user'));
    }

    public function user_status($id, $status)
    {   
        $post = DB::table('users')
            ->where('user_id', $id)
            ->update([
                'acc_status'=> $status,
            ]);
            return redirect("/admin/users")->with('status',['text'=>'User Status Changed','type'=>'success']);
      
    }

     public function delete_user($user_id) 
    {
        $post = User::where('user_id', $user_id)->first();
        $post->delete();
        return redirect('/admin/users');

    }



    public function new_apartment(Request $request)
    {   
        $title = "Post New Apartment - " . config('global.site_name');
        $amenity = Amenity::orderBy('features','asc')->get();

        if ($request->isMethod('POST')) {

            $room_id = rand(00000,99999);

         
        $request->validate([
            'room_title' => 'required',
            'apartment' => 'required',
            'room_price' => 'required|numeric',
            'location' => 'required',
            'room_description' => 'required',
            'room_picture' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
    
           ]);
    

        $image = $request->file('room_picture');
        $imageName = time().'.'.$image->extension();
        $imageName = str_replace(' ', '-', $imageName);
        $request->file('room_picture')->move('uploads', $imageName);

        
        $post = Room::create([
            'room_title'=> $request->input('room_title'),
            'apartment'=> $request->input('apartment'),
            'room_price'=> $request->input('room_price'),
            'discount_7'=> $request->input('discount_7'),
            'discount_30'=> $request->input('discount_30'),
            'room_features'=> implode(",",$request->input('room_feature')),
            'location'=> $request->input('location'),
            'bedrooms'=> $request->input('bedrooms'),
            'beds'=> $request->input('beds'),
            'baths'=> $request->input('baths'),
            'guest'=> $request->input('guests'),
            'room_description'=> $request->input('room_description'),
            'keyword'=> $request->input('keyword'),
            'meta_description'=> $request->input('meta_description'),
            'featured'=> $request->input('featured'),
            'room_id'=> $room_id,
            'views'=> "0",
            'room_status'=> "1",
            'room_picture'=> $imageName,
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $name = rand(00000,99999).'_'.$image->getClientOriginalName();
                $path = $image->move('uploads/images', $name);

                RoomImage::create([
                    'room_id' => $room_id,
                    'image' => $name
                  ]);
            }
         }

        return redirect('/admin/new-apartment')->with('status', ['text'=>'Apartment  Successfully published','type'=>'success']);
        }
        
        if ($request->isMethod('GET')) {
            return view('backend.rooms.new-room', compact('title','amenity'));
        }
    }

    public function apartments()
    {   
        $rooms = Room::orderBy('created_at', 'desc')->paginate(20);
        $title = "All Apartments | " . config('global.site_name');
        return view('backend.rooms.rooms', compact('title', 'rooms'));
    }

    public function room_status($id, $status)
    {   
        $post = DB::table('rooms')
            ->where('room_id', $id)
            ->update([
                'room_status'=> $status,
            ]);
            return redirect("/admin/all-apartments")->with('status',['text'=>'Apartment Status Changed','type'=>'success']);
      
    }


    public function edit_apartment(Request $request, $id)
    {   
        $title = "Edit Apartment | " . config('global.site_name');
        $room_id = $id;
        $amenity = Amenity::orderBy('features','asc')->get();
        $room = Room::where('room_id',$id)->first();
        $image = RoomImage::where('room_id', $id)->get();

        if ($request->isMethod('PUT')) {
        
        $request->validate([
            'room_title' => 'required',
            'apartment' => 'required',
            'room_price' => 'required|numeric',
            'location' => 'required',
            'room_description' => 'required',
           ]);

        if(!empty($request->file('room_picture'))) {

        $image = $request->file('room_picture');
        $imageName = time().'.'.$image->extension();
        $imageName = str_replace(' ', '-', $imageName);
        $request->file('room_picture')->move('uploads', $imageName);
 
        $post = DB::table('rooms')
                    ->where('room_id', $id)
                    ->update([
            'room_title'=> $request->input('room_title'),
            'apartment'=> $request->input('apartment'),
            'room_price'=> $request->input('room_price'),
            'discount_7'=> $request->input('discount_7'),
            'discount_30'=> $request->input('discount_30'),
            'room_features'=> implode(",",$request->input('room_feature')),
            'location'=> $request->input('location'),
            'bedrooms'=> $request->input('bedrooms'),
            'beds'=> $request->input('beds'),
            'baths'=> $request->input('baths'),
            'guest'=> $request->input('guests'),
            'room_description'=> $request->input('room_description'),
            'keyword'=> $request->input('keyword'),
            'meta_description'=> $request->input('meta_description'),
            'featured'=> $request->input('featured'),
            'room_picture'=> $imageName,
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $name = rand(00000,99999).'_'.$image->getClientOriginalName();
                $path = $image->move('uploads/images', $name);

                RoomImage::create([
                    'room_id' => $room_id,
                    'image' => $name
                  ]);
            }
         }
         } else {
            $post = DB::table('rooms')
                    ->where('room_id', $id)
                    ->update([
                    'room_title'=> $request->input('room_title'),
                    'apartment'=> $request->input('apartment'),
                    'room_price'=> $request->input('room_price'),
                    'discount_7'=> $request->input('discount_7'),
                    'discount_30'=> $request->input('discount_30'),
                    'room_features'=> implode(",",$request->input('room_feature')),
                    'location'=> $request->input('location'),
                    'bedrooms'=> $request->input('bedrooms'),
                    'beds'=> $request->input('beds'),
                    'baths'=> $request->input('baths'),
                    'guest'=> $request->input('guests'),
                    'room_description'=> $request->input('room_description'),
                    'keyword'=> $request->input('keyword'),
                    'meta_description'=> $request->input('meta_description'),
                    'featured'=> $request->input('featured'),
                ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            foreach($images as $image) {
                $name = rand(00000,99999).'_'.$image->getClientOriginalName();
                $path = $image->move('uploads/images', $name);

                RoomImage::create([
                    'room_id' => $room_id,
                    'image' => $name
                  ]);
            }
         }
        }

        return redirect('/admin/edit-apartment/'.$id)->with('status', ['text'=>'Apartment  Successfully Edited','type'=>'success']);
        }
        
        if ($request->isMethod('GET')) {
            return view('backend.rooms.edit-room', compact('title','room','image','amenity'));
        }
    }

    public function deleteimage(Request $request) 
    {   
        $id = $request->input('image_id');
        $post = RoomImage::where('id', $id)->first();
        $post->delete();
        return response()->json(['success'=>'Image Deleted']);
        
    }

    public function delete_room($room_id) 
    {
        $post = Room::where('room_id', $room_id)->first();
        $post->delete();

        $image = RoomImage::where('room_id', $room_id)->first();
        $image->delete();
        return redirect('/admin/all-apartments');

    }

    public function orders()
    {   
        $title = "All Orders -" . config('global.site_name');
        $orders = Booking::select("*")
                ->leftJoin('rooms', 'rooms.room_id', '=', 'bookings.room_id')
                ->orderBy("bookings.id", "desc")
                ->paginate(20);
        return view('backend.orders', compact('title', 'orders'));
    }


    public function order_details($order_id)
    {   
        $title = "Order Details -" . config('global.site_name');
        $order = Booking::select("*")
                ->leftJoin('rooms', 'rooms.room_id', '=', 'bookings.room_id')
                ->where("bookings.order_id", $order_id)
                ->first();
        $user_id = $order->user_id;
        $user = User::where('users.user_id', $user_id)->first();
        return view('backend.order-details', compact('title', 'order', 'user'));
    }

    public function order_status($id, $status)
    {   
        $post = DB::table('bookings')
            ->where('order_id', $id)
            ->update([
                'book_status'=> $status,
            ]);
            return redirect("/admin/order-details/".$id)->with('status',['text'=>'Order Status Changed','type'=>'success']);
      
    }

    public function delete_order($id) 
    {
        $post = Booking::where('order_id', $id)->first();
        $post->delete();

        return redirect("/admin/orders/")->with('status',['text'=>'An Order was deleted Successfully','type'=>'success']);

    }
}
