<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use App\UserCredit;
use Auth;
use App\Services\PaypalPDT;

class PaymentsController extends Controller
{
	public function success(Request $request)
	{
        $pdt = new PaypalPDT();

        $pdt->useSandbox();

        $verified = $pdt->verify($request);

        if ($verified && Auth::guard('web')->check()) {
            $userId         = Auth::user()->id;
            $payment_data   = $pdt->getPaymentData();
			
		echo '<pre>';
			print_r($payment_data);die();
            // Payment
            $payment = new Payment();

            $payment->user_id   = $userId;
            $payment->ammount   = $payment_data['mc_gross'];
            $payment->currency  = $payment_data['mc_currency'];
            $payment->paid      = $payment_data['txn_id'];;

            $payment->save();

            // User credits
            $credits = new UserCredit();

            $credits->user_id       = $userId;
            $credits->credits       = $request->get('credit_quantity');//$payment_data['mc_gross'] * config('settings.one_credits');
            $credits->description   = 'Purchased';

            $credits->save();

            return view('frontend.payments.success');
        }

        $this->cancel();
	}

	public function cancel()
	{
		return view('frontend.payments.cancel');
	}
}
