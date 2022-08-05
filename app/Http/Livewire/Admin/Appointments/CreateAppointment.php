<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $state = [
        'status' => 'SCHEDULED'
    ];

    public function addAppointment(){

        Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED',
        ], [
            'client_id.required' => 'Please select client before proceeding',
            'status.required' => 'Please select status before proceeding'
        ])->validate();

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
