<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ClockInController extends Controller
{
    public function index(Request $request) {
        $employeeId = $request->get('employeeId');
        $employee = Employee::find($employeeId)? : null;

        return view('employee.schedule-show', [
            'employee' => $employee,
        ]);
    }
}