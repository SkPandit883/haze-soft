<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\Company;
use App\Library\Message;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\SingleEmployeeResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiController extends Controller
{
    protected $per_page;
    public function __construct(Request $request)
    {
        $this->per_page = $request->per_page ?: 10;
    }

    public function companies()
    {
        try {
            return Message::success(CompanyResource::collection(Company::all()));
        } catch (Throwable $th) {
            return Message::error($th->getMessage());
        }
    }

    public function departments($company_id)
    {
        try {
            return Message::success(DepartmentResource::collection(Department::where('company_id', $company_id)->paginate($this->per_page))->response()->getData(), 'departments');
        } catch (Throwable $th) {
            return Message::error($th->getMessage());
        }
    }
    public function companyEmployees($company_id)
    {
        try {
            return Message::success(EmployeeResource::collection(Employee::whereRelation('departments', 'company_id', $company_id)->paginate($this->per_page))->response()->getData(), 'employees');
        } catch (NotFoundHttpException $e) {
            return Message::error($e->getMessage());
        }
    }
    public function departmentEmployees($department_id)
    {
        try {
            $employees = Employee::whereHas('departments', function ($query) use ($department_id) {
                $query->where('departments.id', $department_id);
            })->paginate($this->per_page);
            return Message::success(EmployeeResource::collection($employees)->response()->getData(), 'employees');
        } catch (NotFoundHttpException $e) {
            return Message::error($e->getMessage());
        }
    }
    public function employee($employee_id)
    {
        try {
            return Message::success(new SingleEmployeeResource(Employee::with('departments.company')->findOrFail($employee_id)));
        } catch (NotFoundHttpException $e) {
            return Message::error($e->getMessage());
        }
    }
}
