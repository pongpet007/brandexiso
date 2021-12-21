 @php
      $secment1 =  strtolower(request()->segment(1));
 @endphp
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
         <div class="sidebar-brand-text mx-3">
             <img src="{{ asset('assets_admin/logo.svg') }}" width="200" alt="" class="img-fluid">
         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('home') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>


     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link {{ ($secment1=='document')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
             aria-controls="collapseOne">
             <i class="fas fa-fw fa-cog"></i>
             <span>User & Department</span>
         </a>
         <div id="collapseOne" class="collapse  {{ ($secment1=='document')?'show':'' }}" aria-labelledby="headingOne" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">User & Department:</h6>
                 <a class="collapse-item" href="{{ url('User') }}">User</a>
                 <a class="collapse-item" href="{{ url('Department') }}">Department</a>
                 <a class="collapse-item" href="{{ url('DocumentGroup') }}">Document Group</a>
             </div>
         </div>
     </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link {{ ($secment1=='User'|$secment1=='Department')?'':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>ISO Document</span>
        </a>
        <div id="collapseTwo" class="collapse  {{ ($secment1=='User'|$secment1=='Department')?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ISO Document:</h6>
                <a class="collapse-item" href="{{ url('User') }}">Document</a>
            </div>
        </div>
    </li>


     <li class="nav-item my-5">
         <form method="POST" action="{{ route('logout') }}">
             @csrf
             <x-jet-dropdown-link href="{{ route('logout') }}" style="color:white !important" onclick="event.preventDefault();
                            this.closest('form').submit();">
                 <i class="fas fa-sign-out-alt"></i>
                 <span class="ml-1">logout</span>
             </x-jet-dropdown-link>
         </form>
     </li>




     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
