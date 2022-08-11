@extends('layouts.master')

@section('content')


<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
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
                                <td class="product-price">${{$item->product_price}}</td>
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
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>$500</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>$45</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>$545</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <form  action="{{ route('carts.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="cart-buttons">
                        <input type="submit" name="update" value="Update cart" >
                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                        class="quantity form-control input-number" value="1" min="1" max="100">
                    </form> --}}
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
