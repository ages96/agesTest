<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin/admin');
    }

    public function login(Request $request)
    {

    }

    public function updateProfile(Request $request)
    {

    }

    public function register(Request $request)
    {

        $user = new User;
        $user->username = ;
        $user->password = ;
        
        if ($user->save()) {

        }

        return response()->json($response, 200);
    }

}
