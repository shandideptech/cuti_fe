<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
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
        $admins = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/users');
        
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

        if ($admin->status() == 400){
            return redirect()->back()->withErrors($admin->json())->withInput();
        }

        if ($admin->status() == 500){
            return redirect()->back()->with('error', $admin->json('userMessage'))>withInput();
        }

        return redirect('/admins')->with('success', $admin->json('message'));
    }

    public function edit($id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/users/'.$id);

        return view('Admin.updateAdmin', [
            'admin' => $admin->json('data')
        ]);
    }

    public function update(Request $request, $id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/users/'.$id, $request);

        if ($admin->status() == 400){
            return redirect()->back()->withErrors($admin->json())->withInput();
        }

        if ($admin->status() == 500){
            return redirect()->back()->with('error', $admin->json('userMessage'))->withInput();
        }

        return redirect('/admins')->with('success', $admin->json('message'));
    }

    public function destroy($id){
        $admin = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/users/'.$id);

        return redirect()->back()->with('success', $admin->json('message'));
    }
}
