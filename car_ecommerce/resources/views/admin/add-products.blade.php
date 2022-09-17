@extends('admin.layout')

@section('content')


<div>
    <h6 class="mb-4"></h6>
        <div class="container">
            <table class="table">
                <thead>
                    @php
                    $i= 1;
                    @endphp

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col"> Price</th>
                        <th scope="col"> Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
<tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->product_name}}</td>
                        <td>{{substr($item->product_description,0,20)}}</td>
                        <td>{{$item->product_price}}</td>
                        <td><img src="{{asset('PostsImage/'.$item->product_img)}}" alt=""  style="height: 70px"></td></td>
                        <td><a href="{{url('edit_products/'.$item->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{url('delete_products/'.$item->id)}}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>

    <a style="margin-left: 995px" href="{{url('create')}}" class="btn btn-warning">Add product</a><br><br>


@endsection
