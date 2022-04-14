<h1>Thông tin đặt tour:</h1>
<p>Tên tour: {{ \App\Models\Tour::find($data['tour_id'])->name }}</p>
<p>Tên người đặt: {{ $data['booking_person_name'] }}</p>
<p>SĐT người đặt: {{ $data['booking_person_phone'] }}</p>
<p>Email người đặt: {{ $data['booking_person_email'] }}</p>
<p>Địa chỉ người đặt: {{ $data['booking_person_address'] }}</p>
<p>Ngày đặt: {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('d-m-Y') }}</p>
<p>Số lượng người lớn: {{ $data['adult_number'] }}</p>
<p>Số lượng trẻ em: {{ $data['children_number'] }}</p>
<p>Số lượng trẻ nhỏ: {{ $data['baby_number'] }}</p>
<p>Ghi chú: {!! $data['note'] !!}</p>
<p>Tổng tiền: {{ number_format($data['total_price']) }} VNĐ</p>
<p>Phương thức thanh toán: 
    @switch($data['payment'])
        @case(1)
            <span>Thanh toán tại quầy</span>
            @break
        @case(2)
            <span>Paypal</span>
            @break
        @case(3)
            <span>Momo</span>
            @break
        @case(4)
            <span>Vnpay</span>
            @break
        @default
            <span></span>
    @endswitch
</p>
<p>Trạng thái thanh toán: 
    @switch($data['payment_status'])
        @case(1)
            <span>Chưa thanh toán</span>
            @break
        @case(2)
            <span>Đã đặt coc</span>
            @break
        @case(3)
            <span>Đã thanh toán</span>
            @break
        @default
            <span></span>
    @endswitch
</p>
<p>Trạng thái đặt tour: {{ $data['status'] == 1 ? 'Chờ xác nhận' : 'Đã xác nhận' }}</p>
