<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Paystack;
use Mail;
use App\Mail\NotifyMail;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class PaystackController extends Controller
{
    public function redirectToGateway(Request $request)
    {   
        $user_id = $request->session()->get('user_id');
        $user = User::where('users.user_id', $user_id)->first();
        $name = $user->first_name . ' ' .$user->last_name;
        $email = $user->email;
        $room_id = $request->input('room_id');
        $request->session()->put('room_id', $room_id);
        $room = Room::where('room_id', $room_id)->first();
        $room_title = $room->room_title;
        $room_apartment = $room->apartment;

        $details = [
                'email' => $email,
                'name' => $name,
                'room' => $room_title,
                'apartment' => $room_apartment,
                'order_id'=> $request->input('orderID'),
                'checkin'=> $request->session()->get('checkin'),
                'checkout'=> $request->session()->get('checkout'),
                'guests'=> $request->session()->get('guests'),
                'days'=> $request->session()->get('days'),
                'amount'=> $request->input('price000'),
            ];
            $admin_email = config('global.admin_email');

        
            Booking::create([
                'order_id'=> $request->input('orderID'),
                'user_id'=> $user_id,
                'room_id'=> $request->input('room_id'),
                'checkin'=> $request->session()->get('checkin'),
                'checkout'=> $request->session()->get('checkout'),
                'guests'=> $request->session()->get('guests'),
                'days'=> $request->session()->get('days'),
                'amount'=> $request->input('price000'),
                'payment'=> "Pending",
                'book_status'=> "0",
            ]);
            
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {

            return Redirect::back()->with('status', ['text'=>'The paystack token has expired. Please refresh the page and try again','type'=>'danger']);
        }        
    }


    public function make_payment(Request $request)
    {   
        $id = $request->input('plan');

        $room_id = $request->input('room_id');
        $request->session()->put('room_id', $room_id);
        DB::table('bookings')
            ->where('order_id', $id)
            ->where('room_id', $room_id)
            ->update([
                'order_id'=> $request->input('orderID'),
            ]);
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return $e->getMessage();
            exit();
            return Redirect::back()->with('status', ['text'=>'The paystack token has expired. Please refresh the page and try again','type'=>'danger']);
        }        
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
     //Getting authenticated user 
       
        
        $paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction
        // Getting the value via an array method    
        $order_id = $paymentDetails['data']['reference'];// Getting InvoiceId I passed from the form
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount
        $number = $randnum = rand(1111111111,9999999999);// this one is specific to application
        $number = 'year'.$number;
        $room_id = $request->session()->get('room_id');


         // dd($paymentDetails);
        if($status == "success"){ //Checking to Ensure the transaction was succesful
            DB::table('bookings')
                    ->where('order_id', $order_id)
                    ->update([
                        'payment'=> "Paid",
                        'book_status'=> "1",
                    ]);
       
             
            return redirect('/book_apartment_3/'.$room_id.'/'.$order_id);
        }
      
        // Now you have the payment details,
        // you can store the authorization_code in your DB to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
