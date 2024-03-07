<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>PRODUCT CREATE</h1>

    <div >
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>            
            @endforeach
        </ul>
        @endif
    </div>

    <form method = "POST" action = "{{route('store')}}">
        @csrf
        @method('POST')


        <div>
            <input type="text" name = "Name" placeholder="Enter Name"><br>
            <input type="number"  name = "Quantity" placeholder="Enter Quantity"><br>
            <input type="number" name = "Price" placeholder="Enter price"><br>
            <textarea name="Description" cols="30" rows="10" placeholder="Enter description"></textarea>
            <input type="submit" value="submit">
        </div>
    </form>
</body>
</html>


