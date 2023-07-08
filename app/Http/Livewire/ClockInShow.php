<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\ClockIn;
use Livewire\WithPagination;
use DateTime;

class ClockInShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $clockIn, $clockOut, $clockInId, $employeeId;

    protected $queryString = ['employeeId'];

    public function render()
    {
        $this->clockIn = date('Y-m-d H:i:s');
        $this->clockOut = date('Y-m-d H:i:s');
        
        $clockIns = ClockIn::where('employeeId', $this->employeeId)?->orderBy(
            'id', 'DESC')->paginate(10);
        
        return view('livewire.clock-in-show', [
            'clockIns' => $clockIns,
            'employeeId' => $this->employeeId,
        ]);
    }

    public function saveClockIn() {
        ClockIn::where('employeeId', $this->employeeId)->create([
            'regEntry' => date('Y-m-d H:i:s'),
            'employeeId' => $this->employeeId
        ])->firstOrFail();
        session()->flash('message', 'Clocking in has been registered!');
    }

    public function saveClockOut(int $clockInId) {
        $dt = new DateTime();
        ClockIn::where('id', $clockInId)->update([
            'regExit' => $dt->format('Y-m-d H:i:s'),
        ]);
        session()->flash('message', 'Clocking out has been registered!');
    }
}