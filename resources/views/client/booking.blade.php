@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/shop.css') }}" rel="stylesheet">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
@endsection

@section('content')
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Đặt tour </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Đặt tour </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!--cart product wrapper Wrapper Start -->
    <div class="cart_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                        <h1>Thông tin đặt tour của bạn</h1>
                    </div>
                </div>
                <div class="shop_cart_page_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="width: 200px; height: 200px;"
                                        src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}"
                                        alt="">

                                    <p><a href="{{ route('client.tours.detail', $tour->id) }}" target="_blank">Thông tin
                                            chi tiết</a></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Mã tour: {{ $tour->code }}</b><br>
                                            <b>Tên tour: {{ $tour->name }}</b><br>
                                            <b>Loại tour: {{ $tour->type == 1 ? 'Trong nước' : 'Quốc tế' }}</b><br>
                                            <b>Số người giới hạn: {{ $tour->people_limit }}</b><br>
                                            <b>Thời gian: {{ $tour->days }} ngày - {{ $tour->nights }} đêm</b>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Giá vé: </b><br>
                                            <b>Người lớn: {{ number_format($tour->adult_price) }} VNĐ / vé</b><br>
                                            <b>Trẻ em: {{ number_format($tour->children_price) }} VNĐ / vé</b><br>
                                            <b>Trẻ nhỏ: {{ number_format($tour->baby_price) }} VNĐ / vé</b><br>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Hành trình: {{ $tour->journey }}</b><br>
                                            <b>Điểm khởi hành: {{ $tour->departure }}</b><br>
                                            <b>Điểm đến: {{ $tour->destination }}</b><br>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Lịch khởi hành:</b>
                                            <div id="validDepartureDateArray"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h2>Vui lòng nhập đầy đủ thông tin đặt tour</h2>
                            <br>
                            <form action="{{ route('confirm.booking', $tour->id) }}" id="booking-form" method="post">
                                @csrf
                                <div class="row" style="margin-left: 0px;">
                                    <label>Ngày khởi hành</label>
                                    <br>
                                    <input type="text" name="start_date" id="my_date_picker" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Số lượng người lớn</label>
                                        <input type="number" name="adult_number" value="{{ old('adult_number') }}" min="0" class="form-control price-person">
                                        @error('adult_number')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Số lượng trẻ em (từ 6 - 12 tuổi)</label>
                                        <input type="number" name="children_number" min="0"
                                            class="form-control price-person" value="{{ old('children_number') }}">
                                        @error('children_number')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Số lượng trẻ nhỏ (dưới 6 tuổi)</label>
                                        <input type="number" name="baby_number" min="0" class="form-control price-person" value="{{ old('baby_number') }}">
                                        @error('baby_number')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Họ Tên</label>
                                        <input type="text" name="booking_person_name" class="form-control" value="{{ old('booking_person_name') }}">
                                        @error('booking_person_name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">SĐT</label>
                                        <input type="text" name="booking_person_phone" class="form-control" value="{{ old('booking_person_phone') }}">
                                        @error('booking_person_phone')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="booking_person_address" class="form-control" value="{{ old('booking_person_address') }}">
                                        @error('booking_person_address')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Email</label>
                                        <input type="email" name="booking_person_email" class="form-control" value="{{ old('booking_person_email') }}">
                                        @error('booking_person_email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Chọn khách sạn</label>
                                        <select name="hotel_id" id="hotel-selection" class="form-control">
                                            <option value="">Tự tìm khách sạn</option>
                                            @foreach ($tour->hotels as $hotel)
                                                <option value="{{ $hotel->id }}" @if(old('hotel_id') == $hotel->id) selected @endif data-value="{{ $hotel }}">{{ $hotel->name . ' (' . 'Giá tiền:' . number_format($hotel->price_per_day) . ' VNĐ/Ngày - ' . number_format($hotel->price_per_night) . ' VNĐ/đêm)' }}</option>
                                            @endforeach
                                        </select>
                                        @error('hotel_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>    
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control" name="note" id="" cols="30" rows="10">{!! old('note') !!}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="booking_price" id="booking-price">
                                <input type="hidden" name="discount_id" id="discount-id">
                            </form>
                        </div>

                        <div class="estimate_shiping_Wrapper_cntnt estimate_shiping_Wrapper_cntnt_2">
                            <div
                                class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head related_pdt_shop_head_2">
                                <h1>Nhập mã giảm giá : </h1>
                                <div class="lr_nl_form_wrapper">
                                    <form action="" id="discount-form" method="get">
                                        <input type="text" name="code" id="discount_code" placeholder="Mã giảm giá">
                                        <button type="button" id="discount-form-submit-btn">Áp dụng</button>
                                    </form>
                                </div>
                                <br>
                                <div style="margin-top: 40px;" id="discount-notify">
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="position: sticky; top: 20%;">

                        <div class="shipping_Wrapper">
                            <div class="estimate_shiping_Wrapper_cntnt estimate_shiping_Wrapper_repsnse">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Chi phí dự tính : </th>
                                            <td><span class="price total-price">0 VNĐ</span></td>
                                            <input type="hidden" id="total-price-input" name="total_price" value="0">
                                        </tr>
                                        <tr>
                                            <th>Giảm giá :
                                                <br>
                                                <span style="font-size: 12px; color: blue;">(Không bao gồm phí khách sạn)</span>
                                            </th>
                                            <td><span class="price discount-price">0 VNĐ</span></td>
                                            
                                            <input type="hidden" id="discount-price-input" name="discount_price" value="0">
                                        </tr>
                                        <tr>
                                            <th>Chi phí khách sạn :</th>
                                            <td><span class="price hotel-price">0 VNĐ</span></td>
                                            <input type="hidden" id="hotel-price-input" name="hotel_price" value="0">
                                        </tr>
                                        <tr>
                                            <th class="cart_btn_cntnt"> Tổng tiền :</th>
                                            <td><span class="cart_btn_cntnt_clr total-price-after-discount">0 VNĐ</span> </td>
                                            <input type="hidden" id="whole-price-input" name="whole_price">
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="shop_btn_wrapper shop_btn_wrapper_shipping">
                                    <ul>
                                        <li><a id="booking-btn">Đặt tour</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- cart product wrapper end -->
@endsection

@section('scripts')
    <!-- blog js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
    <script>
        let departureDate = '{{ $tour->departure_date }}'
        let departureDateArray = departureDate.split(',')
        let validDepartureDateArray = [];
        departureDateArray.forEach(function(item) {
            let selectItemDate = item.split('/')
            let formatItemDate = `${selectItemDate[1]}/${selectItemDate[0]}/${selectItemDate[2]}`
            let currentDate = new Date()
            let itemDate = new Date(formatItemDate)
            if (itemDate > currentDate) {
                validDepartureDateArray.push(item)
            }
        })
        let html = ''
        validDepartureDateArray.forEach(function(item) {
            html += `<label>${item}</label><br>`
        })
        $('#validDepartureDateArray').html(html)

        $(document).ready(function() {
            localStorage.removeItem('discountRate')

            calculateTotalPrice()
            calculateTotalPriceAfterDiscount(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
            calculateDiscountPrice(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
            calculateHotelPrice()
            calculateWholePrice()

            $("#my_date_picker").datepicker({
                dateFormat: 'dd/mm/yy',
                beforeShowDay: function(date) {
                    var string = jQuery.datepicker.formatDate('dd/mm/yy', date);

                    return [validDepartureDateArray.indexOf(string) != -1]
                }
            })

            $('.price-person').change(function() {
                calculateTotalPrice()
                calculateTotalPriceAfterDiscount(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
                calculateDiscountPrice(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
                calculateWholePrice()
            })

            $('.price-person').keyup(function() {
                calculateTotalPrice()
                calculateTotalPriceAfterDiscount(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
                calculateDiscountPrice(localStorage.getItem('discountRate') != null ? localStorage.getItem('discountRate') : null)
                calculateWholePrice()
            })

            function calculateTotalPrice() {
                let adultPrice = '{{ $tour->adult_price }}'
                let childrenPrice = '{{ $tour->children_price }}'
                let babyPrice = '{{ $tour->baby_price }}'

                let adultNumber = $('input[name="adult_number"]').val()
                let childrenNumber = $('input[name="children_number"]').val()
                let babyNumber = $('input[name="baby_number"]').val()

                let totalPrice = adultNumber * adultPrice + childrenNumber * childrenPrice + babyNumber * babyPrice

                let currency = totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                $('.total-price').text(currency + ' VNĐ')
                $('#total-price-input').val(totalPrice)
            } 

            function calculateTotalPriceAfterDiscount(discountRate) {
                if (discountRate != null) {
                    let totalPriceAfterDiscount = parseInt($('.total-price').text().slice(0, -4).replace(',', '')) * (1 - discountRate)

                    $('.total-price-after-discount').text(totalPriceAfterDiscount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ')
                    $('#whole-price-input').val(totalPriceAfterDiscount)
                    $('#booking-price').val(totalPriceAfterDiscount)    // form
                } else {
                    let totalPriceAfterDiscount = parseInt($('.total-price').text().slice(0, -4).replace(',', ''))
                    $('.total-price-after-discount').text(totalPriceAfterDiscount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ')
                    $('#whole-price-input').val(totalPriceAfterDiscount)
                    $('#booking-price').val(totalPriceAfterDiscount)     // form
                }
            }

            function calculateDiscountPrice(discountRate)
            {
                if (discountRate != null) {
                    let totalPrice = parseInt($('.total-price').text().slice(0, -4).replace(',', ''))
                    let discountRateValue = (discountRate) * totalPrice
                    $('.discount-price').text('- ' + discountRateValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ')
                    $('#discount-price-input').val(discountRateValue)
                } else {
                    $('.discount-price').text('0 VNĐ')
                    $('#discount-price-input').val(0)
                }
            }

            $('#hotel-selection').change(function() {
                calculateHotelPrice()
                calculateWholePrice()
            })


            function calculateHotelPrice()
            {
                // var optionSelected = $("#hotel-selection option:selected", this);
                var optionSelected = $("#hotel-selection").find(":selected")
                var hotelData = optionSelected[0].dataset.value != undefined ? JSON.parse(optionSelected[0].dataset.value) : null;

                let tourDays = '{{ $tour->days }}'
                let tourNights = '{{ $tour->nights }}'
                var originalTotalPriceAfterDiscount = parseInt($('.total-price-after-discount').text().slice(0, -4).replace(',', ''))
                if (hotelData != undefined) {
                    let hotelPrice = hotelData.price_per_day * tourDays + hotelData.price_per_night * tourNights
                    $('.hotel-price').text(hotelPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ')
                    $('#hotel-price-input').val(hotelPrice)
                } else {
                    $('.hotel-price').text('0 VNĐ')
                    $('#hotel-price-input').val(0)
                }
            }

            function calculateWholePrice()
            {
                let originalTotalPriceAfterDiscount = parseInt($('#total-price-input').val())
                let hotelPrice = parseInt($('#hotel-price-input').val())
                let discountPrice = parseInt($('#discount-price-input').val())
                let wholePrice = originalTotalPriceAfterDiscount + hotelPrice - discountPrice

                $('.total-price-after-discount').text(wholePrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ')
                $('#booking-price').val(wholePrice)
            }

            $('#discount-form-submit-btn').click(function() {
                $('#discount-form').submit()
            })

            $('#discount-form').on('submit' ,function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                let code = $('#discount_code').val()

                $.ajax({
                    type: "GET",
                    url: '/get-discount/' + code,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        if (data.status) {
                            localStorage.setItem('discountRate', data.discount_rate ? data.discount_rate : null)
                            $('#discount-id').val(data.id ? data.id : null)
                            $('#discount-notify').html('<div style="color: green;">Áp dụng mã giảm giá thành công. Bạn được giảm giá ' + ((data.discount_rate) * 100) + '%</div>')
                            calculateDiscountPrice(data.discount_rate)
                            calculateTotalPriceAfterDiscount(data.discount_rate)
                            calculateWholePrice()
                        } else {
                            $('#discount-notify').html('<div style="color: red;">Mã giảm giá không tồn tại hoặc đã hết hạn</div>')
                        }
                    },
                    error: function (error)
                    {
                        $('#discount-notify').html('<div style="color: red;">Mã giảm giá không tồn tại hoặc đã hết hạn</div>')
                    }
                });
            })

            $('#booking-btn').click(function() {
                $('#booking-form').submit()
            })
        })
    </script>
@endsection
