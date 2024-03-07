@extends('layouts.app')
@section('content')

<div class="container mt-5 mb-5 ">
    @if (session('success'))
    <div class="alert">{{session('success')}}</div>
    @endif
    <div class="card  ">
        <div class="card-header">
            <form action="{{route('create.post')}}" class="mr-5" method="POST">
                @csrf
                <div class="input-group m-3">
                    <input type="url" name="link" class="form-control" id="" placeholder="Enter Url">
                    <input type="text" name="Name" class="form-control" id="" placeholder="Enter Name">
                    <button class="btn btn-success ml-3">Get Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">

@endsection


