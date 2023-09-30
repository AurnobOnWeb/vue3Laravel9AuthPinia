<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request){

        $validator = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_pass' => 'required|same:password'

        ]);


        if($validator->fails()){
            $response =[
                'success' =>false,
                'message' => $validator->errors()
            ];
            return response()->json($response ,400);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response  =[
            'success' =>true,
            'data' =>$success,
            'message' => 'user register successfully'
        ];

        return response()->json($response ,200);
    }


    public function login (Request $request){


        if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
    
            $response  =[
                'success' =>true,
                'data' =>$success,
                'message' => 'user Login successfully'
            ];
            return response()->json($response ,200);
        }else{
            $response =[
                'success' =>false,
                'message' => 'UnAuthorized'
            ];
            return response()->json($response ,400);
        }
    }
}
