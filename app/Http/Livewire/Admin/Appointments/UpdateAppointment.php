<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class UpdateAppointment extends Component
{
    public $state = [];
    public $appointment;

    public function mount(Appointment $appointment){

        $this->state = $appointment->toArray();
        $this->appointment = $appointment;
    }

    public function updateAppointment(){

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

        $this->appointment->update($this->state); 
        $this->dispatchBrowserEvent('success', ['message' => 'Appointment updated successfully!']);

    }
    public function render()
    {
        return view('livewire.admin.appointments.update-appointment',[
            'clients' => Client::all()
        ]);
    }
}
