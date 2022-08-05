<div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 fw-bold text-info"> Create Appointment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.appointments') }}">Appointments</a></li>
                    <li class="breadcrumb-item active"> Create Appointments</li>
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
                        <form wire:submit.prevent="addAppointment">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row col-lg-6">
                                        <label for="Name">Name</label>
                                        <select wire:model.defer="state.client_id" class="form-select" aria-label="Default select example">
                                                    <option selected>Select Name...</option>
                                             @foreach ($clients as $client)
                                                    <option value="{{ $client->id}}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="row col-lg-6">
                                            <label for="date">Date</label>
                                                <div wire:ignore class="input-group date" id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                    <input id="appointmentDateInput" type="text" class="form-control datetimepicker-input" data-target="#appointmentDate"/>
                                                    <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row col-lg-6">
                                            <label for="date">Time</label>
                                                <div wire:ignore class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime = "@this">
                                                    <input id="appointmentTimeInput" type="text" class="form-control datetimepicker-input" data-target="#appointmentTime"/>
                                                    <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row col-lg-12 mt-2">
                                        <label for="Name">Note</label>
                                        <textarea wire:model.defer='state.note' class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i><a href="{{ route('admin.appointments') }}" class="text-white">Cancel</a></button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save appointment</button>
                                      </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @push('dateJs')

        <script>
            // script for date picker
            $(document).ready(function() {
              $('#appointmentDate').datetimepicker({
                format: 'L',
            });
          
            $('#appointmentDate').on("change.datetimepicker", function(e) {
              let date = $(this).data('appointmentdate');
              eval(date).set('state.date', $('#appointmentDateInput').val());
            });
          
          
            // script for time picker
            $('#appointmentTime').datetimepicker({
                format: 'LT',
            });
          
            $('#appointmentTime').on("change.datetimepicker", function(e) {
              let time = $(this).data('appointmenttime');
              eval(time).set('state.time', $('#appointmentTimeInput').val());
            });
          
            });  
        </script>
    @endpush
</div>