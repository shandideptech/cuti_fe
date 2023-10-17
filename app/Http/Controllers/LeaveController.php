<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeaveController extends Controller
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
        $leaves = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves');
        
        return view('Leave.indexLeave', [
            'leaves' => $leaves->json('data')
        ]);
    }

    public function create(){
        return view('Leave.createLeave');
    }

    public function store(Request $request){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->post(env('BE_URL').'/leaves', $request);

        if ($leave->status() == 400){
            return redirect()->back()->withErrors($leave->json())->withInput();
        }

        if ($leave->status() == 500){
            return redirect()->back()->with('error', $leave->json('userMessage'))->withInput();
        }

        return redirect('/leaves')->with('success', $leave->json('message'));
    }

    public function edit($id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves/'.$id);

        return view('Leave.updateLeave', [
            'leave' => $leave->json('data')
        ]);
    }

    public function update(Request $request, $id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/leaves/'.$id, $request);

        if ($leave->status() == 400){
            return redirect()->back()->withErrors($leave->json())->withInput();
        }

        if ($leave->status() == 500){
            return redirect()->back()->with('error', $leave->json('userMessage'))->withInput();
        }

        return redirect('/leaves')->with('success', $leave->json('message'));
    }

    public function destroy($id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/leaves/'.$id);

        return redirect()->back()->with('success', $leave->json('message'));
    }
}
