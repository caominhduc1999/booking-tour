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
                    <h1>Giao dịch</h1>
                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giao dịch</li>
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
                            <h3 class="card-title">Danh sách giao dịch</h3>
                           
                            <br>
                            <br>
                            <br>
                            <form action="">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="transaction_code" class="form-control" placeholder="Mã giao dịch" value="{{ request()->transaction_code }}">
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="payment_method" id="">
                                            <option value="">Chọn phương thức thanh toán</option>
                                            <option value="2" @if(request()->payment_method == 2) selected @endif>Paypal</option>
                                            <option value="3" @if(request()->payment_method == 3) selected @endif>Momo</option>
                                            <option value="4" @if(request()->payment_method == 4) selected @endif>Vnpay</option>
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
                                                        style="width: 20%;">
                                                        Mã giao dịch</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 30%;">
                                                        Tên khách hàng</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        SĐT khách hàng</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 20%;">
                                                        Số tiền</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 10%;">
                                                        Phương thức thanh toán</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transitions as $key => $transition)
                                                    <tr class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $transition->id }}
                                                        </td>
                                                        <td>{{ $transition->transaction_code }}</td>
                                                        <td>{{ \App\Models\Booking::find($transition->booking_id)->booking_person_name }}</td>
                                                        <td>{{ \App\Models\Booking::find($transition->booking_id)->booking_person_phone }}</td>
                                                        <td>{{ $transition->amount }}</td>
                                                        @switch($transition->payment_method)
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            {{ $transitions->links() }}
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
