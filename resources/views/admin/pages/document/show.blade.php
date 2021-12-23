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
                    <li class="breadcrumb-item active" aria-current="page"> Document in <span style="color:red; font-weight: bolder;">{{ $group->group_name }}</span></li>
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
                        <td colspan="5">
                            <a href="{{ url("documentlist/create/$group_id") }}" class="btn btn-success">Create new
                                document</a>
                        </td>
                    </tr>
                    <tr class="bg-info text-white">
                        <th>Code</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th width="400">Attachment List:</th>
                        <th width="220">Action</th>
                    </tr>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->doc_code }}</td>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->doc_date }}</td>
                            <td>
                                @if (sizeof($document->attachments) > 0)
                                    <table class="table table-striped">
                                        @foreach ($document->attachments as $attachment)
                                            <tr>
                                                <td>
                                                    <a href="{{ url("downloadfile/$attachment->filepath") }}">
                                                        {{ $attachment->filename }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                            <td >
                                <a href="{{ url('Document') }}/{{ $document->doc_id }}/edit"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ url('Document') }}/{{ $document->doc_id }}"
                                    onsubmit="return confirm('Delete {{ $document->doc_code }} ?');" method="post"
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