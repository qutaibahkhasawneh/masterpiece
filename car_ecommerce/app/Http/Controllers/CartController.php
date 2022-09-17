<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Cart;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //GET
            if (Session::has('loginId')) {
            $cartItems = Cart::orderBy('carts.id', 'ASC')->where('user_id', Session::get('loginId'))->join('users', 'carts.user_id', '=', 'users.id')->join('products', 'carts.product_id', '=', 'products.id')->get(['carts.id','carts.sub_total', 'carts.quantity', 'products.product_img', 'products.product_name','products.product_price']);
            // dd($cartItems);
            $subtotal = Cart::where('user_id', Session::get('loginId'))->pluck('sub_total')->sum();
            $user = User::all();
            $total_price = Cart::where('user_id', Session::get('loginId'))->pluck('sub_total')->sum();
            $allCart = Cart::where('user_id',Session::get('loginId'))->join('products', 'carts.product_id', '=', 'products.id')->get(['carts.quantity','carts.sub_total', 'products.product_name']);
            return view('pages.cart', compact('cartItems','subtotal','user','allCart','total_price'));
        } else {
            return redirect()->route('login')->withFailure(__('You must login to see this page'));
        }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if (Session::has('loginId')) {
                if ($cart = Cart::where('user_id', $request->session()->get('loginId'))->Where('product_id', $request->product_id)->first()) {
                    // $package->update(array_merge($data,request('image') != null ? ['image' => $imagePath ] : []));
                    $cart->quantity =  $cart->quantity + $request->quantity;
                    $cart->sub_total = $cart->sub_total + (($request->quantity) * ($request->product_price));
                    $cart->update();
                    return redirect(url()->previous()."#$request->product_id")->with('success','You have add to cart successfully');
                } else {

                    $cart = new Cart();
                    $cart->user_id = $request->session()->get('loginId');
                    $cart->product_id = $request->product_id;
                    $cart->quantity = $request->quantity;
                    $cart->sub_total = ($request->quantity) * ($request->product_price);
                    $cart->save();
                    return redirect(url()->previous()."#$request->product_id");
                }
            } else {
                return redirect('/login')->withFailure(__('You must login to purchase this product'));
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        try{

            $cart->quantity =  $request->quantity;
            $cart->sub_total = (($request->quantity) * ($request->product_price));
            $cart->update();
            return back();

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete($cart);
        return back();
    }

    public function checkout(){
        try {
            if (Session::has('loginId')) {
            $allCart = Cart::where('user_id',Session::get('loginId'))->join('products', 'carts.product_id', '=', 'products.id')->get(['carts.quantity','carts.sub_total', 'products.product_name']);
            $productCount = Cart::where('user_id',Session::get('loginId'))->count();
            // dd($productCount);
            // dd( $allCart);
            // $subtotal = Cart::where('user_id', Session::get('loginId'))->pluck('sub_total')->sum();

            $total_price = Cart::where('user_id', Session::get('loginId'))->pluck('sub_total')->sum();
            // $discount = 0;
            // dd($total_price);
            // if ($coupon = Session::get('coupon')){
            //     if ($coupon->type_id === 1) {
            //         $discount = $coupon->value;
            //         $total_price = $total_price - $discount;
            //     }else if ($coupon->type_id === 2){
            //         $discount = ($total_price*($coupon->percent_off/100));
            //         $total_price = $total_price - $discount;
            //     }
            // }
            // dd($total_price);
            // dd($discount);
            $user = User::where('id', '=' ,Session::get('loginId'))->first();
            // dd($user);

            return view('pages.checkout', compact('user','allCart','total_price','productCount'));
        } else {
            return redirect()->route('login')->withFailure(__('You must login to purchase this product'));
        }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };
    }

    public function placeOrder(Request $request){

        // dd ($request->all());
        $allCart = Cart::where('user_id',Session::get('loginId'))->join('products', 'carts.product_id', '=', 'products.id')->get();
        //  dd ($allCart);
         foreach ($allCart as $cart){
            //  dd($cart->id);
             $order = new Order();
             $order->user_id = $cart->user_id;
             $order->product_id = $cart->product_id;
             $order->product_quantity = $cart->quantity;
             $order->product_sub_total = $cart->sale_status_id === 1 ? $cart->product_price_on_sale : $cart->product_price;
            //  dd( $order->product_sub_total);
            //  $order->order_total_price = $request->total_price;
             $order->address = $request->address;
             $order->phone = $request->phone;
             $order->order_status = 'pending';
             $order->save();
             Cart::where('user_id',Session::get('loginId'))->delete();
         }
         return redirect()->route('home')->withSuccess(__('placed your order successfully.'));
    }

    public function myOrders(){
        $user = User::where('id', Session::get('loginId'))->first();
        // dd($user);
        $orders = Order::orderBy('orders.id', 'DESC')->groupBy('orders.created_at')->where('user_id', Session::get('loginId'))->join('users', 'orders.user_id', '=', 'users.id')->join('products', 'orders.product_id', '=', 'products.id')->get(['orders.id','orders.product_sub_total','orders.order_total_price', 'orders.product_quantity','orders.address', 'orders.phone','orders.created_at', 'products.product_name',]);
        // $orders =  Order::orderBy('orders.id', 'DESC')->where('user_id', Session::get('user')->id)->join('users', 'orders.user_id', '=', 'users.id')->join('products', 'orders.product_id', '=', 'products.id')->get(['orders.id','orders.order_total_amount', 'orders.product_quantity','orders.address', 'orders.phone', 'orders.created_at', 'products.product_name',]);
        // dd($orders);
        return view('profile', compact('user','orders'));
    }
    public function ordersDetails(Request $request){
        // dd($request->all());
        // $user = User::where('id', Session::get('user')->id)->first();
        // dd($user);
        $orders =  Order::orderBy('orders.id', 'DESC')->where('user_id', Session::get('loginId'))->where('orders.created_at',$request->order_date)->join('users', 'orders.user_id', '=', 'users.id')->join('products', 'orders.product_id', '=', 'products.id')->get(['orders.id','orders.product_sub_total','orders.order_total_price', 'orders.product_quantity','orders.address', 'orders.phone', 'orders.created_at', 'products.product_name','products.product_price']);
        // $orders =  Order::orderBy('orders.id', 'DESC')->where('user_id', Session::get('user')->id)->where('orders.created_at',$request->order_date)->join('users', 'orders.user_id', '=', 'users.id')->join('products', 'orders.product_id', '=', 'products.id')->get(['orders.id','orders.order_total_amount', 'orders.product_quantity','orders.address', 'orders.phone', 'orders.created_at', 'products.product_name',]);
        // dd($orders);
        return view('admin.users', compact('orders'));
    }
}
