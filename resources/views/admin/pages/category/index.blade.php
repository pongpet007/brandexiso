<x-admin.layout>
    {{-- Meta tag --}}
    @push('metatag')
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Brandex Admin Dashboard</title>
    @endpush
    {{-- =========================================================================================================== --}}
    {{-- Breadcrumb --}}
    @push('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                <table class="table table-striped">
                    <tr>
                        <td colspan="3">
                            <a href="{{url("Category/create")}}" class="btn btn-info">Create new category</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categorys as $category)
                        <tr>
                            <td></td>
                            <td>
                                @if ($category->is_show)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url("Category/$category->cat_id/edit")}}" class="btn btn-warning">Edit</a>
                                <a href="{{ url("Category/destroy/$category->cat_id")}}" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
