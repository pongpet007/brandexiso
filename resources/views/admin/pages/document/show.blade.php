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
                    <li class="breadcrumb-item active" aria-current="page"> Document in <span
                            style="color:red; font-weight: bolder;">{{ $group->group_name }}</span></li>
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
                            <form action="{{ url("documentlist/$group_id") }}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    @if (Auth::user()->level == 5)
                                        <div class="col-md-2">
                                            <a href="{{ url("documentlist/create/$group_id") }}"
                                                class="btn btn-success">Create
                                                new
                                                document</a>
                                        </div>
                                    @endif
                                    <div class="col-md-3">
                                        <input type="text" name="keyword" id="keyword" class="form-control"
                                            placeholder="keyword" value="{{ $keyword }}" />
                                    </div>
                                    <div class="col-md-1">
                                        <input type="submit" class="btn btn-success" name="btn-search" id="btn-search"
                                            value="ค้นหา" />
                                    </div>

                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>Code</th>
                        <th>REV</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th width="400">Attachment List:</th>
                        @if (Auth::user()->level == 5)
                            <th width="220">Action</th>
                        @endif
                    </tr>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->doc_code }}</td>
                            <td>{{ $document->rev }}</td>
                            <td>{{ $document->doc_date }}</td>
                            <td>{{ $document->title }}</td>
                            <td>
                                @if (sizeof($document->attachments) > 0)
                                    <table class="table table-striped">
                                        @foreach ($document->attachments as $attachment)
                                            @if (Auth::user()->level == 5 || $attachment->filestatus == 1)
                                                <tr>
                                                    <td>
                                                        <a
                                                            href="{{ url("downloadfile/$attachment->filepath/$attachment->filename") }}">
                                                            {{ $attachment->filename }}
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                            @if (Auth::user()->level == 5)
                                <td>
                                    <a href="{{ url('Document') }}/{{ $document->doc_id }}/edit"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ url('Document') }}/{{ $document->doc_id }}"
                                        onsubmit="return confirm('Delete {{ $document->doc_code }} ?');"
                                        method="post" style="display:inline">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>
