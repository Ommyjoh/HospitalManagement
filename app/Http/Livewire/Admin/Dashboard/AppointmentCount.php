<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentCount extends Component
{
    public $appointments;

    public function mount(){
        $this->getAppointmentCount();
    }

    public function getAppointmentCount($status = null){
        $this->appointments = Appointment::query()
        ->when($status, function($query, $status){
            return $query->where('status', $status);
        })
        ->count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard.appointment-count');
    }
}
