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
                    <li class="breadcrumb-item active" aria-current="page">Document Group</li>
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
                            <a href="{{ url('DocumentGroup/create') }}" class="btn btn-success">Create new document
                                group</a>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>Document Group</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($documentgroups as $documentgroup)
                        <tr>
                            <td>
                                {{ $documentgroup->group_name }}
                                @if (sizeof($documentgroup->sub) > 0)
                                    <a class="btn btn-warning btn-sm" href="#" data-toggle="collapse"
                                        data-target="#collapse{{ $documentgroup->group_name }}" aria-expanded="true"
                                        aria-controls="collapse{{ $documentgroup->group_name }}">
                                        <span>>></span>
                                    </a>
                                @endif

                                <div id="collapse{{ $documentgroup->group_name }}" class="collapse "
                                    aria-labelledby="heading{{ $documentgroup->group_name }}"
                                    data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <table class="table table-bordered">
                                            @foreach ($documentgroup->sub as $sub)
                                                <tr>
                                                    <td><span style="padding-left: 50px">--{{ $sub->group_name }}</span>
                                                    </td>
                                                    <td width="200">
                                                        <a href="{{ url('DocumentGroup') }}/{{ $sub->doc_group_id }}/edit"
                                                            class="btn btn-warning">Edit</a>
                                                        <form
                                                            action="{{ url('DocumentGroup') }}/{{ $sub->doc_group_id }}"
                                                            onsubmit="return confirm('Delete {{ $sub->group_name }} ?');"
                                                            method="post" style="display:inline">
                                                            @method("DELETE")
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @foreach ($sub->sub2 as $sub2)
                                                    <tr>
                                                        <td><span style="padding-left: 80px">----{{ $sub2->group_name }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('DocumentGroup') }}/{{ $sub2->doc_group_id }}/edit"
                                                                class="btn btn-warning">Edit</a>
                                                            <form
                                                                action="{{ url('DocumentGroup') }}/{{ $sub2->doc_group_id }}"
                                                                onsubmit="return confirm('Delete {{ $sub2->group_name }} ?');"
                                                                method="post" style="display:inline">
                                                                @method("DELETE")
                                                                @csrf
                                                                <button class="btn btn-danger"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td width="220">
                                <a href="{{ url('DocumentGroup') }}/{{ $documentgroup->doc_group_id }}/edit"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ url('DocumentGroup') }}/{{ $documentgroup->doc_group_id }}"
                                    onsubmit="return confirm('Delete {{ $documentgroup->group_name }} ?');"
                                    method="post" style="display:inline">
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
