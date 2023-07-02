<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        return view('employee.index');
    }

    public function clockIn() {
        return view('employee.clock-in');
    }

    public function employeeSchedule(Request $request) {
        $employeeId = $request->get('employeeId');
        $employee = Employee::find($employeeId);
        return view('employee.schedule-show', ['employee' => $employee]);
    }
}