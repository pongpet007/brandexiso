 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
         <div class="sidebar-brand-text mx-3">
             <img src="{{asset("assets_admin/logo.svg")}}" width="200" alt="" class="img-fluid">
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
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>General & Setting</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">General & Setting:</h6>
                 <a class="collapse-item" href="{{ url('Setting') }}">Setting</a>
                 <a class="collapse-item" href="{{ url('Country') }}">Country</a>
                 <a class="collapse-item" href="{{ url('Company') }}">Company</a>
                 <a class="collapse-item" href="{{ url('Menu') }}">Manage Menu</a>
                 <a class="collapse-item" href="{{ url('Content') }}">Manage Content</a>
                 <a class="collapse-item" href="{{ url('Splash') }}">Splash page</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-cog"></i>
             <span>Product & Promotion</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Product & Promotion:</h6>
                 <a class="collapse-item" href="{{ url('Category') }}">Category</a>
                 <a class="collapse-item" href="{{ url('Brand') }}">Brand</a>
                 <a class="collapse-item" href="{{ url('Product') }}">Products</a>
                 <a class="collapse-item" href="{{ url('Promotion') }}">Promotion</a>

             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeture"
             aria-expanded="true" aria-controls="collapseFeture">
             <i class="fas fa-fw fa-cog"></i>
             <span>Feature</span>
         </a>
         <div id="collapseFeture" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Feature:</h6>
                 <a class="collapse-item" href="{{ url('News') }}">News</a>
                 <a class="collapse-item" href="{{ url('Blog') }}">Blog</a>
                 <a class="collapse-item" href="{{ url('Ebook') }}">Ebook & Download</a>
                 <a class="collapse-item" href="{{ url('Gallery') }}">Gallery</a>
                 <a class="collapse-item" href="{{ url('Job') }}">Job</a>
                 <a class="collapse-item" href="{{ url('Slide') }}">Slide</a>
                 <a class="collapse-item" href="{{ url('Youtube') }}">Youtube</a>

             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer"
             aria-expanded="true" aria-controls="collapseCustomer">
             <i class="fas fa-fw fa-cog"></i>
             <span>For Customer</span>
         </a>
         <div id="collapseCustomer" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">For Customer:</h6>
                 <a class="collapse-item" href="{{ url('Subscription') }}">Subscription</a>
                 <a class="collapse-item" href="{{ url('Quotation') }}">Quotation</a>
             </div>
         </div>
     </li>




     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
