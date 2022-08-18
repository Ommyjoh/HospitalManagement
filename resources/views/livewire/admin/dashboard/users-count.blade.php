<div class="col-lg-3 col-6">
            
    <div class="small-box bg-success">
      <div class="inner">
        <div class="d-flex justify-center justify-content-between">
            <h3 wire:loading.remove>{{ $users }}</h3>
            <div wire:loading>
                <x-animations.appointment-loader/>
            </div>
            <select wire:change="getUsersCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent" class="rounded px-2 mt-2 border-0">
                <option value="TODAY">Today</option>
                <option value="30">30 days</option>
                <option value="60">60 days</option>
                <option value="360">360 days</option>
                <option value="MTD">Month to date</option>
                <option value="YTD">Year to date</option>
            </select>
        </div>
        <p>Users</p>
      </div>
      <a href="{{ route('admin.listUsers')}}" class="small-box-footer">See users <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>