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
                    <li class="breadcrumb-item active" aria-current="page"> ฟอร์ม รอการอนุมัติ </li>
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
            //  $('#date_approve').hide();
            //  $('#date_allow_to_external').hide();

            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker({
                    'format': 'yyyy-mm-dd'
                });
            }

            function checkapprove() {
                if ($('#is_approve').val() == 1) {
                    $('#date_approve').show();
                } else {
                    $('#date_approve').hide();
                }

                if ($('#is_allow_to_external').val() == 1) {
                    $('#date_allow_to_external').show();
                } else {
                    $('#date_allow_to_external').hide();
                }


            }
        </script>
    @endpush
    {{-- =========================================================================================================== --}}

    <!-- Content Row -->
    <form method="POST" action="{{ url('form-request-approve-save/' . $formrequest->fr_id) }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Brandex Directory Co.,Ltd.</h2>
                    <h3>DAR</h3>
                    <h4>ใบร้องขอดำเนินการเรื่องเอกสาร</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if (@session('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 class="text-center">{{ session('status') }}</h2>

                        </div>
                    @endif
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
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row my-4">
                        <div class="col-md-2">To : </div>
                        <div class="col-md-8" style="color: black;"><b>DCO / QMR</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">เรื่อง : </div>
                        <div class="col-md-10" style="color: black;">
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row my-4">
                        <div class="col-md-4">ชื่อเอกสาร : </div>
                        <div class="col-md-8" style="color: black;">{{ $formrequest->doc_name }}</div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-4">หมายเลขเอกสาร : </div>
                        <div class="col-md-8" style="color: black;">{{ $formrequest->doc_no }}</div>
                    </div>
                    <div class="row my-4">
                        <div class="d-flex pl-3">
                            <div class=""> แก้ไขครั้งที่ : &nbsp;</div>
                            <div class="" style="color: black;">{{ $formrequest->modify_from }}</div>
                            <div class=""> &nbsp; เป็น : &nbsp;</div>
                            <div class="" style="color: black;">{{ $formrequest->modify_to }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-4">
                    รายละเอียดในการขอดำเนินการ :
                </div>
                <div class="col-md-12" style="color: black;">
                    {{ $formrequest->detail }}
                </div>
                <div class="col-md-6 mt-4 p-5">
                    <h5 class="text-center">การพิจารณาผลกระทบกับเอกสารอื่น</h5>
                    <div class="mt-3">
                        <select name="is_approve" id="is_approve" class="form-control">
                            <option value="">--เลือก--</option>
                            <option value="1" {{ old('is_approve') == 1 ? 'selected' : '' }}>อนุมัติ</option>
                            <option value="3" {{ old('is_approve') == 3 ? 'selected' : '' }}>ไม่อนุมัติ</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="text" id="date_approve" name="date_approve" value="{{ old('date_approve') }}"
                            class="form-control datepicker" autocomplete="off" placeholder="วันที่เริ่มใช้">
                    </div>
                </div>
                <div class="col-md-6 mt-4 p-5">
                    <h5 class="text-center">การพิจารณากรณีขอสำเนาให้บุคคลภายนอก</h5>
                    <div class="mt-3">
                        <select name="is_allow_to_external" id="is_allow_to_external" class="form-control">
                            <option value="">--เลือก--</option>
                            <option value="1">อนุมัติ</option>
                            <option value="2">ไม่อนุมัติ</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="text" id="date_allow_to_external" name="date_allow_to_external"
                            value="{{ old('date_allow_to_external') }}" autocomplete="off"
                            class="form-control datepicker" placeholder="วันที่เริ่มใช้">
                    </div>
                </div>

                <div class="col-md-12 text-center my-4">
                    <div class="text-danger">**บันทึกแล้วไม่สามารถแก้ไขได้อีก</div>
                    <button type="submit" class="btn btn-success">บันทึกการอนุมัติ</button>
                </div>
            </div>
        </div>
    </form>

</x-admin.layout>
