<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('dashboard');

    }
    public function companies(){
        return view('company');
    } 
    public function departments(){
        return 'departments';
    } 
    public function employees(){
        return 'employees';
    }
}
