@extends('layouts.app')

@section('title', 'Thêm mới đơn hàng')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/pages/orders/create.css') }}"/>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Đơn hàng</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('get.orders') }}">Đơn hàng</a>
                        </li>
                        <li class="breadcrumb-item active">Tạo mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form class="w-50" action="{{ route('post.orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên khách hàng <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Số điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Địa chỉ <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    @error('address')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 list-row-product">
                    <div style="display: flex; align-items: center" class="mb-2">
                        <label class="mb-0">Sản phẩm</label>
                        <button class="btn btn-success btn-sm ml-2 add-row-product" type="button">
                            Thêm <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="form-row row-product">
                        <div class="col-sm-3 my-1">
                            <input type="text" class="form-control" name="product_codes[]" placeholder="Mã sản phẩm" required>
                        </div>
                        <div class="col-sm-3 my-1">
                            <input type="number" min="1" class="form-control" name="product_quantitys[]" placeholder="Số lượng" required>
                        </div>
                        <div class="col-sm-2 my-1 delete-row-product d-none">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>

                @php
                    $order = new App\Models\Order();
                @endphp
                <div class="form-group">
                    <label>Kiểu đơn hàng </label>
                    <select class="form-control" name="type">
                        <option value="{{ $order::TYPE_SHIP_COD }}">
                            {{ $order::TYPE_TEXT[$order::TYPE_SHIP_COD] }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng thái </label>
                    <select class="form-control" name="status">
                        <option value="{{ $order::STATUS_PREPARE }}" selected>
                            {{ $order::STATUS_TEXT[$order::STATUS_PREPARE] }}
                        </option>
                    </select>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/pages/orders/create.js') }}"></script>
@endsection
