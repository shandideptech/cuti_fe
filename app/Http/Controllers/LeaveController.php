<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeaveController extends Controller
{
    public function index(){
        $leaves = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves');

        if ($leaves->status() == 401){
            return redirect()->route('login');
        }
        
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

        if ($leave->status() == 401){
            return redirect()->route('login');
        }

        if ($leave->status() == 400){
            return redirect()->back()->withErrors($leave->json());
        }

        if ($leave->status() == 500){
            return redirect()->back()->with('error', $leave->json('userMessage'));
        }

        return redirect('/leaves')->with('success', $leave->json('message'));
    }

    public function edit($id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves/'.$id);

        if ($leave->status() == 401){
            return redirect()->route('login');
        }

        return view('Leave.updateLeave', [
            'leave' => $leave->json('data')
        ]);
    }

    public function update(Request $request, $id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/leaves/'.$id, $request);

        if ($leave->status() == 401){
            return redirect()->route('login');
        }

        if ($leave->status() == 400){
            return redirect()->back()->withErrors($leave->json());
        }

        if ($leave->status() == 500){
            return redirect()->back()->with('error', $leave->json('userMessage'));
        }

        return redirect('/leaves')->with('success', $leave->json('message'));
    }

    public function destroy($id){
        $leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/leaves/'.$id);

        if ($leave->status() == 401){
            return redirect()->route('login');
        }

        return redirect()->back()->with('success', $leave->json('message'));
    }
}
