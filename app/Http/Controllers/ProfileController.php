<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/profile');

        if ($admin->status() == 401){
            return redirect()->route('login');
        }
        
        return view('Profile.updateProfile', [
            'admin' => $admin->json('data')
        ]);
    }

    public function update(Request $request){
        $profile = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/profile', $request);

        if ($profile->status() == 401){
            return redirect()->route('login');
        }

        if ($profile->status() == 400){
            return redirect()->back()->withErrors($profile->json());
        }

        if ($profile->status() == 500){
            return redirect()->back()->with('error', $profile->json('userMessage'));
        }

        return redirect('/profile')->with('success', $profile->json('message'));
    }
}
