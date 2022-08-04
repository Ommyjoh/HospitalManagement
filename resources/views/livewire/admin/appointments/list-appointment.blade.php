<div>
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
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('admin.appointments.create') }}"><button class="btn btn-primary"><i class="nav-icon fa fa-plus-circle  mr-2" title="edit"></i> Add New Appointment</button></a>
                </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>                         
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Client name</th>
                            <th scope="col">Date</th>
                            <th scope="col">time</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Emmanuel</td>
                            <td>12/07/2012</td>
                            <td>00:12:34</td>
                            <td>Pending</td>
                            <td>
                                <a href="#" wire:click.prevent = ""> <i class="nav-icon fa fa-edit text-info mr-2" title="edit"></i> </a>
                                <a href="#" wire:click.prevent = ""> <i class="nav-icon fa fa-trash text-danger" title="delete"></i> </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
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
</div>
