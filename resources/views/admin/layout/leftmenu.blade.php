 @php
     $secment1 = strtolower(request()->segment(1));
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
     @if (Auth::user()->level == 5)
         <li class="nav-item active">
             <a class="nav-link" href="{{ route('home') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link {{ $secment1 == 'user' || $secment1 == 'department' || $secment1 == 'documentgroup' || $secment1 == 'userdocumentgroup' ? '' : 'collapsed' }}"
                 href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                 aria-controls="collapseOne">
                 <i class="fas fa-fw fa-cog"></i>
                 <span>Manage Access</span>
             </a>
             <div id="collapseOne"
                 class="collapse  {{ $secment1 == 'user' || $secment1 == 'department' || $secment1 == 'documentgroup' || $secment1 == 'userdocumentgroup' ? 'show' : '' }}"
                 aria-labelledby="headingOne" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Master record:</h6>
                     <a class="collapse-item" href="{{ url('User') }}">User </a>
                     {{-- <a class="collapse-item" href="{{ url('Department') }}">Department</a> --}}
                     <a class="collapse-item" href="{{ url('DocumentGroup') }}">Document Group</a>
                     <a class="collapse-item" href="{{ url('UserDocumentGroup') }}">User & Document Group</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{ $secment1 == 'archive' || $secment1 == 'archivelist' ? '' : 'collapsed' }}"
                 href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                 aria-controls="collapseThree">
                 <i class="fas fa-fw fa-cog"></i>
                 <span>Archive Document</span>
             </a>
             <div id="collapseThree"
                 class="collapse  {{ $secment1 == 'archive' || $secment1 == 'archivelist' ? 'show' : '' }}"
                 aria-labelledby="headingThree" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Archive Document:</h6>
                     @foreach ($menugroups2 as $item)
                         <a class="collapse-item"
                             href="{{ url("archivelist/$item->doc_group_id") }}">{{ $item->group_name }} <span
                                 style="color:red">({{ $item->ct }})</span></a>
                         @foreach ($item->sub as $sub)
                             <a class="collapse-item" href="{{ url("archivelist/$sub->doc_group_id") }}">
                                 &nbsp;&nbsp;-
                                 {{ $sub->group_name }} <span style="color:red">({{ $sub->ct }})</span></a>
                             @foreach ($sub->sub2 as $sub2)
                                 <a class="collapse-item"
                                     href="{{ url("archivelist/$sub2->doc_group_id") }}">&nbsp;&nbsp;&nbsp;&nbsp;--
                                     {{ $sub2->group_name }} <span style="color:red">({{ $sub2->ct }})</span></a>
                             @endforeach
                         @endforeach
                     @endforeach
                 </div>
             </div>
         </li>

     @endif

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link {{ $secment1 == 'document' || $secment1 == 'documentlist' ? '' : 'collapsed' }}"
             href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>ISO Document</span>
         </a>
         <div id="collapseTwo"
             class="collapse  {{ $secment1 == 'document' || $secment1 == 'documentlist' ? 'show' : '' }}"
             aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">ISO Document:</h6>
                 @foreach ($menugroups as $item)
                     <a class="collapse-item" href="#">{{ $item->group_name }} </a>
                     <!-- <a class="collapse-item"
                         href="{{ url("documentlist/$item->doc_group_id") }}">{{ $item->group_name }} </a> -->
                     @foreach ($item->sub as $sub)
                         <a class="collapse-item" href="{{ url("documentlist/$sub->doc_group_id") }}"> &nbsp;&nbsp;-
                             {{ $sub->group_name }} <span style="color:red">({{ $sub->ct }})</span></a>
                         @foreach ($sub->sub2 as $sub2)
                             <a class="collapse-item"
                                 href="{{ url("documentlist/$sub2->doc_group_id") }}">&nbsp;&nbsp;&nbsp;&nbsp;--
                                 {{ $sub2->group_name }} <span style="color:red">({{ $sub2->ct }})</span></a>
                         @endforeach
                     @endforeach
                 @endforeach
             </div>
         </div>
     </li>




     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link {{ $secment1 == 'form-request' || $secment1 == 'form-request-list' ? '' : 'collapsed' }}"
             href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true"
             aria-controls="collapse5">
             <i class="fas fa-fw fa-cog"></i>
             <span>ฟอร์ม การทำงาน</span>
         </a>
         <div id="collapse5"
             class="collapse  {{ $secment1 == 'form-request' || $secment1 == 'form-request-list' ? 'show' : '' }}"
             aria-labelledby="headingOne" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">FORM DOCUMENT:</h6>
                 <a class="collapse-item" href="{{ url('form-request') }}">ใบร้องขอดำเนินการเรื่องเอกสาร </a>
                 @if (strtolower(Auth::user()->position) == 'qmr')
                 <a class="collapse-item" href="{{ url('form-request-list/2') }}">ฟอร์ม รอการอนุมัติ <span
                         class="text-danger">({{ $approve2 }})</span></a>
                @endif
                 <a class="collapse-item" href="{{ url('form-request-list/1') }}">ฟอร์ม อนุมัติแล้ว <span
                         class="text-danger">({{ $approve1 }})</span></a>
                 <a class="collapse-item" href="{{ url('form-request-list/3') }}">ฟอร์ม ไม่อนุมัติ <span
                         class="text-danger">({{ $approve3 }})</span></a>

             </div>
         </div>
     </li>

     <li class="nav-item">
         <form method="POST" action="{{ route('logout') }}">
             @csrf
             <x-jet-dropdown-link class="nav-link" href="{{ route('logout') }}" style="color:white !important"
                 onclick="event.preventDefault();
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
