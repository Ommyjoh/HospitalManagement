<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('backend/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{  asset ('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layouts.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{  asset ('backend/plugins/toastr/toastr.min.js')}}"></script>
<script src="https://unpkg.com/moment"></script>
<script src="{{  asset ('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script>
  $(document).ready(function(){
    toastr.options = {
      "positionClass": "toast-bottom-right",
      "showDuration": "800",
      "progressBar": true,
    }
  });

  window.addEventListener('hideForm', event =>{
    $('#addUserForm').modal('hide');
    toastr.success(event.detail.message, 'Success ☑️')
  })
</script>

<script>
  window.addEventListener('showForm', event =>{
    $('#addUserForm').modal('show');
  })


  window.addEventListener('show-delete-confirmation', event =>{
    $('#deleteConfirmation').modal('show');
  })

  window.addEventListener('hide-delete-confirmation', event =>{
    $('#deleteConfirmation').modal('hide');
    toastr.error(event.detail.message, 'Success ☑️')
  })

  window.addEventListener('success', event =>{
    toastr.success(event.detail.message, 'Success ☑️')
  })
</script>

@stack('js')

@livewireScripts
</body>
</html>
