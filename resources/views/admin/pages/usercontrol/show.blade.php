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
                    <li class="breadcrumb-item active" aria-current="page">Department</li>
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
                        <td colspan="2">
                            <a href="{{ url('Department/create') }}" class="btn btn-success">Create new department</a>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->dep_name }}</td>
                            <td width="220">
                                <a href="{{ url("Department/$department->dep_id/edit") }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ url("Department/$department->dep_id") }}"
                                    onsubmit="return confirm('Delete {{ $department->dep_name }} ?');" method="post"
                                    style="display:inline">
                                    @method("DELETE")
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
