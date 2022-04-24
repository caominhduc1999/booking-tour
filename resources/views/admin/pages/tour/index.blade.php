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
                    <h1>Tour</h1>
                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tour</li>
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
                            <h3 class="card-title">Danh sách Tour</h3>
                            <a href="{{ route('tours.create') }}">
                                <button class="btn btn-success float-right">
                                    + Thêm mới
                                </button>
                            </a>
                            <br>
                            <br>
                            <br>
                            <form action="">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="text" name="name" class="form-control" placeholder="Tên tour" value="{{ request()->name }}">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="code" class="form-control" placeholder="Mã tour" value="{{ request()->code }}">
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control" name="tour_guide_id" id="">
                                            <option value="">Hướng dẫn viên</option>
                                            @foreach($tourGuides as $tourGuide)
                                                <option value="{{ $tourGuide->id }}" @if(request()->tour_guide_id == $tourGuide->id) selected @endif>{{ $tourGuide->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-2">
                                        <select class="form-control" name="type" id="">
                                            <option value="">Loại tour</option>
                                            <option value="1" @if(request()->type == 1) selected @endif>Trong nước</option>
                                            <option value="2" @if(request()->type == 2) selected @endif>Quốc tế</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control" name="frequency" id="">
                                            <option value="">Tần suất</option>
                                            <option value="1" @if(request()->frequency == 1) selected @endif>Hàng tuần</option>
                                            <option value="2" @if(request()->frequency == 2) selected @endif>Liên hệ</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control" name="is_feature" id="">
                                            <option value="">Tour nổi bật</option>
                                            <option value="1" @if(request()->is_feature == 1) selected @endif>Không</option>
                                            <option value="2" @if(request()->is_feature == 2) selected @endif>Nổi bật</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" name="people_limit_from" class="form-control" placeholder="Số người giới hạn min" value="{{ request()->people_limit_from }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="people_limit_to" class="form-control" placeholder="Số người giới hạn max" value="{{ request()->people_limit_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" name="days_from" class="form-control" placeholder="Số ngày min" value="{{ request()->days_from }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="days_to" class="form-control" placeholder="Số ngày max" value="{{ request()->days_to }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="departure" class="form-control" placeholder="Điểm khởi hành" value="{{ request()->departure }}">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="destination" class="form-control" placeholder="Điểm đến" value="{{ request()->destination }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row ">
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" name="adult_price_from" class="form-control" placeholder="Giá vé người lớn min" value="{{ request()->adult_price_from }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="adult_price_to" class="form-control" placeholder="Giá vé người lớn max" value="{{ request()->adult_price_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" name="children_price_from" class="form-control" placeholder="Giá vé trẻ em min" value="{{ request()->children_price_from }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="children_price_to" class="form-control" placeholder="Giá vé trẻ em max" value="{{ request()->children_price_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" name="baby_price_from" class="form-control" placeholder="Giá vé trẻ sơ sinh min" value="{{ request()->baby_price_from }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="baby_price_to" class="form-control" placeholder="Giá vé trẻ sơ sinh max" value="{{ request()->baby_price_to }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <button class="btn btn-primary">
                                        Tìm kiếm
                                    </button>
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
                                                        style="width: 10%;">
                                                        Ảnh</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 30%;">
                                                        Tên</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Mã tour</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Loại tour</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 20%;">
                                                        Tần suất</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Số người giới hạn</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Số ngày</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 20%;">Thao tác
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tours as $key => $tour)
                                                    <tr class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $tour->id }}
                                                        </td>
                                                        <td>
                                                            <img src="{{ URL::asset('storage/images/' . $tour->image) }}" height="100px" width="100px" />
                                                        </td>
                                                        <td>{{ $tour->name }}</td>
                                                        <td>{{ $tour->code }}</td>
                                                        <td>{{ $tour->type == 1 ? 'Trong nước' : 'Quốc tế' }}</td>
                                                        <td>{{ $tour->frequency == 1 ? 'Hàng tuần' : 'Liên hệ' }}</td>
                                                        <td>{{ $tour->people_limit }}</td>
                                                        <td>{{ $tour->days }}</td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('tours.edit', $tour->id) }}"
                                                                class="mr-2">
                                                                <button class="btn btn-outline-warning">Sửa</button>
                                                            </a>
                                                            <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
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
                                            {{ $tours->links() }}
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
