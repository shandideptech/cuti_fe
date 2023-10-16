<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(){
        $admins = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/users');

        if ($admins->status() == 401){
            return redirect()->route('login');
        }
        
        return view('Admin.indexAdmin', [
            'admins' => $admins->json('data')
        ]);
    }

    public function create(){
        return view('Admin.createAdmin');
    }

    public function store(Request $request){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->post(env('BE_URL').'/users', $request);

        if ($admin->status() == 401){
            return redirect()->route('login');
        }

        if ($admin->status() == 400){
            return redirect()->back()->withErrors($admin->json());
        }

        if ($admin->status() == 500){
            return redirect()->back()->with('error', $admin->json('userMessage'));
        }

        return redirect('/admins')->with('success', $admin->json('message'));
    }

    public function edit($id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/users/'.$id);

        if ($admin->status() == 401){
            return redirect()->route('login');
        }

        return view('Admin.updateAdmin', [
            'admin' => $admin->json('data')
        ]);
    }

    public function update(Request $request, $id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/users/'.$id, $request);

        if ($admin->status() == 401){
            return redirect()->route('login');
        }

        if ($admin->status() == 400){
            return redirect()->back()->withErrors($admin->json());
        }

        if ($admin->status() == 500){
            return redirect()->back()->with('error', $admin->json('userMessage'));
        }

        return redirect('/admins')->with('success', $admin->json('message'));
    }

    public function destroy($id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/users/'.$id);

        if ($admin->status() == 401){
            return redirect()->route('login');
        }

        return redirect()->back()->with('success', $admin->json('message'));
    }
}
