<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employees');

        if ($employees->status() == 401){
            return redirect()->route('login');
        }
        
        return view('Employee.indexEmployee', [
            'employees' => $employees->json('data')
        ]);
    }

    public function create(){
        return view('Employee.createEmployee');
    }

    public function store(Request $request){
        $employee = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->post(env('BE_URL').'/employees', $request);

        if ($employee->status() == 401){
            return redirect()->route('login');
        }

        if ($employee->status() == 400){
            return redirect()->back()->withErrors($employee->json());
        }

        if ($employee->status() == 500){
            return redirect()->back()->with('error', $employee->json('userMessage'));
        }

        return redirect('/employees')->with('success', $employee->json('message'));
    }

    public function edit(Request $request, $id){
        $employee = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->get(env('BE_URL').'/employees/'.$id);

        if ($employee->status() == 401){
            return redirect()->route('login');
        }

        return view('Employee.updateEmployee', [
            'employee' => $employee->json('data')
        ]);
    }

    public function update(Request $request, $id){
        $employee = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->put(env('BE_URL').'/employees/'.$id, $request);

        if ($employee->status() == 401){
            return redirect()->route('login');
        }

        if ($employee->status() == 400){
            return redirect()->back()->withErrors($employee->json());
        }

        if ($employee->status() == 500){
            return redirect()->back()->with('error', $employee->json('userMessage'));
        }

        return redirect('/employees')->with('success', $employee->json('message'));
    }

    public function destroy($id){
        $employee = Http::withHeaders([
            'Authorization' => 'Bearer '.session('token'),
            'Accept' => 'application/json',
        ])->delete(env('BE_URL').'/employees/'.$id);

        if ($employee->status() == 401){
            return redirect()->route('login');
        }

        return redirect()->back()->with('success', $employee->json('message'));
    }
}
