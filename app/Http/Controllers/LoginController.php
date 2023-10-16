<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login.login');
    }

    public function login(Request $request){
        $response = Http::post(env('BE_URL').'/auth/login', $request);
        if ($response->status() == 422){
            return redirect()->back()->withErrors($response->json());
        }
        if ($response->status() == 400){
            return redirect()->back()->with($response->json());
        }
        session(['token' => $response->json('token')]);
        return redirect()->route('employees');
    }
}
