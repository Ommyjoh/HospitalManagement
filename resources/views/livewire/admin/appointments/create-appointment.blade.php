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
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row col-lg-6">
                                        <label for="Name">Client Name:</label>
                                        <select wire:model.defer="state.client_id" class="form-select @error('client_id') is-invalid @enderror" aria-label="Default select example">
                                                    <option selected>Select Name...</option>
                                             @foreach ($clients as $client)
                                                    <option value="{{ $client->id}}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="row col-lg-6">
                                            <label for="date">Appointment Date:</label>
                                                <div wire:ignore class="input-group date" id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                    <input id="appointmentDateInput" type="text" class="form-control datetimepicker-input" data-target="#appointmentDate"/>
                                                    <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                        <div class="input-group-text bg-info bg-gradient"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row col-lg-6">
                                            <label for="date">Appointment Time:</label>
                                                <div wire:ignore class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime = "@this">
                                                    <input id="appointmentTimeInput" type="text" class="form-control datetimepicker-input" data-target="#appointmentTime"/>
                                                    <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                        <div class="input-group-text bg-info bg-gradient"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row col-lg-12 mt-2">
                                        <div wire:ignore class="form-group">
                                            <label for="Name">Note:</label>
                                            <textarea id="note" data-note="@this" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="row col-lg-6">
                                        <label for="status">Status:</label>
                                        <select wire:model.defer="state.status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example">
                                                    <option value=" " selected>Select Status...</option>
                                                    <option value="SCHEDULED">Scheduled</option>
                                                    <option value="CLOSED">Closed</option>
                                        </select>
                                        @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i><a href="{{ route('admin.appointments') }}" class="text-white">Cancel</a></button>
                                        <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save appointment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @push('js')

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

        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                    .create( document.querySelector( '#note' ) )
                    .then( editor => {
                            document.querySelector('#submit').addEventListener('click', () => {
                                let note = $('#note').data('note');
                                eval(note).set('state.note', editor.getData());
                            });
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
        </script>
    @endpush
</div>