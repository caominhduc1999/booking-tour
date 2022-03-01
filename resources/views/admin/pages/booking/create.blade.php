@extends('admin.layouts.master')


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
                        <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Danh sách đặt tour</a></li>
                        <li class="breadcrumb-item active">Thêm đặt tour</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới đặt tour</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('bookings.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tour</label>
                            <select class="form-control" name="tour_id" id="">
                                <option value=""></option>
                                @foreach($tours as $tour)
                                    <option value="{{ $tour->id }}" @if(old('tour_id') == $tour->id) selected @endif>{{ $tour->name }}</option>
                                @endforeach
                            </select>
                            @error('tour_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người đặt</label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option value=""></option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif data-value="{{ $user }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người đặt</label>
                            <input type="text" class="form-control" name="booking_person_name" id="booking_person_name" placeholder="Tên người đặt" value="{{ old('booking_person_name') }}">
                            @error('booking_person_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT người đặt</label>
                            <input type="text" class="form-control" name="booking_person_phone" id="booking_person_phone" placeholder="SĐT người đặt" value="{{ old('booking_person_phone') }}">
                            @error('booking_person_phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email người đặt</label>
                            <input type="text" class="form-control" name="booking_person_email" id="booking_person_email" placeholder="Email người đặt" value="{{ old('booking_person_email') }}">
                            @error('booking_person_email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ người đặt</label>
                            <input type="text" class="form-control" name="booking_person_address" id="booking_person_address" placeholder="Địa chỉ người đặt" value="{{ old('booking_person_address') }}">
                            @error('booking_person_address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày khởi hành</label>
                            <input type="date" class="form-control" name="start_date" id="exampleInputEmail1" placeholder="Ngày khởi hành" value="{{ old('start_date') }}">
                            @error('start_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng người lớn</label>
                            <input type="number" class="form-control" name="adult_number" id="exampleInputEmail1" placeholder="Số lượng người lớn" value="{{ old('adult_number') }}">
                            @error('adult_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ em</label>
                            <input type="number" class="form-control" name="children_number" id="exampleInputEmail1" placeholder="Số lượng trẻ em" value="{{ old('children_number') }}">
                            @error('children_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ sơ sinh</label>
                            <input type="number" class="form-control" name="baby_number" id="exampleInputEmail1" placeholder="Số lượng trẻ sơ sinh" value="{{ old('baby_number') }}">
                            @error('baby_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <select class="form-control" name="discount_id" id="">
                                <option value=""></option>
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->id }}" @if(old('discount_id') == $discount->id) selected @endif>{{ $discount->code }}</option>
                                @endforeach
                            </select>
                            @error('discount_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ghi chú</label>
                            <textarea class="form-control" name="note" id="local-upload" cols="30" rows="10">{!! old('note') !!}</textarea>
                            @error('note')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình thức thanh toán</label>
                            <select class="form-control" name="payment" id="">
                                <option value="1">Tiền mặt</option>
                                <option value="2">Stripe</option>
                                <option value="3">Momo</option>
                            </select>
                            @error('payment')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái thanh toán</label>
                            <select class="form-control" name="payment_status" id="">
                                <option value="1">Chưa thanh toán</option>
                                <option value="2">Đã thanh toán</option>
                            </select>
                            @error('payment_status')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <select class="form-control" name="status" id="">
                                <option value="1">Chờ xác nhận</option>
                                <option value="2">Đã xác nhận</option>
                            </select>
                            @error('status')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#user_id').change(function() {
                var optionSelected = $("option:selected", this);
                
                var userData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;
                if (userData != undefined) {
                    $('#booking_person_name').val(userData.name);
                    $('#booking_person_phone').val(userData.phone);
                    $('#booking_person_email').val(userData.email);
                    $('#booking_person_address').val(userData.address);

                    $('#booking_person_name').prop('readonly', true);
                    $('#booking_person_phone').prop('readonly', true);
                    $('#booking_person_email').prop('readonly', true);
                    $('#booking_person_address').prop('readonly', true);
                } else {
                    $('#booking_person_name').val('');
                    $('#booking_person_phone').val('');
                    $('#booking_person_email').val('');
                    $('#booking_person_address').val('');

                    $('#booking_person_name').prop('readonly', false);
                    $('#booking_person_phone').prop('readonly', false);
                    $('#booking_person_email').prop('readonly', false);
                    $('#booking_person_address').prop('readonly', false);
                }
            })
        })
    </script>
@endsection