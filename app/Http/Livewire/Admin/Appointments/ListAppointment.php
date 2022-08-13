<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class ListAppointment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleted' => 'deleteAppointmentNow'];
    public $note;
    public $appointmentToDelete;
    public $status;
    protected $queryString = ['status'];

    public function showClientNote(Appointment $appointment){
        
        $this->note = $appointment['note'];
        $this->dispatchBrowserEvent('showNoteForm');
    }

    public function mount(){
        $this->note;
    }


    public function deleteConfirmation($appointmentId){
        $this->appointmentToDelete = $appointmentId;
        $this->dispatchBrowserEvent('deleteConfirmationModal');
    }

    public function deleteAppointmentNow(){
        $appointment = Appointment::findOrFail($this->appointmentToDelete);

        $appointment->delete();
        $this->dispatchBrowserEvent('appointmentDeleted', ['message' => 'Appointment Deleted Successfully!']);
    }

    public function statusFilter($status = null){
        $this->resetPage();
        $this->status = $status;
    }
    
    public function render()
    {
        return view('livewire.admin.appointments.list-appointment', [
            'appointments' => Appointment::with('client')
            ->when($this->status, function($query, $status){
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(15),
            'allAppointments' => Appointment::count(),
            'scheduledAppointments' => Appointment::where('status', 'scheduled')->count(),
            'closedAppointments' => Appointment::where('status', 'closed')->count(),
        ]);
    }
}
