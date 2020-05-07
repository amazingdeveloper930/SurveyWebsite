<?php
    
    namespace App\Http\Controllers\frontend;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Setting;
    use Auth;
    use Session;
    Use Credits;
    
    class CreditsController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }
        
        public function index()
        {
            return view('frontend.credits.index', ['buy_credit_starting_price' => Credits::credits('buy_credit_starting_price'),
                        'price_per_answer' => Credits::credits('price_per_answer')]);
        }
        
        public function CardForm(Request $request)
        {
            return view('frontend.credits.payment', ['amount' => $request->get('amount'), 'credit_quantity' => $request->get('credit_quantity')]);
        }
        
    }
