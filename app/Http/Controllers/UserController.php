<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\SendMail;
use App\Mail\SendMailRegis;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin/admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));

    }

    public function updateProfile(Request $request)
    {

        $rules = [
            'id' => 'required',
            'name' => 'required',
            'avatar'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->avatar = $request->avatar;

        if ($user->save()){
            
            $resp = [
                "message" => "update profile successfully !",
                "data" => (object) null
            ];

            return response()->json($resp, 200);
        }

        $resp = [
            "message" => "update profile failed !",
            "data" => (object) null
        ];

        return response()->json($resp, 400);

    }

    public function register(Request $request)
    {
        return view('user.register');
    }

    public function storeRegister(Request $request){

        $rules = [
            'username' => 'required|unique:users|min:4|max:20',
            'email' => 'required|unique:users',
            'password'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $pin = 123456;

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->pin = $pin;
        
        if ($user->save()) {
            $subject = "Register Success!";
            $url = env('APP_URL','http://localhost:8000').'/register';
            $data = [
                'to' => $request->email,
                'subject' => $subject,
                'data_email' => [
                    'name' => $request->name,
                    'pin' => $pin
                ],
                'view' => 'emails.regSuccess',
            ];

            Mail::to($data['to'])->send(new SendMailRegis($data));

            $response = [
                "message"=>"Success",
                "data"=>(object) null
            ];

            $resp = [
                "message" => "regitration successfully !",
                "data" => (object) null
            ];

            return response()->json($resp, 200);

        }

        $resp = [
            "message" => "regitration failed !",
            "data" => (object) null
        ];

        return response()->json($resp, 400);
    }

}

?>