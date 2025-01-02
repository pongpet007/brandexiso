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
                        <td colspan="3">
                            <a href="{{ url('DocumentGroup/create') }}" class="btn btn-success">Create new document
                                group</a>
                            <a href="{{ url('DocumentGroup?parent_id=0') }}" class="btn btn-info">manage order main
                                group</a>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>
                            @if ($parent_id == '')
                                Document Group
                            @else
                                <a href="{{ url('DocumentGroup') }}" class="btn btn-warning">Back</a>
                            @endif

                        </th>
                        @if ($parent_id == '')
                            <th>Action</th>
                        @else
                            <th>Order</th>
                        @endif
                    </tr>
                    @foreach ($documentgroups as $documentgroup)
                        <tr>
                            <td>
                                {{ $documentgroup->group_name }}
                                @if (sizeof($documentgroup->sub) > 0)
                                    <a class="btn btn-warning btn-sm" href="#" data-toggle="collapse"
                                        data-target="#collapse{{ $documentgroup->doc_group_id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $documentgroup->doc_group_id }}">
                                        <span>>></span>
                                    </a>
                                @endif
                            </td>
                            @if ($parent_id == '')
                                <td width="350">
                                    <a href="{{ url('DocumentGroup?parent_id=' . $documentgroup->doc_group_id) }}"
                                        class="btn btn-info">manage order</a>
                                    <a href="{{ url('DocumentGroup') }}/{{ $documentgroup->doc_group_id }}/edit"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ url('DocumentGroup') }}/{{ $documentgroup->doc_group_id }}"
                                        onsubmit="return confirm('Delete {{ $documentgroup->group_name }} ?');"
                                        method="post" style="display:inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            @else
                                <td width="180">
                                    <a href="{{ url('moveup/' . $documentgroup->doc_group_id) }}"
                                        class="btn btn-secondary">UP</a>
                                    <a href="{{ url('movedown/' . $documentgroup->doc_group_id) }}"
                                        class="btn btn-secondary">DOWN</a>
                                </td>
                            @endif

                        </tr>
                        @if (sizeof($documentgroup->sub) > 0)
                            <tr>
                                <td colspan="3" style="padding: 0;">
                                    <div id="collapse{{ $documentgroup->doc_group_id }}" class="collapse"
                                        aria-labelledby="heading{{ $documentgroup->doc_group_id }}"
                                        data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <table class="table table-bordered">
                                                @foreach ($documentgroup->sub as $sub)
                                                    <tr>
                                                        <td>
                                                            <span
                                                                style="padding-left: 50px">--{{ $sub->group_name }}</span>
                                                        </td>

                                                        @if ($parent_id == '')
                                                            <td width="220">
                                                                <a href="{{ url('DocumentGroup') }}/{{ $sub->doc_group_id }}/edit"
                                                                    class="btn btn-warning">Edit</a>
                                                                <form
                                                                    action="{{ url('DocumentGroup') }}/{{ $sub->doc_group_id }}"
                                                                    onsubmit="return confirm('Delete {{ $sub->group_name }} ?');"
                                                                    method="post" style="display:inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Delete</button>
                                                                </form>
                                                            </td>
                                                        @else
                                                            <td width="180">

                                                                <a href="{{ url('moveup/' . $sub->doc_group_id) }}"
                                                                    class="btn btn-secondary">UP</a>
                                                                <a href="{{ url('movedown/' . $sub->doc_group_id) }}"
                                                                    class="btn btn-secondary">DOWN</a>
                                                            </td>
                                                        @endif
                                                    </tr>

                                                    {{-- @foreach ($sub->sub2 as $sub2)
                                                        <tr>
                                                            <td><span
                                                                    style="padding-left: 80px">----{{ $sub2->group_name }}</span>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('DocumentGroup') }}/{{ $sub2->doc_group_id }}/edit"
                                                                    class="btn btn-warning">Edit</a>
                                                                <form
                                                                    action="{{ url('DocumentGroup') }}/{{ $sub2->doc_group_id }}"
                                                                    onsubmit="return confirm('Delete {{ $sub2->group_name }} ?');"
                                                                    method="post" style="display:inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>
