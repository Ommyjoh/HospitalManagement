<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $state = [];

    public function addAppointment(){
        //validation
        $this->state['status'] = 'Pending';
        Appointment::create($this->state);
        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment created successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.appointments.create-appointment', [
            'clients' => Client::all()
        ]);
    }
}
