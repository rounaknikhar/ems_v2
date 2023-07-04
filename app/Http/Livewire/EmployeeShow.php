<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeeShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $email, $fullName, $position, $salary, $startDate, $status, $search, $orderBy, $employeeId;

    protected function rules() {
        if(!$this->status){
            $this->status = 0;
        }
        
        return [
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
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

    public function updateEmployee() {
        $validatedData = $this->validate();
        Employee::where('id', $this->employeeId)->update([
            'email' => $validatedData['email'],
            'fullName' => $validatedData['fullName'],
            'position' => $validatedData['position'],
            'salary' => $validatedData['salary'],
            'startDate' => $validatedData['startDate'],
            'status' => $validatedData['status'],
        ]);

        session()->flash('message', 'Employee data has been updated!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editEmployee(int $employeeId) {
        $employee = Employee::find($employeeId);
        if($employee) {
            $this->employeeId = $employee->id;
            $this->email = $employee->email;
            $this->fullName = $employee->fullName;
            $this->position = $employee->position;
            $this->salary = $employee->salary;
            $this->startDate = $employee->startDate;
            $this->status = $employee->status;
        } else {
            redirect()->to('/employees');
        }
    }

    public function deleteEmployee(int $employeeId) {
        $this->employeeId = $employeeId;
    }

    public function confirmDeleteEmployee() {
        Employee::find($this->employeeId)->delete();
        session()->flash('message', 'Employee data has been deleted!');
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

    public function closeModal() {
        $this->resetInput();
    }

    public function render()
    {
        $employees = Employee::where(
            'fullName', 'like', '%'.$this->search.'%'
            )->orWhere(
                'email', 'like', '%'.$this->search.'%'
                )->orderBy(
                    'id', $this->orderBy?: 'DESC'
                    )->paginate(10);
        
        return view('livewire.employee-show', [
            'employees' => $employees
        ]);
    }
}