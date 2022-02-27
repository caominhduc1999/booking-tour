@extends('admin.layouts.master')


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
                        <li class="breadcrumb-item"><a href="{{ route('tours.index') }}">Danh sách tour</a></li>
                        <li class="breadcrumb-item active">Sửa tour</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa tour</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('tours.update', $tour->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hướng dẫn viên</label>
                            <select class="form-control" name="tour_guide_id" id="">
                                <option value=""></option>
                                @foreach($tourGuides as $tourGuide)
                                    <option value="{{ $tourGuide->id }}" @if(old('tour_guide_id') ? old('tour_guide_id') == $tourGuide->id : $tour->tour_guide_id == $tourGuide->id) selected @endif>{{ $tourGuide->name }}</option>
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
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Tên tour" value="{{ old('name') ?? $tour->name }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh tour</label>
                            <br>
                            <img src="{{ URL::asset('storage/images/' . $tour->image) }}" height="100px" width="100px" />
                            <br>
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
                                    <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="Mã tour" value="{{ old('code') ?? $tour->code }}">
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
                                        <option value=""></option>
                                        <option value="1" @if(old('type') ? old('type') == 1 : $tour->type == 1) selected @endif>Trong nước</option>
                                        <option value="2" @if(old('type') ? old('type') == 2 : $tour->type == 2) selected @endif>Ngoài nước</option>
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
                                        <option value="1" @if(old('frequency') ? old('frequency') == 1 : $tour->frequency == 1) selected @endif>Hằng ngày</option>
                                        <option value="2" @if(old('frequency') ? old('frequency') == 2 : $tour->frequency == 2) selected @endif>Liên hệ</option>
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
                                    <input type="text" class="form-control" name="departure" id="exampleInputEmail1" placeholder="Nơi khởi hành" value="{{ old('departure') ?? $tour->departure }}">
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
                                    <input type="text" class="form-control" name="destination" id="exampleInputEmail1" placeholder="Nơi đến" value="{{ old('destination') ?? $tour->destination }}">
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
                            <select class="js-example-basic-multiple form-control" name="hotel_ids[]" multiple="multiple" id="hotel-ids">
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour nổi bật</label>
                                    <select class="form-control" name="is_feature" id="">
                                        <option value="1" @if(old('is_feature') ? old('is_feature') == 1 : $tour->is_feature == 1) selected @endif>Không</option>
                                        <option value="2" @if(old('is_feature') ? old('is_feature') == 2 : $tour->is_feature == 2) selected @endif>Nổi bật</option>
                                    </select>
                                    @error('is_feature')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số người giới hạn</label>
                                    <input type="number" class="form-control" name="people_limit" id="exampleInputEmail1" placeholder="Số người giới hạn" value="{{ old('people_limit') ?? $tour->people_limit }}">
                                    @error('people_limit')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số ngày</label>
                                    <input type="number" class="form-control" name="days" id="exampleInputEmail1" placeholder="Số ngày" value="{{ old('days') ?? $tour->days }}">
                                    @error('days')
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
                                    <input type="number" class="form-control" name="adult_price" id="exampleInputEmail1" placeholder="Giá tiền / người lớn" value="{{ old('adult_price') ?? $tour->adult_price }}">
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
                                    <input type="number" class="form-control" name="children_price" id="exampleInputEmail1" placeholder="Giá tiền / trẻ em" value="{{ old('children_price') ?? $tour->children_price }}">
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
                                    <input type="number" class="form-control" name="baby_price" id="exampleInputEmail1" placeholder="Giá tiền / trẻ sơ sinh" value="{{ old('baby_price') ?? $tour->baby_price }}">
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
                            <input type="text" class="form-control" name="transport" id="exampleInputEmail1" placeholder="Phương tiện" value="{{ old('transport') ?? $tour->transport }}">
                            @error('transport')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea class="form-control" name="description" id="local-upload" cols="30" rows="10">{!! old('description') ?? $tour->description !!}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lịch trình</label>
                            <textarea class="form-control" name="schedule" id="local-upload" cols="30" rows="10">{!! old('schedule') ?? $tour->schedule !!}</textarea>
                            @error('schedule')
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
            let hotelIds = @json($initialHotelIds);
            $('#hotel-ids').select2().val(hotelIds).trigger('change');
        })
    </script>
@endsection
