@extends('layouts.app')
@section('content')

    <div class="container mt-5 mb-5">
        @if (session('success'))
        <div class="alert bg-success color-white">{{session('success')}}</div>
        @endif
        <div class="card " >
            <div class="card-header">
                <form action="{{route('create.post')}} "  method="POST">
                    @csrf
                    <div class="input-group m-3">
                        <input type="url" name="link" class="form-control" id="" placeholder="Enter Url">
                        <input type="text" name="Name" class="form-control" id="" placeholder="Enter Name">
                        <button class="btn btn-success ml-3">Get Link</button>
                    </div>

                    <table class="table table-bordered text-center" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Short Link</th>
                                <th>Link</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($takenUrls as $row)
                                <tr>
                                    <td>{{ $row -> id}}</td>
                                    <td><a href="{{ route('stores',$row -> code)}}" target = "_blank">{{ route('stores',$row -> code)}}</a></td>
                                    <td>{{$row->link}}</td>
                                    <td>{{ $row ->Name}}</td>
                                    <td>
                                        <a href="{{url('create/'.$row ->id.'/edit')}}" class = "btn btn-info">Edit</a>
                                        <a href="{{url('create/'.$row->id.'/delete')}}"  onclick="return confirm('Are you sure')" class = "btn btn-danger">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    
                </form>
            </div>
        </div>
    @endsection