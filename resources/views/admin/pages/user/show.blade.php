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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
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
            <div class="table-responsive">
                <table class="table table-bordered bg-white">
                    <tr>
                        <td colspan="6">
                            <a href="{{ url('User/create') }}" class="btn btn-success">Create new user</a>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>Full name</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Active</th>
                        <th>Signature</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }} ({{ $user->nickname }}) </td>
                            <td>Level {{ $user->level }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->position }}</td>
                            <td>{{ $user->is_active == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                @php
                                    $filepath = storage_path('app/'.$user->signature);
                                @endphp                              
                                @if (file_exists($filepath))
                                    <img src="{{ asset($user->signature) }}" width="200" alt="">
                                @endif

                            </td>
                            <td width="220">
                                <a href="{{ url("User/$user->id/edit") }}" class="btn btn-warning">Edit</a>
                                <form action="{{ url("User/$user->id") }}"
                                    onsubmit="return confirm('Delete {{ $user->name }} ?');" method="post"
                                    style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
