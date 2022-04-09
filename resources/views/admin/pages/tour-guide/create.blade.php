@extends('admin.layouts.master')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hướng dẫn viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tour-guides.index') }}">Danh sách hướng dẫn viên</a></li>
                        <li class="breadcrumb-item active">Thêm hướng dẫn viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới hướng dẫn viên</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('tour-guides.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Tên" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="SĐT" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Địa chỉ" value="{{ old('address') }}">
                            @error('address')
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
