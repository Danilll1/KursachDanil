<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function add(Request $request) {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' =>'required|integer|max:2000|min:1'
        ]);
        $data = $request->all();

        $product = Product::findOrFail($data['product_id']);
        $cart = new Cart();
        $cart->addToCart($product, $data['qty']);

        return view('cart.cart-modal');
    }

    public function delItem($product_id){
        $cart = new Cart();
        $cart->delItem($product_id);
        return view('cart.cart-modal');
    }

    public function delItem2($product_id){
        $cart = new Cart();
        $cart->delItem2($product_id);
        return view('cart.cart-modal');
    }

    public function clear() {
        session()->forget('cart');
        session()->forget('cart_qty');
        session()->forget('cart_total');
        return view('cart.cart-modal');
    }

    public function checkout(Request $request) {
        if ($request->method() == 'POST') {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
            $data = $request->all();

            DB::transaction(function () use ($data) {
                $order_data = array_merge([
                    'qty' =>session('cart_qty'),
                    'total' => session('cart_total'),
                ], $data);
                $order = Order::create($order_data);
                $order->products()->createMany(session('cart'));
            });

            session()->forget("cart");
            session()->forget("cart_qty");
            session()->forget("cart_total");
            return redirect()->route('cart.checkout')->with('success', 'Заказ оформлен');
        }
        return view('cart.checkout');
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return view('cart.cart-modal');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
