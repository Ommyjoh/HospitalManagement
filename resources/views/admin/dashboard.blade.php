<x-admin-layout>
    <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
           
            <livewire:admin.dashboard.appointment-count/>

            <livewire:admin.dashboard.users-count/>

            
            <div class="col-lg-3 col-6">
            
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>Activities</p>
                </div>
                <a href="#" class="small-box-footer">All activities <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Trash</p>
                </div>
                <a href="#" class="small-box-footer">All trashies<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            </div>

            <div class="mt-4">
              <h2>Summaries</h2>
            </div>

            <div class="d-flex">

              <div class="info-box mb-3 bg-info mr-2">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
                </div>
                
                </div>

                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="far fa-heart"></i></span>
                  <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
                  </div>
                  
                  </div>
            </div>

            <div class="d-flex">
              <div class="info-box mb-3 mr-2 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
                </div>
                
              </div>

              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
                </div>
                
              </div>

            </div>


        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
</x-admin-layout>