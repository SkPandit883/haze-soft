@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">

        <div
            class="bg-white px-3 py-5 m-4 shadow-md rounded-md grid lg:grid-cols-5 xl:grid-cols-5 md:grid-cols-5 grid-cols-2 gap-10 ">

            <div class="bg-blue-50 px-6 py-3 border-[1px] border-blue-300 rounded-lg shadow-lg">
                <h2 class="text-md capitalize font-bold text-[#696cff]">Companies</h2>
                <h2>{{ $company }}</h2>
            </div>
            <div class="bg-blue-50 px-6 py-3 border-[1px] border-blue-300 rounded-lg shadow-lg">
                <h2 class="text-md capitalize font-bold text-[#696cff]">Departments</h2>
                <h2>{{ $department }}</h2>
            </div>
            <div class="bg-blue-50 px-6 py-3 border-[1px] border-blue-300 rounded-lg shadow-lg">
                <h2 class="text-md capitalize font-bold text-[#696cff]">Employees</h2>
                <h2>{{ $employee }}</h2>
            </div>
        </div>
    </div>
@endsection
