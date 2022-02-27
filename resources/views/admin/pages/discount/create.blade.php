@extends('admin.layouts.master')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mã giảm giá</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('discounts.index') }}">Danh sách mã giảm giá</a></li>
                        <li class="breadcrumb-item active">Thêm mã giảm giá</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới mã giảm giá</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('discounts.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm</label>
                            <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="Mã giảm" value="{{ old('code') }}">
                            @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="start_date" id="exampleInputEmail1" placeholder="Ngày bắt đầu" value="{{ old('start_date') }}">
                            @error('start_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input type="date" class="form-control" name="end_date" id="exampleInputEmail1" placeholder="Ngày kết thúc" value="{{ old('end_date') }}">
                            @error('end_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">% giảm giá</label>
                            <input type="number" step="0.01" class="form-control" name="discount_rate" id="exampleInputEmail1" placeholder="% giảm giá" value="{{ old('discount_rate') }}">
                            @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="number" class="form-control" name="remain_number" id="exampleInputEmail1" placeholder="Số lượng" value="{{ old('remain_number') }}">
                            @error('code')
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
