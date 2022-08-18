<div class="col-lg-3 col-6">
            
    <div class="small-box bg-info">
        <div class="inner">
        <div class="d-flex justify-center justify-content-between">
            <h3 wire:loading.remove>{{ $appointments }}</h3>
            <div wire:loading>
                <x-animations.appointment-loader/>
            </div>
            <select wire:change="getAppointmentCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent" class="rounded px-2 mt-2 border-0">
                <option value="">All</option>
                <option value="scheduled">Scheduled</option>
                <option value="closed">Closed</option>
            </select>
        </div>
        <p>Appointments</p>
        </div>
        <a href="{{route('admin.appointments')}}" class="small-box-footer">View appointments <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>