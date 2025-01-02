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
                    <li class="breadcrumb-item active" aria-current="page"> ใบร้องขอดำเนินการเรื่องเอกสาร </li>
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
    <form method="POST" action="{{ url('form-request-save') }}">
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
                        <div class="col-md-8"><b>DCO / QMR</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">เรื่อง : </div>
                        <div class="col-md-10">
                            <select class="form-control" name="subject" id="subject">
                                <option value="ขอออกเอกสารใหม่">ขอออกเอกสารใหม่</option>
                                <option value="ขอแก้ไขเอกสาร">ขอแก้ไขเอกสาร</option>
                                <option value="ขอสำเนาเพิ่ม">ขอสำเนาเพิ่ม</option>
                                <option value="ขอยกเลิกเอกสาร">ขอยกเลิกเอกสาร</option>
                                <option value="อื่น ๆ">อื่น ๆ</option>
                            </select>

                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ขอออกเอกสารใหม่
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ขอแก้ไขเอกสาร
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ขอสำเนาเพิ่ม
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ขอยกเลิกเอกสาร
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    อื่น ๆ
                                </label>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row my-4">
                        <div class="col-md-4">ชื่อเอกสาร <b style="color:red;">*</b> : </div>
                        <div class="col-md-8"><input type="text" name="doc_name" class="form-control"
                                value="{{ old('doc_name') }}" /></div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-4">หมายเลขเอกสาร <b style="color:red;">*</b> : </div>
                        <div class="col-md-8"><input type="text" name="doc_no" class="form-control"
                                value="{{ old('doc_no') }}" /></div>
                    </div>
                    <div class="row my-4">
                        <div class="d-flex pl-3">
                            <div class=""> แก้ไขครั้งที่ : &nbsp;</div>
                            <div class=""><input type="text" name="modify_from" class="form-control" /></div>
                            <div class=""> &nbsp; เป็น : &nbsp;</div>
                            <div class=""><input type="text" name="modify_to" class="form-control" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 my-4">
                    รายละเอียดในการขอดำเนินการ <b style="color:red;">*</b> :
                </div>
                <div class="col-md-12">
                    <textarea name="detail" rows="6" class="form-control">{{ old('detail') }}</textarea>
                </div>

                <div class="col-md-12 text-center my-4">
                    <button type="submit" class="btn btn-success">ส่งคำร้อง</button>
                </div>
            </div>
        </div>
    </form>

</x-admin.layout>
