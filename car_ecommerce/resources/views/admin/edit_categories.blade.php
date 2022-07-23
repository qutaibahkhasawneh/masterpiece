@extends('admin.layout')

@section('content')

<div class="col-md-a m-auto border mt-3 border-info">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <h2 class="text-center text-warning">Update categories</h2>
    <form action="{{url('update_categories')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('Post') --}}
        <input type="hidden" name="id" value="{{$category->id}}">

        <div class="mb-2">
            <label for="">Category name</label>
            <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control">
        </div>

        <div class="mb-2">
            <label for="">Category image</label>
            <input type="file" name="category_img" value="{{$category->category_img}}" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-info">Update</button>
        <a href="{{url('admin_c')}}" class="btn btn-info">Back</a>
    </form>

</div>

@endsection
