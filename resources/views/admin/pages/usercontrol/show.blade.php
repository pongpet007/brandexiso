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
                    <li class="breadcrumb-item active" aria-current="page">User with Document group</li>
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
        @if ($errors->any())
            <div class="col-lg-12">
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
            </div>
        @endif
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-bordered bg-white">
                    <tr class="bg-info text-white">
                        <th>Document Group</th>
                    </tr>
                    @foreach ($documentgroups as $documentgroup)
                        <tr>
                            <td>
                                <a
                                    href="{{ url('UserDocumentGroup') }}?doc_group_id={{ $documentgroup->doc_group_id }}">{{ $documentgroup->group_name }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            @if ($doc_group_id > 0)
                <form action="{{ url('UserDocumentGroup') }}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="table-responsive">
                        <table class="table table-bordered bg-white">
                            <tr class="bg-warning text-white">
                                <th>User</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user_id[]" id="user_id{{ $user->id }}"
                                            value="{{ $user->id }}"
                                            {{ in_array($user->id, $users_groups) ? ' checked ' : '' }} />
                                        <label for="user_id{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <input type="hidden" id="doc_group_id" name="doc_group_id"
                                        value="{{ $doc_group_id }}">
                                    <input type="submit" class="btn btn-success" value="SAVE" />
                                </td>
                            </tr>
                        </table>

                    </div>
                </form>
            @endif
        </div>
    </div>

</x-admin.layout>
