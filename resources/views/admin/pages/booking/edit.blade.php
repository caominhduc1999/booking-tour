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
                        <li class="breadcrumb-item active">Sửa đặt tour</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa đặt tour</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('bookings.update', $booking->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tour</label>
                            <select class="form-control" name="tour_id" id="tour-selection">
                                <option value=""></option>
                                @foreach($tours as $tour)
                                    <option value="{{ $tour->id }}" @if(old('tour_id') ? old('tour_id') == $tour->id : $booking->tour_id == $tour->id) selected @endif data-value="{{ $tour }}">{{ $tour->name }}</option>
                                @endforeach
                            </select>
                            @error('tour_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khách sạn</label>
                            <select class="form-control" name="hotel_id">
                                <option value=""></option>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" @if(old('hotel_id') ? old('hotel_id') == $hotel->id : $booking->hotel_id == $hotel->id) selected @endif >{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                            @error('hotel_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người đặt</label>
                            <input type="text" class="form-control" name="booking_person_name" id="booking_person_name" readonly placeholder="Tên người đặt" value="{{ old('booking_person_name', $booking->booking_person_name) }}">
                            @error('booking_person_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT người đặt</label>
                            <input type="text" class="form-control" name="booking_person_phone" id="booking_person_phone" readonly placeholder="SĐT người đặt" value="{{ old('booking_person_phone', $booking->booking_person_phone) }}">
                            @error('booking_person_phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email người đặt</label>
                            <input type="text" class="form-control" name="booking_person_email" id="booking_person_email" readonly placeholder="Email người đặt" value="{{ old('booking_person_email', $booking->booking_person_email) }}">
                            @error('booking_person_email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ người đặt</label>
                            <input type="text" class="form-control" name="booking_person_address" id="booking_person_address" readonly placeholder="Địa chỉ người đặt" value="{{ old('booking_person_address', $booking->booking_person_address) }}">
                            @error('booking_person_address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày khởi hành</label>
                            <input type="date" class="form-control" name="start_date" id="exampleInputEmail1" placeholder="Ngày khởi hành" value="{{ old('start_date', $booking->start_date) }}">
                            @error('start_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng người lớn</label>
                            <input type="number" class="form-control price" name="adult_number" id="exampleInputEmail1" placeholder="Số lượng người lớn" value="{{ old('adult_number', $booking->adult_number) }}">
                            @error('adult_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ em</label>
                            <input type="number" class="form-control price" name="children_number" id="exampleInputEmail1" placeholder="Số lượng trẻ em" value="{{ old('children_number', $booking->children_number) }}">
                            @error('children_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ sơ sinh</label>
                            <input type="number" class="form-control price" name="baby_number" id="exampleInputEmail1" placeholder="Số lượng trẻ sơ sinh" value="{{ old('baby_number', $booking->baby_number) }}">
                            @error('baby_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiền đặt cọc tối thiểu</label>
                            <input type="number" class="form-control" name="deposit" id="exampleInputEmail1" placeholder="Tiền đặt cọc tối thiểu" value="{{ old('deposit', $booking->deposit) }}">
                            @error('deposit')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tổng tiền</label>
                            <input type="number" class="form-control total-price" id="exampleInputEmail1" placeholder="" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <select class="form-control" name="discount_id" id="discount-selection">
                                <option value=""></option>
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->id }}" @if(old('discount_id') ? old('discount_id') == $discount->id : $booking->discount_id == $discount->id) selected @endif data-value="{{ $discount }}">{{ $discount->code }}</option>
                                @endforeach
                            </select>
                            @error('discount_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tổng tiền (sau khi áp dụng mã giảm giá)</label>
                            <input type="number" class="form-control total-price-after-discount" id="exampleInputEmail1" placeholder="0" value="{{ $booking->total_price }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ghi chú</label>
                            <textarea class="form-control" name="note" id="local-upload" cols="30" rows="10">{!! old('note', $booking->note) !!}</textarea>
                            @error('note')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình thức thanh toán</label>
                            <select class="form-control" name="payment" id="">
                                <option value="1" @if(old('payment') ? old('payment') == 1 : $booking->payment == 1) selected @endif>Tiền mặt</option>
                                <option value="2" @if(old('payment') ? old('payment') == 2 : $booking->payment == 2) selected @endif>Stripe</option>
                                <option value="3" @if(old('payment') ? old('payment') == 3 : $booking->payment == 3) selected @endif>Momo</option>
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
                                <option value="1" @if(old('payment_status') ? old('payment_status') == 1 : $booking->payment_status == 1) selected @endif>Chưa thanh toán</option>
                                <option value="2" @if(old('payment_status') ? old('payment_status') == 2 : $booking->payment_status == 2) selected @endif>Đã đặt cọc</option>
                                <option value="3" @if(old('payment_status') ? old('payment_status') == 3 : $booking->payment_status == 3) selected @endif>Đã thanh toán</option>
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
                                <option value="1" @if(old('status') ? old('status') == 1 : $booking->status == 1) selected @endif>Chờ xác nhận</option>
                                <option value="2" @if(old('status') ? old('status') == 2 : $booking->status == 2) selected @endif>Đã xác nhận</option>
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
            let tour = JSON.parse($("#tour-selection :selected")[0].dataset.value)
            calculateTotalPrice(tour)

            $('.total-price').val()
            $("#tour-selection").change(function () {
                var optionSelected = $("option:selected", this);
                
                var tourData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;
                calculateTotalPrice(tourData)
                calculateTotalPriceAfterDiscount()
            })

            $('.price').change(function() {
                let selectedTour = $("#tour-selection :selected")
                let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
                calculateTotalPrice(tourData)
                calculateTotalPriceAfterDiscount()
            })

            function calculateTotalPrice(data) {
                let adultPrice = data.adult_price
                let childrenPrice = data.children_price
                let babyPrice = data.baby_price

                let adultNumber = $('input[name="adult_number"]').val()
                let childrenNumber = $('input[name="children_number"]').val()
                let babyNumber = $('input[name="baby_number"]').val()

                let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice
                $('.total-price').val(totalPrice)
            }

            $("#discount-selection").change(function () {
                calculateTotalPriceAfterDiscount()
            })

            function calculateTotalPriceAfterDiscount() {
                let selectedDiscount = $("#discount-selection :selected")
                let discountData = selectedDiscount[0].dataset.value != undefined ? JSON.parse(selectedDiscount[0].dataset.value) : null
                if (discountData != null) {
                    let discountRate = discountData.discount_rate
                    let totalPriceAfterDiscount = $('.total-price').val() * (1 - discountRate)
                    $('.total-price-after-discount').val(totalPriceAfterDiscount)
                } else {
                    let totalPriceAfterDiscount = $('.total-price').val()
                    $('.total-price-after-discount').val(totalPriceAfterDiscount)
                }
            }
        })
    </script>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
            if ($('#user_id').val() != '') {
                $('#booking_person_name').prop('readonly', true);
                $('#booking_person_phone').prop('readonly', true);
                $('#booking_person_email').prop('readonly', true);
                $('#booking_person_address').prop('readonly', true);
            }

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
@endsection --}}
