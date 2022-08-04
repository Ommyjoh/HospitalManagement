<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Client;
use Livewire\Component;

class CreateAppointment extends Component
{
    public function render()
    {
        return view('livewire.admin.appointments.create-appointment', [
            'clients' => Client::all()
        ]);
    }
}
