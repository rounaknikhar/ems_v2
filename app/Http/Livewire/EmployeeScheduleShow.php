<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmployeeScheduleShow extends Component
{
    public $employee;

    public function render()
    {
        return view('livewire.employee-schedule-show');
    }
}