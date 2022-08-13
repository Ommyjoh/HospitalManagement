<div>
    <x-loading-indicator></x-loading-indicator>
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 fw-bold text-info">Appointments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Appointments</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('admin.appointments.create') }}"><button class="btn btn-primary"><i class="nav-icon fa fa-plus-circle  mr-2" title="edit"></i> Add New Appointment</button></a>

                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button wire:click = "statusFilter" type="button" class="btn btn-outline-dark {{ is_null($status) ? 'active' : ''}}">All 
                            <span class="badge rounded-pill bg-info">{{ $allAppointments }}</span>
                        </button>
                        <button wire:click = "statusFilter('scheduled')" type="button" class="btn btn-outline-dark {{ ($status == 'scheduled') ? 'active' : '' }}">Scheduled
                            <span class="badge rounded-pill bg-primary">{{ $scheduledAppointments }}</span>
                        </button>
                        <button wire:click = "statusFilter('closed')" type="button" class="btn btn-outline-dark {{ ($status == 'closed') ? 'active' : '' }}">Closed 
                            <span class="badge rounded-pill bg-success">{{ $closedAppointments }}</span>
                        </button>
                    </div>
                </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <thead>                         
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Client name</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Appointment Time</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr class="">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{$appointment->client->name}}</td>
                                    <td class="text-center">{{ $appointment->date}}</td>
                                    <td class="text-center">{{ $appointment->time}}</td>
                                    <td>
                                        @if ($appointment->note == '')
                                        <a href="#" wire:click.prevent = ""> <i class="nav-icon fa fa-eye-slash text-gray mr-2" title="No note"></i> </a>
                                        @else
                                        <a href="#" wire:click.prevent = "showClientNote({{$appointment}})"> <i class="nav-icon fa fa-eye text-info mr-2" title="See note"></i> </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($appointment->status == 'SCHEDULED')
                                            <span class="badge badge-primary">SCHEDULED</span>
                                        @elseif($appointment->status == 'CLOSED')
                                            <span class="badge badge-success">CLOSED</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.appointments.edit', $appointment) }}"> <i class="nav-icon fa fa-edit text-info mr-2" title="edit"></i> </a>
                                        <a href="" wire:click.prevent = "deleteConfirmation({{ $appointment->id}})"> <i class="nav-icon fa fa-trash text-danger" title="delete"></i> </a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{  $appointments->links() }}
                </div>
                <div class="card-footer d-flex justify-content-end">
                </div>
            </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <div class="modal fade" id="showNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form>          
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-info fw-bold" id="exampleModalLabel">Client Note:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                {!! $note !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> <i class="fa fa-times mr-1"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>

<x-delete-confirmation></x-delete-confirmation>

@push('js')
    <script>
        window.addEventListener('showNoteForm', event =>{
            $('#showNote').modal('show');
        });
    </script>
@endpush
