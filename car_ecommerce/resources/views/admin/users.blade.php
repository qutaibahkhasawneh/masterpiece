@extends('admin.layout')

@section('content')
<h6 class="mb-4"></h6>
    <div class="container">
        <table class="table">
            @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    {{-- <th scope="col">Last Name</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @php
                    $i= 1
                    @endphp
                    @foreach ($customers as $item)
                    <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->name}}</td>
                    {{-- <td>Doe</td> --}}
                    <td>{{$item->email}}</td>
                    <td><a href="{{url('delete_users/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach

                {{-- <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>mark@email.com</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>jacob@email.com</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endsection
