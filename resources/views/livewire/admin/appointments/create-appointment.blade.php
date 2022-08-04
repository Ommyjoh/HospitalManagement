<div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 fw-bold text-info"> Create Appointments</h1>
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
                        <form >
                            <div class="card">
                                <div class="card-body">
                                    <div class="row col-lg-6">
                                        <label for="Name">Name</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select Name...</option>
                                            <option value="1">Emmanuel Boshe</option>
                                            <option value="2">Sajjad Tuli</option>
                                            <option value="3">Peter Gerald</option>
                                        </select>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="row col-lg-6">
                                            <label for="date">Date</label>
                                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row col-lg-6">
                                            <label for="date">Time</label>
                                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row col-lg-12 mt-2">
                                        <label for="Name">Name</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary">Save appointment</button>
                                      </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</div>