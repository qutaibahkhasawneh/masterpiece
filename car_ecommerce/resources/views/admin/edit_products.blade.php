@extends('admin.layout')

@section('content')

<div class="container" style="margin-top: 50px">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-md-12">

            {{-- <h2>Add products</h2> --}}
            <form method="POST" action="{{url('update_products')}}" enctype="multipart/form-data">

            @csrf
            <input name="id" type="hidden" value="{{$product->id}}">
            <br>
            <div class="form-group">
                <label for="formGroupExampleInput">Product name</label>
                <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" placeholder="Product name">
              </div><br>
              <div class="md-3">
                <label class="from-label">Category product </label>
                <select name='category_id' class="form-select" aria-label="Default select example">

                    <option  selected>{{$product->category_name}}</option>
                    @foreach ($category as $item)

                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach


                  </select>
            </div>
            <div class="form-group"><br>
                <label for="exampleFormControlTextarea1">Product description</label>
                <textarea type="text" class="form-control"  name="product_description" value="{{$product->product_description}}" placeholder="" rows="3">{{$product->product_description}}</textarea>
              </div><br>

              <div class="form-group">
                <label for="formGroupExampleInput2">Product price</label>
                <input type="number" class="form-control" name="product_price" value="{{$product->product_price}}" placeholder="Product price">
              </div>

              <div class="form-group"><br>
                <label for="formGroupExampleInput2">Product image</label>
                <input type="file" class="form-control" name="product_img" value="{{$product->product_img}}" placeholder="Product image">
              </div><br>

            <button class="btn btn-warning" type="submit">Update</button>
            <a href="{{url('add_product')}}" class="btn btn-dark">Back</a>
            </form><br>

        </div>
    </div>
</div>


@endsection
