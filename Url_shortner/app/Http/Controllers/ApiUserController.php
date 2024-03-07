<?php

namespace App\Http\Controllers;

use App\Models\Urls;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ApiUserController extends Controller
{
    public function index ($id){
      $data = User::select('name','email')->findorFail($id);
 
    return response()->json($data,200 );
    }
  
      
    public function List ($id){
    $data = Urls::select('code','link','Name')->findorFail($id);

return response()->json($data,200 );
}

public function Upload(Request $request)
{
              $validator = Validator::make($request->all(),
              ['link' =>'required',
              'Name' => 'required']

              );
              if($validator->fails()){
              return response()->json([
              'status' => false,
              'message' => 'validation error',
              'errors' => $validator->errors()
              ], 401);
              }

              $link = Urls::create([
              'link' => $request->link,
              'Name' => $request->Name,
              'code' => Str::random(6)
              ]);
              return response()->json($link);
    
    
    }




    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
      


