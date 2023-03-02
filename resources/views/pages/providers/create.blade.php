@extends('layouts.app')

@section('title', 'Thêm mới nhà cung cấp')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nhà cung cấp</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('get.providers') }}">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item active">Tạo mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form class="w-50" action="{{ route('post.providers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên nhà cung cấp <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="5" name="note">{{ old('note') }}</textarea>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </section>
@endsection
