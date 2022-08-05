<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class ListAppointment extends Component
{
    public function render()
    {
        return view('livewire.admin.appointments.list-appointment', [
            'appointments' => Appointment::latest()->paginate()
        ]);
    }
}
