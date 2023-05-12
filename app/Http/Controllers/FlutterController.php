<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\NotifyMail;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterController extends Controller
{
      public function initialize(Request $request)
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        $user_id = $request->session()->get('user_id');
        $user = User::where('users.user_id', $user_id)->first();
        $name = $user->first_name . ' ' .$user->last_name;
        $email = $user->email;
        $phone = $user->phone;
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $request->input('price000'),
            'email' => $email,
            'tx_ref' => $request->input('orderID'),
            'room_id'=> $request->input('room_id'),
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $email,
                "phone_number" => $phone,
                "name" => $name
            ],

            "customizations" => [
                "title" => 'Room Reservation',
                "description" => "Booking Reservation"
            ]
        ];

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

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            return Redirect::back()->with('status', ['text'=>'There was an Error Please refresh the page and try again','type'=>'danger']);
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback(Request $request)
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        $room_id = $request->session()->get('room_id');

        $order_id= $data['data']['tx_ref'];

        DB::table('bookings')
                    ->where('order_id', $order_id)
                    ->update([
                        'payment'=> "Paid",
                        'book_status'=> "1",
                    ]);
       
            return redirect('/book_apartment_3/'.$room_id.'/'.$order_id);
        }
        elseif ($status ==  'cancelled'){
        
            return redirect('/book_apartment_2/'.$room_id)->with('status', ['text'=>'Your Payment was not processed at the moment, Please try again','type'=>'danger']);
        }
        else{
            return redirect('/book_apartment_2/'.$room_id)->with('status', ['text'=>'Your Payment was not processed at the moment, Please try again','type'=>'danger']);
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
