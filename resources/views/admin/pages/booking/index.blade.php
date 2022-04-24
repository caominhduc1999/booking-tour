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
                    <h1>Đặt tour</h1>
                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đặt tour</li>
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
                            <h3 class="card-title">Danh sách đặt tour</h3>
                            <a href="{{ route('bookings.create') }}">
                                <button class="btn btn-success float-right">
                                    + Thêm mới
                                </button>
                            </a>
                            <br>
                            <br>
                            <br>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="booking_person_name" class="form-control" placeholder="Tên người đặt" value="{{ request()->booking_person_name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="booking_person_phone" class="form-control" placeholder="SĐT người đặt" value="{{ request()->booking_person_phone }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="booking_person_email" class="form-control" placeholder="Email người đặt" value="{{ request()->booking_person_email }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="tour_id" id="">
                                            <option value="">Chọn tour</option>
                                            @foreach($tours as $tour)
                                                <option value="{{ $tour->id }}" @if(request()->tour_id == $tour->id) selected @endif>{{ $tour->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 d-flex">
                                        <span>Ngày đặt:</span>
                                        <input type="date" name="booking_date" class="form-control" placeholder="Ngày đặt" value="{{ request()->booking_date }}">
                                    </div>
                                    <div class="col-md-4 d-flex">
                                        <span>Ngày khởi hành:</span>
                                        <input type="date" name="start_date" class="form-control" placeholder="Ngày khởi hành" value="{{ request()->start_date }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="status" id="">
                                            <option value="">Trạng thái</option>
                                            <option value="1" @if(request()->status == 1) selected @endif>Chờ xác nhận</option>
                                            <option value="2" @if(request()->status == 2) selected @endif>Đã xác nhận</option>
                                            <option value="3" @if(request()->status == 3) selected @endif>Đã hủy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="payment_status" id="">
                                            <option value="">Trạng thái thanh toán</option>
                                            <option value="1" @if(request()->payment_status == 1) selected @endif>Chưa thanh toán</option>
                                            <option value="2" @if(request()->payment_status == 2) selected @endif>Đã đặt cọc</option>
                                            <option value="3" @if(request()->payment_status == 3) selected @endif>Đã thanh toán</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <div class="row d-flex justify-content-end">
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
                                                        style="width: 20%;">
                                                        Tên tour</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 15%;">
                                                        Tên người đặt</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        SĐT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Ngày đặt</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Ngày khởi hành</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Trạng thái</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        HTTT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 30%;">Thao tác
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookings as $key => $booking)
                                                    <tr class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $booking->id }}
                                                        </td>
                                                        <td>{{ $booking->tour->name }}</td>
                                                        <td>{{ $booking->booking_person_name }}</td>
                                                        <td>{{ $booking->booking_person_phone }}</td>
                                                        <td>{{ $booking->booking_date }}</td>
                                                        <td>{{ $booking->start_date }}</td>
                                                        @switch($booking->status)
                                                            @case(1)
                                                                <td>Chờ xác nhận</td>
                                                                @break
                                                            @case(2)
                                                                <td>Đã xác nhận</td>
                                                                @break
                                                            @case(3)
                                                                <td>Đã hủy</td>
                                                                @break
                                                            @default
                                                                <span></span>
                                                        @endswitch
                                                        @switch($booking->payment)
                                                            @case(1)
                                                                <td>TT tại quầy</td>
                                                                @break
                                                            @case(2)
                                                                <td>Paypal</td>
                                                                @break
                                                            @case(3)
                                                                <td>Momo</td>
                                                                @break
                                                            @case(4)
                                                                <td>Vnpay</td>
                                                                @break
                                                            @default
                                                                <span></span>
                                                        @endswitch
                                                        <td class="d-flex">
                                                            <a href="{{ route('bookings.edit', $booking->id) }}"
                                                                class="mr-2">
                                                                <button class="btn btn-outline-warning">Sửa</button>
                                                            </a>
                                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
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
                                            {{ $bookings->links() }}
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
