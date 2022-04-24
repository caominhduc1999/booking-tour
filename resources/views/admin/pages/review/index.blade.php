@extends('admin.layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bình luận</h1>
                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bình luận</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bình luận</h3>
                         
                            <br>
                            <br>
                            <br>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="tour_id" id="">
                                            <option value="">Chọn tour</option>
                                            @foreach($tours as $tour)
                                                <option value="{{ $tour->id }}" @if(request()->tour_id == $tour->id) selected @endif>{{ $tour->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="stars" id="">
                                            <option value="">Chọn số sao</option>
                                            <option value="1" @if(request()->stars == 1) selected @endif>★</option>
                                            <option value="2" @if(request()->stars == 2) selected @endif>★★</option>
                                            <option value="3" @if(request()->stars == 3) selected @endif>★★★</option>
                                            <option value="4" @if(request()->stars == 4) selected @endif>★★★★</option>
                                            <option value="5" @if(request()->stars == 5) selected @endif>★★★★★</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary">
                                            Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">



                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 10%;">
                                                        STT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 40%;">
                                                        Tour</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 20%;">
                                                        Người đánh giá</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Số sao</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Trạng thái</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 60%;">
                                                        Nội dung</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 30%;">Thao tác
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviews as $key => $review)
                                                    <tr class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $review->id }}
                                                        </td>
                                                        <td>{{ $review->tour->name }}</td>
                                                        <td>{{ $review->user->name }}</td>
                                                        <td> 
                                                            @for($i = 1; $i <= $review->stars; $i++) 
                                                                ★
                                                            @endfor
                                                        </td>
                                                        <td>{{ $review->is_show == 1 ? 'Hiện' : 'Ẩn' }}</td>
                                                        <td>{{ \Str::limit($review->description, 20, '...') }}</td>
                                                        <td class="d-flex">
                                                            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="is_show" value="{{ $review->is_show }}">
                                                                <button class="{{ 'btn ' . ($review->is_show == 1 ? 'btn-outline-warning' : 'btn-outline-success') }}" type="submit">{{ $review->is_show == 1 ? 'Ẩn' : 'Hiện' }}</button>
                                                            </form>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-outline-danger"
                                                                    onclick="return confirm('Xác nhận xóa ?')">Xóa
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $reviews->links() }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "order": [[ 0, "desc" ]],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "bPaginate": false,
                "bFilter": false,
                "buttons": [
                    "copy",
                    "csv", 
                    "excel", 
                    "pdf", 
                    { extend: 'print', text: 'In ấn' },
                    { extend: 'colvis', text: 'Hiển thị cột' }
                ],
                "language": {
                    "emptyTable": "Không có dữ liệu",
                    "info": "Hiển thị _START_ tới _END_ của _TOTAL_ dữ liệu",
                    "infoEmpty": "Hiển thị 0 tới 0 của 0 dữ liệu",
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
