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
                    <li class="breadcrumb-item active" aria-current="page">Document {{ $method }}
                    </li>
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
        <script type="text/javascript">
            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker({
                    'format': 'yyyy-mm-dd'
                });
            }
        </script>
    @endpush
    {{-- =========================================================================================================== --}}

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
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
        </div>
        <div class="col-lg-6">
            <form action="{{ strtolower($method) == 'add' ? url('Document') : url("Document/$document->doc_id") }}"
                method="POST">
                @csrf
                @if (strtolower($method) == 'add')
                    @method('POST')
                @else
                    @method('PATCH')
                @endif

                <div class="card ">
                    <div class="card-header bg-info text-white">
                        Edit : {{ isset($document) ? $document->title : '' }}
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Year
                            </div>
                            @php

                            @endphp
                            <div class="col-xl-9">
                                @foreach ($years as $year)
                                    <input type="checkbox" name="year[]" id="year{{ $year }}"
                                        value="{{ $year }}" {{ in_array($year, $yearchecked) ? ' checked ' : '' }} />
                                    <label for="year{{ $year }}">{{ $year }}</label><br />
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Version
                            </div>
                            @php
                                $versions = ['1' => 'New version', '2' => 'Archive version'];
                                $version_id =
                                    strlen(old('version_id')) > 0
                                        ? old('version_id')
                                        : (isset($document)
                                            ? $document->version_id
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <select name="version_id" id="version_id" class="form-control">
                                    @foreach ($versions as $key => $version)
                                        <option value="{{ $key }}"
                                            {{ $version_id == $key ? ' selected ' : '' }}>
                                            {{ $version }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Document Group
                            </div>
                            @php
                                $doc_group_id =
                                    strlen(old('doc_group_id')) > 0
                                        ? old('doc_group_id')
                                        : (isset($document)
                                            ? $document->doc_group_id
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <select name="doc_group_id" id="doc_group_id" class="form-control">
                                    @foreach ($documentgroups as $documentgroup)
                                        <option value="{{ $documentgroup->doc_group_id }}"
                                            {{ $doc_group_id == $documentgroup->doc_group_id ? ' selected ' : '' }}>
                                            {{ $documentgroup->group_name }}</option>
                                        @foreach ($documentgroup->sub as $sub)
                                            <option value="{{ $sub->doc_group_id }}"
                                                {{ $doc_group_id == $sub->doc_group_id ? ' selected ' : '' }}>
                                                -----{{ $sub->group_name }}
                                            </option>
                                            @foreach ($sub->sub2 as $sub2)
                                                <option value="{{ $sub2->doc_group_id }}"
                                                    {{ $doc_group_id == $sub2->doc_group_id ? ' selected ' : '' }}>
                                                    ----------{{ $sub2->group_name }}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Code
                            </div>
                            @php
                                $doc_code =
                                    strlen(old('doc_code')) > 0
                                        ? old('doc_code')
                                        : (isset($document)
                                            ? $document->doc_code
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <input type="text" class="form-control" name="doc_code"
                                    value="{{ $doc_code }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                REV
                            </div>
                            @php
                                $rev = strlen(old('rev')) > 0 ? old('rev') : (isset($document) ? $document->rev : '');
                            @endphp
                            <div class="col-xl-9">
                                <input type="text" class="form-control" name="rev"
                                    value="{{ $rev }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Date
                            </div>
                            @php
                                $doc_date =
                                    strlen(old('doc_date')) > 0
                                        ? old('doc_date')
                                        : (strlen($document->doc_date) > 0
                                            ? $document->doc_date
                                            : date('Y-m-d'));
                            @endphp
                            <div class="col-xl-9">
                                <input type="text" class="form-control datepicker" name="doc_date"
                                    value="{{ $doc_date }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Title
                            </div>
                            @php
                                $title =
                                    strlen(old('title')) > 0
                                        ? old('title')
                                        : (isset($document)
                                            ? $document->title
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <input type="text" class="form-control" name="title"
                                    value="{{ $title }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Detail
                            </div>
                            @php
                                $detail =
                                    strlen(old('detail')) > 0
                                        ? old('detail')
                                        : (isset($document)
                                            ? $document->detail
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <textarea class="form-control ckeditorx" name="detail" id="detail" cols="30" rows="10">{{ $detail }}</textarea>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3 text-right pt-2">
                                Remark
                            </div>
                            @php
                                $remark =
                                    strlen(old('remark')) > 0
                                        ? old('remark')
                                        : (isset($document)
                                            ? $document->remark
                                            : '');
                            @endphp
                            <div class="col-xl-9">
                                <textarea class="form-control" name="remark" id="remark" cols="30" rows="2">{{ $remark }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3 text-right pt-2">
                            </div>
                            <div class="col-xl-4">
                                <input type="submit" class="btn btn-info" name="btn-save" value="Save" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header bg-info text-white">
                    File Attachment
                </div>
                <div class="card-body">
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-xl-3">
                                <select name="filestatus" id="filestatus" class="form-control">
                                    <option value="2">เฉพาะ level 5</option>
                                    <option value="1">ทุก level</option>
                                </select>
                            </div>
                            <div class="col-xl-2 text-right pt-2">
                                Attach:
                            </div>
                            <div class="col-xl-5">
                                <input type="file" name="attachment">
                            </div>
                            <div class="col-xl-2">
                                <input type="hidden" name="doc_id" value="{{ $document->doc_id }}">
                                <input type="submit" class="btn btn-info" name="btn-save" value="Save" />
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-bordered">
                                <tr class="bg-warning text-white">
                                    <td>Status</td>
                                    <td>
                                        File name:
                                    </td>
                                    <td>del</td>
                                </tr>
                                @foreach ($attachments as $attachment)
                                    <tr>
                                        <td nowrap>
                                            <a href="{{ url("changeStatus/$attachment->attachment_id") }}"
                                                class="btn btn-info">change</a>
                                            {{ $attachment->filestatus == 1 ? 'ทุก level' : 'เฉพาะ level 5' }}
                                        </td>
                                        <td>
                                            <a
                                                href="{{ url("downloadfile/$attachment->filepath/$attachment->filename") }}">
                                                {{ $attachment->filename }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url("deleteFile/$attachment->attachment_id") }}"
                                                onclick="return confirm('Delete {{ $attachment->filename }}');"
                                                class="btn btn-danger">del</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
