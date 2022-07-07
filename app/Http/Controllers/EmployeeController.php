<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::with('departments.company')->paginate(10);
        $departments = Department::all();
        return view('employee', compact('companies', 'employees', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'employee_number' => $request->employee_number,
            'email' => $request->email,
            'contact' => $request->contact,
            'designation' => $request->designation,
        ]);
        foreach ($request->department_id as $key => $d_ids) {
            $employee->departments()->attach([
                'department_id' => $d_ids
            ]);
        }
        return redirect()->back()->with('status', 'successfully added new employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'name' => $request->name,
            'employee_number' => $request->employee_number,
            'email' => $request->email,
            'contact' => $request->contact,
            'designation' => $request->designation,
        ]);
        $employee->departments()->sync($request->department_id);
        return redirect()->back()->with('status', 'successfully added new employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with('status', 'successfully removed');
    }
}
