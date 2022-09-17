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
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->category_name}}</td>
                    <td><img src="{{asset('PostsImage/'.$item->category_img)}}" alt="" height="50px" style="width: 70px"></td></td>
                    <td><a href="{{url('edit_categories/'.$item->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{url('delete_categories/'.$item->id)}}" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

    <div>
    <button style="margin-left: 870px" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Category
      </button>
    </div>

      <!-- Modal -->
      <div class="container">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{'admin_c'}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">

                    <input type="text" placeholder="Enter Category Name" class="form-control" name="category_name">
                </div>
                <div class="mb-2">
                    <input type="file" placeholder="Enter Category Image" class="form-control" name="category_img">
                </div>
                <button type="submit" class="btn btn-info">Add Category</button>
              </form>
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}

            </div>
          </div>
        </div>
      </div>
      </div>
@endsection
