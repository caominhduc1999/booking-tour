@extends('admin.layouts.master')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Danh sách người dùng</a></li>
                        <li class="breadcrumb-item active">Sửa người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa người dùng</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Tên" value="{{ old('name') ?? $user->name }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="SĐT" value="{{ old('phone') ?? $user->phone }}">
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <select class="form-control" name="gender" id="">
                                <option value="1" @if(old('gender') ? old('gender') == 1 : $user->gender == 1) selected @endif>Nam</option>
                                <option value="2" @if(old('gender') ? old('gender') == 2 : $user->gender == 2) selected @endif>Nữ</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vai trò</label>
                            <select class="form-control" name="role" id="">
                                <option value="1" @if(old('role') ? old('role') == 1 : $user->role == 1) selected @endif>Admin</option>
                                <option value="2" @if(old('role') ? old('role') == 2 : $user->role == 2) selected @endif>Người dùng</option>
                            </select>
                            @error('role')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Địa chỉ" value="{{ old('address') ?? $user->address }}">
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
