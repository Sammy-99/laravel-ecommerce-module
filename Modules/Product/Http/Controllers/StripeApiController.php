<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class StripeApiController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    public function createProduct(Request $request)
    {
        $stripe = $this->stripe;

        try {
            $product = $stripe->products->create([
                'name' => $request->name,
                'active' => true,
                'description' => $request->description,
                'default_price_data' => array(
                    'currency' => $request->currency,
                    'unit_amount' => $request->price
                )
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }

        return response()->json(['status' => true, 'data' => $product]);
    }

    public function retrieveProduct(Request $request)
    {
        $stripe = $this->stripe;

        $product = $stripe->products->retrieve(
            $request->product_id
        );

        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function updateProduct(Request $request)
    {
        try {
            $stripe = $this->stripe;

            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $product = $stripe->products->update(
                $request->product_id,
                array_filter($data)
            );
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }

        return response()->json(['status' => true, 'data' => $product], 200);
    }

    public function listAllProduct(Request $request)
    {
        $stripe = $this->stripe;

        $products = $stripe->products->all();

        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function deleteProduct(Request $request)
    {
        $stripe = $this->stripe;

        $product = $stripe->products->update(
            $request->product_id,
            ['active' => false]
        );

        return response()->json(['status' => true, 'message' => 'Product Deleted'], 200);
    }

    public function createProductPrice(Request $request)
    {
        try {
            $stripe = $this->stripe;

            $request->validate([
                'amount' => 'required|numeric',
                'currency' => 'required',
                'interval' => 'required',
                'product_id' => 'required'
            ]);

            if (!in_array($request->interval, ["day", "week", "month", "year"]))
                return response()->json(['status' => false, 'message' => 'Not a valid interval']);

            $price = $stripe->prices->create([
                'unit_amount' => $request->amount,
                'currency' => $request->currency,
                'recurring' => ['interval' => $request->interval],
                'product' => $request->product_id,
            ]);

            return response()->json(['status' => true, 'data' => $price]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }
    }

    public function retrieveProductPrice(Request $request)
    {
        $stripe = $this->stripe;

        $request->validate([
            'product_id' => 'required'
        ]);

        $price = $stripe->prices->retrieve(
            $request->product_id
        );

        return response()->json(['status' => true, 'data' => $price]);
    }

    public function listProductPrice(Request $request)
    {
        $stripe = $this->stripe;

        $price = $stripe->prices->all();

        return response()->json(['status' => true, 'data' => $price]);
    }

    public function createPlan(Request $request)
    {
        try {
            $stripe = $this->stripe;

            $request->validate([
                'amount' => 'required|numeric',
                'currency' => 'required',
                'interval' => 'required',
                'product_id' => 'required'
            ]);

            if (!in_array($request->interval, ["day", "week", "month", "year"]))
                return response()->json(['status' => false, 'message' => 'Not a valid interval']);

            $plan = $stripe->plans->create([
                'amount' => $request->amount,
                'currency' => $request->currency,
                'interval' => $request->interval,
                'product' => $request->product_id,
            ]);

            return response()->json(['status' => true, 'data' => $plan]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }
    }

    public function listAllPlan(Request $request)
    {
        $stripe = $this->stripe;

        $plan = $stripe->plans->all();

        return response()->json(['status' => true, 'data' => $plan]);
    }

    public function createSubscription(Request $request)
    {
        try {
            $stripe = $this->stripe;
            $customerId = $this->createOrGetCustomer();

            $request->validate([
                'price_id' => 'required'
            ]);

            $card =  $stripe->tokens->create([
                'card' => [
                  'number' => '4242424242424242',
                  'exp_month' => '10',
                  'exp_year' => '2026',
                  'cvc' => '123',
                ],
              ]);

            $source = $stripe->customers->createSource(
                $customerId,
                [
                    'source' => $card->id
                ]
            );            

            $subscription = $stripe->subscriptions->create([
                'customer' => $customerId,
                'items' => [
                    ['price' => $request->price_id]
                ]
            ]);

            return response()->json(['status' => true, 'data' => $subscription]);
            
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }


        echo "<pre>";
        print_r($customerId);
        die(" ggga ");
    }

    private function createOrGetCustomer()
    {
        $user = auth()->user();

        if (!$user->customer_id) {
            $customer = $this->stripe->customers->create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            $user->update([
                'customer_id' => $customer['id']
            ]);
        }

        return $user->customer_id;
    }

    public function cancelSubscription(Request $request)
    {
        try {
            
            $request->validate([
                'subscription_id' => 'required'
            ]);
    
            $cancel = $this->stripe->subscriptions->cancel(
                $request->subscription_id
            );
    
            return response()->json(['status' => true, 'data' => $cancel]);

        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }
    }

    public function updateSubscription(Request $request)
    {
        try {
            
            $request->validate([
                'subscription_id' => 'required'
            ]);
    
            $update = $this->stripe->subscriptions->update(
                $request->subscription_id,
                ['metadata' => ['order_id' => '11111']]
            );
    
            return response()->json(['status' => true, 'data' => $update]);

        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error($e);
            return response()->json(['status' => false, 'message' => $e->getError()->message]);
        }
    }
}
