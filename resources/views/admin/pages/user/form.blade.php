<x-admin.layout>
    {{-- Meta tag --}}
    @push('metatag')
        <meta name="description" content="">
        <meta name="author" content="">
        <title></title>
    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Breadcrumb --}}
    @push('breadcrumb')
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Department {{ $method }} </li>
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

    @endpush
    {{-- =========================================================================================================== --}}

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ strtolower($method)=='add'?url('Department'):url("Department/$department->dep_id") }}" method="POST">
                @csrf
                @if (strtolower($method) == 'add')
                    @method("POST")
                @else
                    @method("PATCH")
                @endif

                <div class="card ">
                    <div class="card-header bg-info text-white">
                        Department
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h6>Error list :</h6>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Name
                            </div>
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="dep_name" value="{{  isset($department)?$department->dep_name:'' }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2 text-right pt-2">

                            </div>
                            <div class="col-xl-4">
                                <input type="submit" class="btn btn-info" name="btn-save" value="Save" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-admin.layout>
