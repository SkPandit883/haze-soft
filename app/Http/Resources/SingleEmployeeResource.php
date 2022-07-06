<?php

namespace App\Http\Resources;

use App\Http\Resources\CompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'employee_number'=>$this->employee_number,
            'email'=>$this->email,
            'contact'=>$this->contact,
            'designation'=>$this->designation,
            'company'=>new CompanyResource($this->departments[0]->company),
            'departments'=>SingleEmpoyeeDepartmentResource::collection($this->whenLoaded('departments'))
        ];
    }
}
