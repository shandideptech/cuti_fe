<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function logout(){
        $logout = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/logout');

        if ($logout->status() == 401){
            return redirect()->route('login');
        }
        if ($logout->status() == 400){
            return redirect()->back()->with('error', $logout->json('message'));
        }

        Session::flush();
        return redirect()->route('login');
    }
}
