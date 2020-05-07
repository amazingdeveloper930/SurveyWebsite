<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;


class ApiController extends Controller
{
    //
    public function payment_list(Request $request)
    {
        //     $validator = Validator::make($request->all(), [ 
        //         'name' => 'required', 
        //     ]);
        // if ($validator->fails()) { 
        //             return response()->json(['error'=>$validator->errors()], 401);          
        //     }
        $count = 10;
        if(isset($request -> list_count))
            $count = $request -> list_count;
        $payment_entry = Payment::select('trans_id', 'method', 'user_id', 'ammount as amount', 'currency', 'status', 'declinereason as decline_reason')
                        -> orderBy('updated_at', 'DESC')
                        -> limit(10)
                        -> get();
        if(isset($payment_entry))
        {
            foreach($payment_entry as $payment)
            {
                $payment -> email = null;
                $user_entry = User::where('id', $payment -> user_id) -> first();
                if(isset($user_entry))
                {
                    $payment -> email = $user_entry -> email;
                }
            }
        }
        return response()->json([
            'entry' => $payment_entry
        ]);
    }
}
