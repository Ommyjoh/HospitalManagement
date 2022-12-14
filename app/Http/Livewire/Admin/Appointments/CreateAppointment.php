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
            'client_id.required' => 'Please select Client before proceeding',
            'date.required' => 'Please select Date before proceeding',
            'time.required' => 'Please select Time before proceeding',
            'status.required' => 'Please select Status before proceeding',
        ])->validate();

        Appointment::create($this->state);
        $this->dispatchBrowserEvent('success', ['message' => 'Appointment created successfully!']);
        $this->state = [];
    }

    public function render()
    {
        return view('livewire.admin.appointments.create-appointment', [
            'clients' => Client::all()
        ]);
    }
}
