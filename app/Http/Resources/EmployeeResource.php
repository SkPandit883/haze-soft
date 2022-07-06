<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'employees';
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'employee_number' => $this->employee_number,
            'email' => $this->email,
            'contact' => $this->contact,
            'designation' => $this->designation,
            'departments' => DepartmentResource::collection($this->whenLoaded('departments'))
        ];
    }
}
