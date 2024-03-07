@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5 ">
        @if (session('success'))
        <div class="alert">{{session('success')}}</div>
        @endif
        <h1 class="text-center">Edit category</h1>
        <div class="card  ">
            
            <div class="card-header">
                <form action="{{url('create/'.$edit->id.'/updated')}}" class="mr-5" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group m-3">                  

                    <table class="table table-bordered text-center" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Short Link</th>
                                <th>Name</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $edit -> id}}</td>
                                    <td><input type="text" value="{{$edit ->link}}" name = "link" placeholder=" Edit link"></td>  
                                    <td><input type="text" value="{{$edit ->Name}}" name = "Name" placeholder=" Edit Name"></td> 
                                    <td>
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </td>
                                    
                                </tr>
                         
                        </tbody>
                        </table>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    @endsection
