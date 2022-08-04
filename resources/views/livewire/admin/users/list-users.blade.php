<div>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 fw-bold text-info">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end mb-2">
                <button wire:click.prevent="addNewUserForm" class="btn btn-primary"><i class="nav-icon fa fa-plus-circle  mr-2" title="edit"></i> Add New User</button>
            </div>
          <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>                         
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="#" wire:click.prevent = "editUserForm({{ $user }})"> <i class="nav-icon fa fa-edit text-info mr-2" title="edit"></i> </a>
                            <a href="#" wire:click.prevent = "showConfirmation({{ $user->id }})"> <i class="nav-icon fa fa-trash text-danger" title="delete"></i> </a>
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                {{  $users->links() }}
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  
  <!-- Modal -->
  <div class="modal fade" id="addUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <form wire:submit.prevent = "{{ $showEditModal ? 'editUser' : 'addUser' }}">          
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-info fw-bold" id="exampleModalLabel">
                    @if ($showEditModal)
                        <span> Edit User 🤵</span>
                    @else
                        <span> Add User 🤵</span>
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model.defer='state.name' class="form-control text-info @error('name') is-invalid @enderror" id="name" aria-describedby="namelHelp" placeholder="Enter Full Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" wire:model.defer='state.email' class="form-control text-info @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email address">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        @if ($showEditModal == FALSE)
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" wire:model.defer='state.password' class="form-control text-info @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="PasswordConfirmation" class="form-label">Password</label>
                                <input type="password" wire:model.defer='state.password_confirmation' class="form-control text-info" id="PasswordConfirmation" placeholder="Confirm Password">
                            </div>                            
                        @endif
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> <i class="fa fa-times mr-1"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                    @if ($showEditModal)
                        <span>Save Changes</span>
                    @else
                        <span>Save User</span> 
                    @endif
                </button>
                </div>
            </div>
        </form>
    </div>
  </div>

<!-- deleteConfirmation Modal -->
  <div class="modal fade" id="deleteConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-danger fw-bold" id="exampleModalLabel">Delete User 🚮</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-danger">Are You Sure You Want To Delete This User? </h5>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> <i class="fa fa-times mr-1"></i> Cancel</button>
                <button wire:click.prevent="deleteUser" type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete User</button>
                </div>
            </div>
    </div>
  </div>

</div>