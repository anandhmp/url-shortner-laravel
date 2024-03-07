<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
            return view('products.index');
        }

    public Function create(){
        return view('products.create');
    }    

public function store(Request $request) {
    // Validate the incoming request data
    $data = $request->validate([
        'Name' => 'required|string',
        'Quantity' => 'required|numeric',
        'Price' => 'required|numeric',
        'Description' => 'string'
    ]);

    $input ['Name'] = $request->Name;
    $input ['Quantity'] = $request->Quantity;
    $input ['Price'] = $request->Price;
    $input ['Description'] = $request->Description;
   
    
    Product::create($input);
        
 
    // Redirect the user to another route (change 'store' to your desired route name)
    return redirect(route('Product'));
}

}
?>



