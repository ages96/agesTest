<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin/admin');
    }

    public function sendInvitation(Request $request)
    {

        $subject = "Invitation for register!";
        $url = env('APP_URL','http://localhost/').'register';
        $data = [
            'to' => $request->email,
            'subject' => $subject,
            'data_email' => [
                'name' => $request->name,
                'url' => $url
            ],
            'view' => 'emails.register',
        ];

        Mail::to($data['to'])->send(new SendMail($data));

        $response = [
            "message"=>"Success",
            "data"=>(object) null
        ];

        return response()->json($response, 200);
    }
}
