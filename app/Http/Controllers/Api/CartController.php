<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user()->cart()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        Cart::updateOrCreate(
            ['user_id' => $request->user()->id,
                'product_id' => $request->product_id,],
            ['quantity' => $request->quantity]
        );

        return response()->json(['message' => 'Product added'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->where('product_id', $id)->first();
        $cart->delete();

        return response()->json(['message' => 'Product removed'], 200);
    }

    public function clear(Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)->delete();

        return response()->json(['message' => 'Cart cleared'], 200);
    }

    public function checkout(Request $request)
    {
        $cartitems = $request->user()->cart()->get();
        Log::debug($cartitems);
        if (count($cartitems) == 0) {
            return response()->json(['error'=> 'Cart is empty'], 422);
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'status' => 'pending',
        ]);

        foreach ($cartitems as $item) {
            OrderItem::create([
               'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ]);
        }

        Cart::where('user_id', $request->user()->id)->delete();

        return response()->json(['message' => 'Checkout successful'], 200);
    }
}
