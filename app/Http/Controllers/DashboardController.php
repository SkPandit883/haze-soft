<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $company=Company::count();
        $department=Department::count();
        $employee=Employee::count();
        return view('dashboard',compact('company','department','employee'));

    }
   
}
