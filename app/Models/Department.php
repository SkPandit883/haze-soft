<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }
}
