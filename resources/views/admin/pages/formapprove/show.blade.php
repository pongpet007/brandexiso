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
                    <li class="breadcrumb-item active" aria-current="page"> ฟอร์มการอนุมัติ </li>
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

                    <tr class="bg-info text-white">
                        <th>วันที่ร้องขอ</th>
                        <th>เรื่อง</th>
                        <th>ชื่อเอกสาร</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>แก้ไขครั้งที่</th>
                        <th>รายละเอียด</th>
                        <th>ผู้ร้องขอ</th>
                        <th>สถานะ</th>
                        @if ($is_approve == 2 && strtolower(Auth::user()->position) == 'qmr')
                            <th>action</th>
                        @endif
                    </tr>
                    @foreach ($formrequests as $formrequest)
                        <tr>
                            <td>{{ $formrequest->cdate }}</td>
                            <td>{{ $formrequest->subject }}</td>
                            <td>{{ $formrequest->doc_name }}</td>
                            <td>{{ $formrequest->doc_no }}</td>
                            <td>
                                {{ $formrequest->modify_from }}
                                เป็น
                                {{ $formrequest->modify_to }}
                            </td>
                            <td>{{ $formrequest->detail }}</td>
                            <td>{{ $formrequest->name }}</td>
                            <td>
                                @if ($formrequest->is_approve == 1)
                                    <div class="text-success">อนุมัติแล้ว</div>
                                    <div style="color: black">
                                        <small>
                                            {{ $formrequest->date_approve ? ' วันที่อนุมัติ : ' . $formrequest->date_approve : '' }}
                                        </small>
                                    </div>

                                    @if ($formrequest->is_allow_to_external == 1)
                                        <div class="mt-2 text-success">อนุมัติ ขอสำเนาให้บุคคลภายนอก</div>
                                        <div style="color: black">
                                            <small>
                                                {{ $formrequest->date_approve ? ' วันที่อนุมัติ : ' . $formrequest->date_allow_to_external : '' }}
                                            </small>
                                        </div>
                                    @else
                                        <div class="mt-2 text-danger">ไม่อนุมัติ ขอสำเนาให้บุคคลภายนอก</div>
                                    @endif
                                    <a href="{{ url("viewpdf/$formrequest->fr_id") }}" target="viewpdf"
                                        class="btn btn-danger">VIEW
                                        PDF</a>
                                @endif

                                @if ($formrequest->is_approve == 2)
                                    <div>รอการอนุมัติ</div>
                                @endif

                                @if ($formrequest->is_approve == 3)
                                    <div>ไม่อนุมัติ</div>
                                @endif



                            </td>
                            @if ($formrequest->is_approve == 2 && strtolower(Auth::user()->position) == 'qmr')
                                <td>
                                    <a href="{{ url("form-request-approve/$formrequest->fr_id") }}"
                                        class="btn btn-warning">รายละเอียด</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
