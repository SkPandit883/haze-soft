<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Library\Message;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\SingleEmployeeResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiController extends Controller
{
    public function companyStore(CompanyRequest $request)
    {
        try {
           $request->validated();
           $companies=Company::create(json_decode($request->validated()));
           return $companies;
        } catch (\Throwable $th) {
            return Message::error($th->getMessage());
        }
    }
    public function employee($employee_id)
    {
        try {
            return Message::success(new SingleEmployeeResource(Employee::with('departments.company')->findOrFail($employee_id)));
        } catch (NotFoundHttpException $th) {
            return Message::error($th->getMessage());
        }
    }
}
