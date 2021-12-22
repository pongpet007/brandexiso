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
        <div class=" mb-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User {{ $method }} </li>
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
            <form action="{{ strtolower($method) == 'add' ? url('User') : url("User/$user->id") }}" method="POST">
                @csrf

                @if (strtolower($method) == 'add')
                    @method("POST")
                @else
                    @method("PATCH")
                @endif

                <div class="card ">
                    <div class="card-header bg-info text-white">
                        User
                    </div>
                    <div class="card-body">
                        @if ($errors->any())

                            <div class="row mb-3">
                                <div class="col-xl-2 text-right pt-2"></div>
                                <div class="col-xl-4">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h6>Error list :</h6>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endif

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Fullname
                            </div>
                            @php
                                $name = strlen(old('name')) > 0 ? old('name') : (isset($user) ? $user->name : '');
                            @endphp
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="name" value="{{ $name }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Nick name
                            </div>
                            @php
                                $nickname = strlen(old('nickname')) > 0 ? old('nickname') : (isset($user) ? $user->nickname : '');
                            @endphp
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="nickname" value="{{ $nickname }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Username
                            </div>
                            @php
                                $username = strlen(old('username')) > 0 ? old('username') : (isset($user) ? $user->username : '');
                            @endphp
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="username" value="{{ $username }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Password
                            </div>
                            <div class="col-xl-4">
                                <input type="password" class="form-control" name="password"
                                    value="{{ old('password') }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Department
                            </div>
                            @php
                                $dep_id = strlen(old('dep_id')) > 0 ? old('dep_id') : (isset($user) ? $user->dep_id : '');
                            @endphp
                            <div class="col-xl-4">
                                <select name="dep_id" id="dep_id" class="form-control">
                                    @foreach ($departments as $key => $value)
                                        <option value="{{ $key }}" {{ $dep_id == $key ? 'selected' : '' }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Level
                            </div>
                            <div class="col-xl-4">
                                @php
                                    $levels = range(1, 5);
                                    $level = strlen(old('level')) > 0 ? old('level') : (isset($user) ? $user->level : '');
                                @endphp
                                <select name="level" id="level" class="form-control">
                                    @foreach ($levels as $item)
                                        <option value="{{ $item }}" {{ $level == $item ? 'selected' : '' }}>
                                            Level
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Is Manager
                            </div>
                            <div class="col-xl-4">
                                @php
                                    $is_manager = strlen(old('is_manager')) > 0 ? old('is_manager') : (isset($user) ? $user->is_manager : '');
                                @endphp
                                <select name="is_manager" id="is_manager" class="form-control">
                                    <option value="2" {{ $is_manager == 2 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $is_manager == 1 ? 'selected' : '' }}>Yes</option>
                                </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Active
                            </div>
                            <div class="col-xl-4">
                                @php
                                    $is_active = strlen(old('is_active')) > 0 ? old('is_active') : (isset($user) ? $user->is_active : '');
                                @endphp
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="1" {{ $is_active == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{ $is_active == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-2 text-right pt-2">
                                Position
                            </div>
                            @php
                                $position = strlen(old('position')) > 0 ? old('position') : (isset($user) ? $user->position : '');
                            @endphp
                            <div class="col-xl-4">
                                <input type="text" class="form-control" name="position"
                                    value="{{ $position }}" />
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
