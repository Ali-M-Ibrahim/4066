<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    use ApiResponse;

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
             'password'=>'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token =  $user->createToken('MyApp')->plainTextToken;
            $success['token']= $token;
            $success['name'] =  $user->name;
            return $this->sendResponse("Connected",$success);
        }
        else{
            return $this->sendError('Unauthorised.',[]);
        }

    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required|same:c_password',
            'name'=>'required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin=true;
        $user->save();

        $token = $user->createToken("MyApp")->plainTextToken;
        $success["token"]=$token;
        $success["name"]=$user->name;
        return  $this->sendResponse("registered",$success);
    }
}
