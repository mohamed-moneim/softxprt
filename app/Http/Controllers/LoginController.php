<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\AdminOperator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin(){
        return view("login");
    }
    public function login(Request $request)
    {
        $rules = array('email' => 'email',"password"=>"required|min:8");
 
        $validator = Validator::make($request->all(), $rules);
     
        if ($validator->fails())
        {
            return redirect()->to('login')->withErrors($validator);
        }
        if (! $token = Auth::guard('api')->attempt($request->except("_token"))) {
            return redirect()->to('login')->withErrors(["unauthorised"=>"Unauthorized"]);
        }else{
            $adminoperator = AdminOperator::where("email",$request->email)->first();
            $request->session()->push('role', $adminoperator->role);
            $request->session()->push('token', $token);
            return redirect()->to('dashboard');
        
         }
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
