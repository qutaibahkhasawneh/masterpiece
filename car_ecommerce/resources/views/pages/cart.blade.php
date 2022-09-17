@extends('layouts.master')

@section('content')


<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">

                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-total">Total</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-quantity">Update</th>
                                <th class="product-remove">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)


                            <tr class="table-body-row">

                                <td class="product-image"><img style="height: 70px " src="{{asset('PostsImage/'.$item->product_img)}}" alt=""></td>
                                <td class="product-name">{{$item->product_name }}</td>
                                <td class="product-price">{{$item->product_price}} JOD</td>
                                <form  action="{{ route('carts.update', $item->id) }}" method="POST">
                                    <td class="product-total">{{$item->quantity}}</td>
                                    <td class="product-quantity"><input type="number" name="quantity" value="{{ $item->quantity }}"
                                        class="quantity form-control input-number" value="1" min="1" max="100"></td>
                                    @method('PUT')
                                    @csrf
                                    <td class="product-update"><button type="submit"><i style="color: orange" class="fa-solid fa-pencil"></i></td>
                                </form>
                                <td>
                                    <form  method="POST" action="{{ route('carts.destroy', $item->id) }}">
                                        @method("DELETE")
                                        @csrf
                                        <button  type="submit"><i style="color: red" class="fa-solid fa-trash-can"></i></button></td>
                                    </form>
                            </tr>
                            @endforeach
                            {{-- <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="assets/img/products/product-img-2.jpg" alt=""></td>
                                <td class="product-name">Berry</td>
                                <td class="product-price">$70</td>
                                <td class="product-quantity"><input type="number" placeholder="0"></td>
                                <td class="product-total">1</td>
                            </tr> --}}
                            {{-- <tr class="table-body-row">
                                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img src="assets/img/products/product-img-3.jpg" alt=""></td>
                                <td class="product-name">Lemon</td>
                                <td class="product-price">$35</td>
                                <td class="product-quantity"><input type="number" placeholder="0"></td>
                                <td class="product-total">1</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Your order Details</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            {{-- <tr>
                                <td>Product</td>
                                <td>Total</td>
                            </tr> --}}
                            @foreach ($allCart as $item)
                            <tr>



                                <td>{{$item->product_name}}</td>
                                <td>{{$item->sub_total}}JD</td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tbody class="checkout-details">
                            {{-- <tr>
                                <td>Subtotal</td>
                                <td>$190</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>$50</td>
                            </tr> --}}
                            <tr>
                                <td>Total</td>
                                <td>{{$total_price}}JD</td>
                            </tr>

                        </tbody>
                    </table>
                    {{-- <a href="#" class="boxed-btn">Place Order</a> --}}
                    <br>

                    <a class="btn btn-warning" href="{{route('carts.checkout')}}">Check out</a>


                </div>
            </div>

           

                {{-- <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- end cart -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->

@endsection
