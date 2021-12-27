<x-admin.layout>
    {{-- Meta tag --}}
    @push('metatag')
        <meta name="description" content="{{ $description }}">
        <meta name="keyword" content="{{ $keyword }}">
        <title>{{ $title }}</title>
    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Breadcrumb --}}
    @push('breadcrumb')
        <div class="mb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
        </div>
    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Css Other --}}
    @push('cssother')

    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Modal --}}
    @push('modals')

    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Script Other --}}
    @push('scriptother')
        <!-- Page level plugins -->
        <script src="{{ asset('assets_admin/vendor/chart.js') }}/Chart.min.js" )}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('assets_admin/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets_admin/js/demo/chart-pie-demo.js') }}"></script>
    @endpush
    {{-- =========================================================================================================== --}}

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="success" title="All Department" amount="{{ $count_department }}"></x-card-border-left>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="info" title="All User" amount="{{ $count_user }}"
                icon="fas fa-user-tie fa-2x text-gray-300"></x-card-border-left>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="danger" title="All Document Group" amount="{{ $count_group }}"
                icon="fas fa-book fa-2x text-gray-300"></x-card-border-left>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="warning" title="All Document" amount="{{ $count_document }}"
                icon="far fa-file-alt fa-2x text-gray-300"></x-card-border-left>
        </div>
  {{--
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="primary" title="All Category" amount="30"
                icon="fas fa-dollar-sign fa-2x text-gray-300"></x-card-border-left>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="secondary" title="All Category" amount="30"
                icon="fas fa-dollar-sign fa-2x text-gray-300"></x-card-border-left>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <x-card-border-left type="dark" title="All Category" amount="30"
                icon="fas fa-dollar-sign fa-2x text-gray-300"></x-card-border-left>
        </div> --}}

    </div>


</x-admin.layout>
