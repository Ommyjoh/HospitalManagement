<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class ListAppointment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        return view('livewire.admin.appointments.list-appointment', [
            'appointments' => Appointment::latest()->paginate(5)
        ]);
    }
}
