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
                    <li class="breadcrumb-item active" aria-current="page">Document Group {{ $method }} </li>
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
            <form
                action="{{ strtolower($method) == 'add' ? url('DocumentGroup') : url("DocumentGroup/$documentgroup->doc_group_id") }}"
                method="POST">
                @csrf
                @if (strtolower($method) == 'add')
                    @method("POST")
                @else
                    @method("PATCH")
                @endif

                <div class="card ">
                    <div class="card-header bg-info text-white">
                        Document Group
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                Group Name
                            </div>
                            @php
                                $group_name = strlen(old('group_name')) > 0 ? old('group_name') : (isset($documentgroup) ? $documentgroup->group_name : '');
                            @endphp
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="group_name"
                                    value="{{ $group_name }}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Parent Group
                            </div>
                            @php
                                $parent_id = strlen(old('parent_id')) > 0 ? old('parent_id') : (isset($documentgroup) ? $documentgroup->parent_id : '');
                            @endphp
                            <div class="col-xl-4">
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">-- Main group --</option>
                                    @foreach ($maingroups as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $parent_id ? 'selected' : '' }}>
                                            {{ $value[0] }}
                                        </option>
                                        @foreach ($value['sub'] as $key2 => $value2)
                                            <option value="{{ $key2 }}" {{ $key2 == $parent_id ? 'selected' : '' }}>
                                                --- {{ $value2 }}</option>
                                        @endforeach
                                    @endforeach

                                </select>
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
