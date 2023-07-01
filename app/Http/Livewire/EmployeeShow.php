<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeShow extends Component
{
    public $email, $fullName, $position, $salary, $startDate, $status, $search;

    protected function rules() {
        if(!$this->status){
            $this->status = 0;
        }
        
        return [
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email ],
            'fullName' => 'required|min:6',
            'position' => 'required',
            'salary' => 'required',
            'startDate' => 'required',
            'status' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveEmployee() {
        $validatedData = $this->validate();
        Employee::create($validatedData);
        session()->flash('message', 'New employee has been added!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput() {
        $this->email = '';
        $this->fullName = '';
        $this->position = '';
        $this->salary = '';
        $this->startDate = '';
        $this->status = '0';
    }

    public function render()
    {
        $employees = Employee::where('fullName', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->get();
        
        return view('livewire.employee-show', ['employees' => $employees]);
    }
}