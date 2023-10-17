<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeTakeLeaveController extends Controller
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
        $employee_take_leaves = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employee-take-leaves');
        
        return view('EmployeeTakeLeave.indexEmployeeTakeLeave', [
            'employee_take_leaves' => $employee_take_leaves->json('data')
        ]);
    }

    public function create(){
        $employees = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employees');

        $leaves = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves');

        return view('EmployeeTakeLeave.createEmployeeTakeLeave', [
            'employees' => $employees->json('data'),
            'leaves' => $leaves->json('data'),
        ]);
    }

    public function store(Request $request){
        $employee_take_leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->post(env('BE_URL').'/employee-take-leaves', $request);

        if ($employee_take_leave->status() == 422){
            return redirect()->back()->withErrors($employee_take_leave->json());
        }

        if ($employee_take_leave->status() == 400){
            return redirect()->back()->with('error', $employee_take_leave->json('userMessage'))->withInput();
        }

        if ($employee_take_leave->status() == 500){
            return redirect()->back()->with('error', $employee_take_leave->json('userMessage'));
        }

        return redirect('/employee-take-leaves')->with('success', $employee_take_leave->json('message'));
    }

    public function edit($id){
        $employees = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employees');

        $leaves = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/leaves');

        $employee_take_leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employee-take-leaves/'.$id);

        return view('EmployeeTakeLeave.updateEmployeeTakeLeave', [
            'employee_take_leave' => $employee_take_leave->json('data'),
            'employees' => $employees->json('data'),
            'leaves' => $leaves->json('data'),
        ]);
    }

    public function update(Request $request, $id){
        $employee_take_leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/employee-take-leaves/'.$id, $request);

        if ($employee_take_leave->status() == 400){
            return redirect()->back()->withErrors($employee_take_leave->json());
        }

        if ($employee_take_leave->status() == 500){
            return redirect()->back()->with('error', $employee_take_leave->json('userMessage'));
        }

        return redirect('/employee-take-leaves')->with('success', $employee_take_leave->json('message'));
    }

    public function destroy($id){
        $employee_take_leave = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/employee-take-leaves/'.$id);

        return redirect()->back()->with('success', $employee_take_leave->json('message'));
    }
}
