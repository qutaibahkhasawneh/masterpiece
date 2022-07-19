@extends('layouts.master')

@section('content')

<div class="container" style="padding:8%;margin-top:100px">
    <form action="{{url('updateprofile')}}" method="POST" enctype="multipart/form-data">
        {{-- @method('PUT') --}}
        @method('POST')
        @csrf
        @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
        <input type="hidden" name="id" value="{{$data->id}}">
    <div class="form-group ">
      <label for="exampleFormControlInput1">Address:</label>
      <input type="text" name="address" value="{{$data->address}}" class="form-control" required >
    </div>

    <div class="form-group ">
      <label for="exampleFormControlInput1">Email:</label>
      <input type="email" name="email" value="{{$data->email}}" class="form-control" required >
    </div>


    <div class="form-group ">


    </div>
    <div class="form-group ">
      <label for="exampleFormControlInput1">Phone Number:</label>
      <input type="number" name="phone" value="{{$data->phone}}" class="form-control" required >
    </div>

    {{-- <div class="form-group">
        <label for="exampleFormControlFile1">Profile Photo</label>
        <input type='file' name="logo" class="form-control-file" >
      </div>
    <div class="form-group">

        <input type='hidden' name="hiddenlogo" value="" class="form-control-file" >
      </div> --}}


      <div class="form-group">
        <button type="submit" class="btn btn-warning">Update</button>
        <a  href="{{url('profile')}}" class="btn btn-warning">Back</a>
      </div>
  </form>
</div>
<br><br><br>

<style>

    body{
        background: #fdfbfb;
        margin-top:200px;
        color: gray;
    }
    #sticker-sticky-wrapper{
        background-color: #051922;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    .me-2 {
        margin-right: .5rem!important;
    }
    </style>

@endsection
