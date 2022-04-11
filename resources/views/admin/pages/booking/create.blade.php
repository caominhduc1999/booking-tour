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
                            <select class="form-control" name="tour_id" id="tour-selection">
                                <option value=""></option>
                                @foreach($tours as $tour)
                                    <option value="{{ $tour->id }}" @if(old('tour_id') == $tour->id) selected @endif data-value="{{ collect($tour, $tour->hotels->pluck('hotels.id')) }}">{{ $tour->name }}</option>
                                @endforeach
                            </select>
                            <div id="tour-info" style="background-color: yellow; padding: 15px;"></div>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Ngày khởi hành</label>
                                    {{-- <input type="date" class="form-control" name="start_date" id="exampleInputEmail1" placeholder="Ngày khởi hành" value="{{ old('start_date') }}"> --}}
                                    <input type="text" name="start_date" id="my_date_picker" value="{{ old('start_date') }}" readonly>
                                    @error('people_limit')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Lịch khởi hành sẵn có</label>
                                    <div id="validDepartureDateArray"></div>
                                </div>
                            </div>
                            @error('start_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng người lớn</label>
                            <input type="number" class="form-control price" name="adult_number" id="exampleInputEmail1" placeholder="Số lượng người lớn" value="{{ old('adult_number', 0) }}">
                            @error('adult_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ em</label>
                            <input type="number" class="form-control price" name="children_number" id="exampleInputEmail1" placeholder="Số lượng trẻ em" value="{{ old('children_number', 0) }}">
                            @error('children_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng trẻ sơ sinh</label>
                            <input type="number" class="form-control price" name="baby_number" id="exampleInputEmail1" placeholder="Số lượng trẻ sơ sinh" value="{{ old('baby_number', 0) }}">
                            @error('baby_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khách sạn</label>
                            <select class="form-control" name="hotel_id" id="hotel_id">
                                <option value="">Tự tìm khách sạn</option>
                                @foreach($hotels as $hotel)
                                    <option class="hotel_option" value="{{ $hotel->id }}" @if(old('hotel_id') == $hotel->id) selected @endif data-value="{{ $hotel }}">{{ $hotel->name . ' (' . 'Giá tiền:' . number_format($hotel->price_per_day) . ' VNĐ/ngày - ' . number_format($hotel->price_per_night) . ' VNĐ/đêm)' }}</option>
                                @endforeach
                            </select>
                            @error('hotel_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <input type="hidden" id="hotel_price">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tổng tiền</label>
                            <input type="number" class="form-control total-price" id="exampleInputEmail1" placeholder="0" value="" disabled>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <select class="form-control" name="discount_id" id="discount-selection">
                                <option value=""></option>
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->id }}" @if(old('discount_id') == $discount->id) selected @endif data-value="{{ $discount }}">{{ $discount->code }}</option>
                                @endforeach
                            </select>
                            @error('discount_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Tổng tiền (sau khi áp dụng mã giảm giá)</label>
                            <input type="number" class="form-control total-price-after-discount" id="exampleInputEmail1" placeholder="0" value="" disabled>
                        </div> --}}
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
                                <option value="1">TT tại quầy</option>
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
                                {{-- <option value="2">Đã đặt cọc</option> --}}
                                <option value="3">Đã thanh toán</option>
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css" rel="stylesheet"/>
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

            $("#tour-selection").change(function () {
                var optionSelected = $("option:selected", this);
                
                var tourData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;
                calculateTotalPrice(tourData)
                getDepartureDate()
                calculateHotelPrice()
                
                let validHotel = tourData.hotels.map(hotel => hotel.id)
                let selectObject = document.getElementById('hotel_id')
                for (var i=0; i<selectObject.length; i++) {
                    if (validHotel.includes(parseInt(selectObject.options[i].value)) == false && selectObject.options[i].value != '') {
                        selectObject.options[i].disabled = true
                        selectObject.options[i].style.backgroundColor = '#e9ecef'
                    } else {
                        selectObject.options[i].disabled = false;
                        selectObject.options[i].style.backgroundColor = '#ffffff'
                    }
                }

                if (tourData != null) {
                    $('#tour-info').html(
                        `<h5>Thông tin tour:</h5>
                        <p>Vé người lớn: ${priceFormat(tourData.adult_price) ?? ''} VNĐ</p>
                        <p>Vé trẻ em: ${priceFormat(tourData.children_price) ?? ''} VNĐ</p>
                        <p>Vé trẻ nhỏ: ${priceFormat(tourData.baby_price) ?? ''} VNĐ</p>
                        <p>Thời gian: ${tourData.days ?? ''} ngày - ${tourData.nights ?? ''} đêm</p>
                        `
                    )
                } else {
                    $('#tour-info').html('')
                }
                // calculateTotalPriceAfterDiscount()

            })

            $('.price').change(function() {
                let selectedTour = $("#tour-selection :selected")
                let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
                calculateTotalPrice(tourData)
                calculateHotelPrice()
                // calculateTotalPriceAfterDiscount()
            })

            $('.price').keyup(function() {
                let selectedTour = $("#tour-selection :selected")
                let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
                calculateTotalPrice(tourData)
                calculateHotelPrice()
                // calculateTotalPriceAfterDiscount()
            })

            $("#hotel_id").change(function () {
                // var optionSelected = $("option:selected", this);
                
                // var hotelData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;

                // let selectedTour = $("#tour-selection :selected")
                // let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
                // let hotelPrice = parseInt(hotelData.price_per_day) * parseInt(tourData.days) + parseInt(hotelData.price_per_night) * parseInt(tourData.nights);
                // $('#hotel_price').val(hotelPrice)
                // let hotelPriceValue = parseInt($('#hotel_price').val())

                // let adultPrice = tourData.adult_price
                // let childrenPrice = tourData.children_price
                // let babyPrice = tourData.baby_price

                // let adultNumber = $('input[name="adult_number"]').val()
                // let childrenNumber = $('input[name="children_number"]').val()
                // let babyNumber = $('input[name="baby_number"]').val()

                // let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice

                // $('.total-price').val(totalPrice + hotelPriceValue)
                calculateHotelPrice()
            })

            function calculateHotelPrice()
            {
                var optionSelected = $("#hotel_id :selected");
                
                var hotelData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;

                let selectedTour = $("#tour-selection :selected")
                let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
                if (hotelData != undefined) {
                    let hotelPrice = parseInt(hotelData.price_per_day) * parseInt(tourData.days) + parseInt(hotelData.price_per_night) * parseInt(tourData.nights);
                    $('#hotel_price').val(hotelPrice)
                    let hotelPriceValue = parseInt($('#hotel_price').val())

                    let adultPrice = tourData.adult_price
                    let childrenPrice = tourData.children_price
                    let babyPrice = tourData.baby_price
    
                    let adultNumber = $('input[name="adult_number"]').val()
                    let childrenNumber = $('input[name="children_number"]').val()
                    let babyNumber = $('input[name="baby_number"]').val()
    
                    let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice
    
                    $('.total-price').val(totalPrice + hotelPriceValue)
                } else {
                    if (tourData != null) {
                        let adultPrice = tourData.adult_price
                        let childrenPrice = tourData.children_price
                        let babyPrice = tourData.baby_price
        
                        let adultNumber = $('input[name="adult_number"]').val()
                        let childrenNumber = $('input[name="children_number"]').val()
                        let babyNumber = $('input[name="baby_number"]').val()
        
                        let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice
        
                        $('.total-price').val(totalPrice)
                    } else {
                        $('.total-price').val(0)
                    }
                }
            }

            function calculateTotalPrice(data) {
                if (data != null) {
                    let adultPrice = data.adult_price
                    let childrenPrice = data.children_price
                    let babyPrice = data.baby_price
    
                    let adultNumber = $('input[name="adult_number"]').val()
                    let childrenNumber = $('input[name="children_number"]').val()
                    let babyNumber = $('input[name="baby_number"]').val()
    
                    let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice
                    $('.total-price').val(totalPrice)
                } else {
                    $('.total-price').val(0)
                }
            }

            // $("#discount-selection").change(function () {
            //     calculateTotalPriceAfterDiscount()
            // })

            // function calculateTotalPriceAfterDiscount() {
            //     let selectedDiscount = $("#discount-selection :selected")
            //     let discountData = selectedDiscount[0].dataset.value != undefined ? JSON.parse(selectedDiscount[0].dataset.value) : null
            //     if (discountData != null) {
            //         let discountRate = discountData.discount_rate
            //         let totalPriceAfterDiscount = $('.total-price').val() * (1 - discountRate)
            //         $('.total-price-after-discount').val(totalPriceAfterDiscount)
            //     } else {
            //         let totalPriceAfterDiscount = $('.total-price').val()
            //         $('.total-price-after-discount').val(totalPriceAfterDiscount)
            //     }
            // }
            function priceFormat(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function getDepartureDate() {
                let selectedTour = $("#tour-selection :selected")
                let tourData = selectedTour[0].dataset.value != undefined ? JSON.parse(selectedTour[0].dataset.value) : null
               
                if (tourData != null) {
                    let departureDate = tourData.departure_date
                    let departureDateArray = departureDate.split(',')
                    let validDepartureDateArray = [];
                    let htmlDepartureDateArray = [];
                    departureDateArray.forEach(function(item) {
                        let selectItemDate = item.split('/')
                        let formatItemDate = `${selectItemDate[1]}/${selectItemDate[0]}/${selectItemDate[2]}`
                        let currentDate = new Date()
                        let itemDate = new Date(formatItemDate)
                        if (itemDate > currentDate) {
                            validDepartureDateArray.push(item)
                            $.ajax({
                                type: "GET",
                                url: '/get-remain-slot',
                                data: {
                                    tour_id: tourData.id,
                                    start_date: item
                                }, // serializes the form's elements.
                                success: function(data)
                                {
                                    remainSlot = data.remain_slot
                                    htmlDepartureDateArray.push({
                                        'date': item,
                                        'remain_slot': remainSlot
                                    });

                                    let html = ''
                                    htmlDepartureDateArray.forEach(function(item) {
                                        html += `<label>${item.date} - Còn ${item.remain_slot} chỗ</label><br>`
                                    })
                                    $('#validDepartureDateArray').html(html)
                                }
                            });
                        }
                    })
                    // let html = ''
                    // validDepartureDateArray.forEach(function(item) {
                    //     html += `<label>${item}</label><br>`
                    // })
                    // $('#validDepartureDateArray').html(html)
        
                    $.datepicker.regional['vi'] = {
                    monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    monthNamesShort: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                    dayNames: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'],
                    dayNamesShort: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
                    dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                    };
        
                    $.datepicker.setDefaults($.datepicker.regional['vi']);
                    $('#my_date_picker').datepicker('destroy');
                    $("#my_date_picker").datepicker({
                        dateFormat: 'dd/mm/yy',
                        beforeShowDay: function(date) {
                            var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
        
                            return [validDepartureDateArray.indexOf(string) != -1]
                        }
                    })
                } else {
                    $('#my_date_picker').datepicker('destroy');
                    $('#validDepartureDateArray').html('')
                }
            }
            getDepartureDate()
        })
    </script>
@endsection