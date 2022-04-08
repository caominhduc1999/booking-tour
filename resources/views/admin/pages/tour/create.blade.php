@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<style>
    @media only screen and (max-width: 768px) {
        .select2-selection {
            width: 350px;
        }
    }
</style>
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
                        <li class="breadcrumb-item"><a href="{{ route('tours.index') }}">Danh sách Tour</a></li>
                        <li class="breadcrumb-item active">Thêm Tour</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới tour</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('tours.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hướng dẫn viên</label>
                            <select class="form-control" name="tour_guide_id" id="">
                                <option value=""></option>
                                @foreach($tourGuides as $tourGuide)
                                    <option value="{{ $tourGuide->id }}" @if(old('tour_guide_id') == $tourGuide->id) selected @endif>{{ $tourGuide->name }}</option>
                                @endforeach
                            </select>
                            @error('tour_guide_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tour</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Tên tour" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh tour</label>
                            <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã tour</label>
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="Mã tour" value="{{ old('code') }}">
                                    @error('code')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại tour</label>
                                    <select class="form-control" name="type" id="">
                                        <option value="" selected></option>
                                        <option value="1" @if(old('type') == 1) selected @endif>Trong nước</option>
                                        <option value="2" @if(old('type') == 2) selected @endif>Ngoài nước</option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tần suất</label>
                                    <select class="form-control" name="frequency" id="">
                                        <option value=""></option>
                                        <option value="1" @if(old('frequency') == 1) selected @endif>Hằng ngày</option>
                                        <option value="2" @if(old('frequency') == 2) selected @endif>Liên hệ</option>
                                    </select>
                                    @error('frequency')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nơi khởi hành</label>
                                    <input type="text" class="form-control" name="departure" id="exampleInputEmail1" placeholder="Nơi khởi hành" value="{{ old('departure') }}">
                                    @error('departure')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nơi đến</label>
                                    <input type="text" class="form-control" name="destination" id="exampleInputEmail1" placeholder="Nơi đến" value="{{ old('destination') }}">
                                    @error('destination')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khách sạn</label>
                            <select class="js-example-basic-multiple form-control" name="hotel_ids[]" multiple="multiple">
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour nổi bật</label>
                                    <select class="form-control" name="is_feature" id="">
                                        <option value=""></option>
                                        <option value="1" @if(old('is_feature') == 1) selected @endif>Không</option>
                                        <option value="2" @if(old('is_feature') == 2) selected @endif>Nổi bật</option>
                                    </select>
                                    @error('is_feature')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số người giới hạn</label>
                                    <input type="number" class="form-control" name="people_limit" id="exampleInputEmail1" placeholder="Số người giới hạn" value="{{ old('people_limit') }}">
                                    @error('people_limit')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số ngày</label>
                                    <input type="number" class="form-control" name="days" id="exampleInputEmail1" placeholder="Số ngày" value="{{ old('days') }}">
                                    @error('days')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số đêm</label>
                                    <input type="number" class="form-control" name="nights" id="exampleInputEmail1" placeholder="Số đêm" value="{{ old('nights') }}">
                                    @error('nights')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá tiền / người lớn</label>
                                    <input type="number" class="form-control" name="adult_price" id="exampleInputEmail1" placeholder="Giá tiền / người lớn" value="{{ old('adult_price') }}">
                                    @error('adult_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá tiền / trẻ em</label>
                                    <input type="number" class="form-control" name="children_price" id="exampleInputEmail1" placeholder="Giá tiền / trẻ em" value="{{ old('children_price') }}">
                                    @error('children_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá tiền / trẻ sơ sinh</label>
                                    <input type="number" class="form-control" name="baby_price" id="exampleInputEmail1" placeholder="Giá tiền / trẻ sơ sinh" value="{{ old('baby_price') }}">
                                    @error('baby_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phương tiện</label>
                            <input type="text" class="form-control" name="transport" id="exampleInputEmail1" placeholder="Phương tiện" value="{{ old('transport') }}">
                            @error('transport')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hành trình</label>
                            <input type="text" class="form-control" name="journey" id="exampleInputEmail1" placeholder="Hành trình" value="{{ old('journey') }}">
                            @error('journey')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khởi hành</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="mdp-demo"></div>
                                </div>
                                <div class="col-md-8">
                                    <p id="selected_date"></p>
                                </div>
                            </div>
                            <input type="text" hidden name="departure_date" id="departure_date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiền đặt cọc tối thiểu</label>
                            <input type="number" class="form-control" name="deposit" id="exampleInputEmail1" placeholder="Tiền đặt cọc tối thiểu" value="{{ old('deposit', 0) }}">
                            @error('deposit')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea class="form-control" name="description" id="local-upload" cols="30" rows="10">{!! old('description') !!}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lịch trình</label>
                            <textarea class="form-control" name="schedule" id="local-upload" cols="30" rows="10">{!! old('schedule') !!}</textarea>
                            @error('schedule')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" id="button-submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css" rel="stylesheet"/>
<link href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css" rel="stylesheet"/>
<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
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

        var $j = jQuery.noConflict();
        $j('#mdp-demo').multiDatesPicker({
            onSelect: function() {
                let dateArray = $j('#mdp-demo').multiDatesPicker('getDates')
                $('#departure_date').val(dateArray)
                let html = ''
                dateArray.forEach(function(item) {
                    html += `${item}<br>`
                })
                $('#selected_date').html(html)
            }
        });
    })
</script>
@endsection