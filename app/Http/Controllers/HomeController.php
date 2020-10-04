<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $products = Product::get();
        $users = User::get();
        $carts = Cart::with('user', 'product')->get();

         if($request->wantsJson()){
            return [$products, $carts, $users];
        }

        return view('home', compact('products', 'users', 'carts'));
    }

    public function addcart(Request $request)
    {   
        $request->validate([
            'quantity' => 'required'
        ]);

        $cart = new Cart;
        $cart->user_id = auth()->user()->id; 
        $cart->product_id = $request->input('id'); 
        $cart->quantity = $request->input('quantity'); 
        $cart->save();

        return redirect()->route('index')->with(['success' => 'The record have been add to your cart']);
    }

    public function checkout()
    {
        dd(124);
    }
}
