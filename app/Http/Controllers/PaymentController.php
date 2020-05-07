<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use App\UserCredit;
use Auth;
use App\Payment as paypalPayment;
use Credits;
class PaymentController extends Controller
{
    //
	
	  public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
	
	
	
	 public function index()
    {
       // return view('paywithpaypal');
    }
	
	public function payWithpaypal(Request $request)
    {
		

    	Session::put('credit_quantity', $request->get('credit_quantity'));
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
			
			

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        

        if (isset($redirect_url)) {
			$user_id = Auth::user()->id;
			$payment = new paypalPayment;
			$payment->user_id = $user_id;
			$payment->trans_id = 0;
			$payment->method = "paypal";
			$payment->ammount = $request->get('amount');
			$payment->paid=0;
			$payment->status="Payment Initiated";
			$payment->created_at=date('Y-m-d H:i:s');
			$payment->save();
			
			Session::put('pid',$payment->id);
			
            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

    public function getPaymentStatus()
    {

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
		$cpid = Session::get('pid');
		$credit_quantity = Session::get('credit_quantity');
		
        /** clear the session payment ID **/
		Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

			
			$payment = paypalPayment::find($cpid);
			$payment->paid=2;
			$payment->status="Payment Failed";
			$payment->created_at=date('Y-m-d H:i:s');
			$payment->save();
			
			Session::flash('errors','Payment failed please try later!');
			return Redirect::route('credits');

        }
		
	

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
	
		$transactions = $payment->getTransactions();
		$relatedResources = $transactions[0]->getRelatedResources();
		$sale = $relatedResources[0]->getSale();
		$sale_data = $transactions[0]->getAmount();
		$payer = $payment->getPayer();
		$user_id = Auth::user()->id;
		$trans_id = $sale->getId();
		$currency = $sale_data->getCurrency();
		$final_amount = $sale_data->getTotal();
		
		

        if ($result->getState() == 'approved') {

			
			$payment = paypalPayment::find($cpid);
			$payment->trans_id = $trans_id;
			$payment->paid=1;
			$payment->status="Payment Received";
			$payment->created_at=date('Y-m-d H:i:s');
			$payment->save();

			$credits = new UserCredit();

			$credits->user_id       = $user_id;
			$credits->credits       = $credit_quantity; //$final_amount* Credits::credits('one_credits');
			$credits->description   = 'Purchased';

			$credits->save();

			Session::flash('done','Record added successfully!');
			return Redirect::route('credits');
		  

        }else {

			$payment = new paypalPayment;
			$payment->user_id = $user_id;
			$payment->trans_id = $trans_id;
			$payment->method = "paypal";
			$payment->ammount = $final_amount;
			$payment->paid=1;
			$payment->currency=$currency;
			$payment->status="Payment failed";
			$payment->created_at=date('Y-m-d H:i:s');
			
			$payment->save();
			
			Session::flash('errors','Payment failed please try later!');
			return Redirect::route('credits');
			
		}

    }
	
}
