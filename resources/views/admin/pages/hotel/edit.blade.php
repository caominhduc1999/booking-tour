@extends('admin.layouts.master')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Khách sạn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hotels.index') }}">Danh sách khách sạn</a></li>
                        <li class="breadcrumb-item active">Sửa khách sạn</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa khách sạn</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('hotels.update', $hotel->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $hotel->name }}" id="exampleInputEmail1" placeholder="Tên">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT nóng</label>
                            <input type="text" class="form-control" name="hotline" value="{{ old('hotline') ?? $hotel->hotline }}" id="exampleInputEmail1" placeholder="SĐT nóng">
                            @error('hotline')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <textarea class="form-control" name="address" id="local-upload" cols="30" rows="10">{!! old('address') ?? $hotel->address !!}</textarea>
                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá tiền 1 ngày</label>
                            <input type="number" class="form-control" name="price_per_day" value="{{ old('price_per_day') ?? $hotel->price_per_day }}" id="exampleInputEmail1" placeholder="Giá tiền 1 ngày">
                            @error('price_per_day')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá tiền 1 đêm</label>
                            <input type="number" class="form-control" name="price_per_night" value="{{ old('price_per_night') ?? $hotel->price_per_night }}" id="exampleInputEmail1" placeholder="Giá tiền 1 đêm">
                            @error('price_per_night')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ghi chú</label>
                            <textarea class="form-control" name="note" id="local-upload" cols="30" rows="10">{!! old('note') ?? $hotel->note !!}</textarea>
                            @error('note')
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
