<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.session('token'),
                'Accept' => 'application/json',
            ])->get(env('BE_URL').'/auth/check-authentication');

            if($response->status() == 401){
                return redirect()->route('login');
            }
            
            return $next($request);
        });
    }

    public function index(){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/profile');
        
        return view('Profile.updateProfile', [
            'admin' => $admin->json('data')
        ]);
    }

    public function update(Request $request){
        $profile = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/profile', $request);

        if ($profile->status() == 400){
            return redirect()->back()->withErrors($profile->json());
        }

        if ($profile->status() == 500){
            return redirect()->back()->with('error', $profile->json('userMessage'));
        }

        return redirect('/profile')->with('success', $profile->json('message'));
    }

    public function password(){
        return view('Profile.changePassword');
    }

    public function changePassword(Request $request){
        $profile = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/profile/password', $request);

        if ($profile->status() == 422){
            return redirect()->back()->withErrors($profile->json());
        }

        if ($profile->status() == 400){
            return redirect()->back()->with('error', $profile->json('userMessage'));
        }

        if ($profile->status() == 500){
            return redirect()->back()->with('error', $profile->json('userMessage'));
        }

        return redirect('/profile/password')->with('success', $profile->json('message'));
    }
}
