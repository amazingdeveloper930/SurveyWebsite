<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cardinity\Client;
use Cardinity\Exception;
use Cardinity\Method\Payment;
use Auth;
use Credits;
use App\UserCredit;
use Session;
use Redirect;
use App\Payment as CardinityPayment;

class CardinityController extends Controller
{
    public $client;
    public $config;
    public function __construct(){

        $this->client = Client::create([
            'consumerKey' => 'test_xl2krdpxseqrdim9lurbob5zjizrrb',
            'consumerSecret' => 's2vh7ttdb33taasazejkubf6kkhqumxmaz3whltdttbongc8kb',
        ]);

        $this->config = [
            'currency' => 'EUR',
            'settle' => false,
            'country' => 'LT'
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makePayment(Request $request){
        
        if(date('Y') > $request->get('cc-expiration-year') || (date('Y') == $request->get('cc-expiration-year') && date('m') > $request->get('cc-expiration-month'))){
            $user_id = Auth::user()->id;
            $payment = new CardinityPayment;
            $payment->user_id = $user_id;
            $payment->trans_id = 0;
            $payment->method = "Cardinity Payment API";
            $payment->ammount = $request->get('amount');
            $payment->paid=0;
            $payment->status="Payment Initiated";
            $payment->created_at=date('Y-m-d H:i:s');
            $payment->save();

            $payment->status = 'Payment declined';
            $payment->paid = 2;
            $payment->currency = $this->config['currency'];
            $payment->trans_id = (string)$payment->id;
            if(date('Y') > $request->get('cc-expiration-year'))
                $payment->declinereason = "Invalid year of expiry or the card is already expired";
            else
                $payment->declinereason = "Invalid month of expiry or the card is already expired";
            $payment->save();
            Session::flash('errors','Invalid year of expiry, please check and try again');
            return Redirect::route('credits');
        }

        $user_id = Auth::user()->id;
        $payment = new CardinityPayment;
        $payment->user_id = $user_id;
        $payment->trans_id = 0;
        $payment->method = "Cardinity Payment API";
        $payment->ammount = $request->get('amount');
        $payment->paid=0;
        $payment->status="Payment Initiated";
        $payment->created_at=date('Y-m-d H:i:s');
        $payment->save();

        try {
            $method = new Payment\Create([
                'amount' => (float) $request->get('amount'),
                'currency' => $this->config['currency'],
                'settle' => $this->config['settle'],
                'description' => $request->get('description') ?$request->get('description'):'Poll Animal Credits',
                'order_id' => (string) $payment->id, // Set Order ID
                'country' => $this->config['country'],
                'payment_method' => Payment\Create::CARD,
                'payment_instrument' => [
                    'pan' => (string) $request->get('cc-number'), //'4111111111111111',
                    'exp_year' => (integer)$request->get('cc-expiration-year'), //2016,
                    'exp_month' => (integer)$request->get('cc-expiration-month'), //12,
                    'cvc' => (string)$request->get('cc-cvv'), //456,
                    'holder' => (string)$request->get('cc-name'), //'Mike Dough'
                ],
            ]);
            $paymentAPI = $this->client->call($method);
        } catch (Declined $exception) {
            $paymentAPI = $exception->getResult();
        }


        if($paymentAPI->getStatus() === 'approved'){

            $payment->status = 'Payment Approved';
            $payment->paid = 1;
            $payment->currency = $this->config['currency'];
            $payment->trans_id = $paymentAPI->getId();
            $payment->updated_at=date('Y-m-d H:i:s');
            $payment->save();

            $credits = new UserCredit();

            $credits->user_id       = $user_id;
            $credits->credits       =  $request->get('credit_quantity');
            $credits->description   = 'Purchased';

            $credits->save();

            Session::flash('done','Record added successfully!');
            return Redirect::route('credits');
        }
        if($paymentAPI->getStatus() === 'pending'){
            $payment->status = 'Payment pending';
            $payment->paid = 1;
            $payment->currency = $this->config['currency'];
            $payment->trans_id = $paymentAPI->getId();
            $payment->updated_at=date('Y-m-d H:i:s');
            $payment->save();
            Session::flash('errors','Payment failed please try later!');
            return Redirect::route('credits');
        }
        if($paymentAPI->getStatus() === 'declined'){
            $payment->status = 'Payment declined';
            $payment->paid = 2;
            $payment->currency = $this->config['currency'];
            $payment->trans_id = $paymentAPI->getId();
            $payment->declinereason = $paymentAPI->getErrorsAsString();
            $payment->save();
            Session::flash('errors','Payment failed please try later!');
            return Redirect::route('credits');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
