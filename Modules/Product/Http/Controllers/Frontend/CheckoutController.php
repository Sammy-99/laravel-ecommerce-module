<?php

namespace Modules\Product\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Stripe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $totalCartPrice = Session::get('totalCartPrice');
        
        return view('product::frontend.checkout.checkout', ['totalCartPrice' => $totalCartPrice]);
    }

    public function customerPayment(Request $request)
    {
        try {

            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
              );

            $paymentMethodObj =  $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                  'number' => $request->card_number,
                  'exp_month' => $request->expiry_month,
                  'exp_year' => $request->expiry_year,
                  'cvc' => $request->cvc,
                ],
              ]);

            $customerObj = $stripe->customers->create([
            'description' => 'My First Test Customer',
            'email' => $request->email,
            'name' => $request->name,
            'payment_method' => $paymentMethodObj['id']
            ]);
         
            $pyementIntentObj =  $stripe->paymentIntents->create([
                'amount' => Session::get('totalCartPrice') * 100,
                'currency' => 'inr',
                'payment_method_types' => ['card'],
                'customer' => $customerObj['id']
              ]);

           $payConfirmObj = $stripe->paymentIntents->confirm(
            $pyementIntentObj['id'],
            ['payment_method' => 'pm_card_visa']
            );

            
            if($payConfirmObj){
                $newUser = $this->createUser($request->email, $customerObj->id, $payConfirmObj);
                echo "<pre>"; print_r($payConfirmObj);die(" iddd ");
                
                if($newUser){
                    Session::forget('shopping_cart');
                    
                    return redirect()->back()->with('success', 'Payment has been successfully processed.');
                }
            }
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }          
    }

    public function createUser($email, $customerId, $payConfirmObj)
    {
        $password = Hash::make('User@123');

        $model = DB::table('users')->insert([
            "name" => "guest user",
            "email" => $email,
            "password" => $password,
            "customer_id" => $customerId
        ]);

        if($model){
            $user_data = User::where('email', $email)->first();
            $transactionId = $payConfirmObj['charges']['data'][0]['id'];
            $amount = $payConfirmObj->amount/100 ;
            $paymentMethod = $payConfirmObj['payment_method_types'][0];
            // $transactionId = $transactionArr['id'];

            $model = DB::table('transaction')->insert([
                'user_id' => $user_data->id,
                'transaction_id' => $transactionId,
                'total_amount' => $amount,
                'currency' => $payConfirmObj->currency,
                'payment_method_types' => $paymentMethod
            ]);

            return true;
        }

        return false;
    }
}
