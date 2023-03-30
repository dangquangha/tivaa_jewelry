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

                <div class="form-group">
                    <label>Phí phát sinh </label>
                    <input type="number" class="form-control" name="costs_incurred" value="{{ old('costs_incurred') }}" min="0" placeholder="Phí phát sinh">
                    <small class="form-text text-danger">Tổng các chi phí phải chịu như free ship, hộp, túi,... Phải ghi rõ ở mục ghi chú</small>
                </div>

                <div class="form-group">
                    <label>Phụ phí thu thêm </label>
                    <input type="number" class="form-control" name="surcharge" value="{{ old('surcharge') }}" min="0" placeholder="Phụ phí">
                    <small class="form-text text-danger">Tổng các chi phí thu thêm. Nếu phí ship bên thứ 3 khách trả thì không thêm</small>
                </div>

                <div class="form-group">
                    <label>Đã cọc </label>
                    <input type="number" class="form-control" name="deposit" value="{{ old('deposit') }}" min="0" placeholder="Đã cọc">
                </div>

                <div class="form-group">
                    <label>Giảm giá </label>
                    <input type="number" class="form-control" name="discount" value="{{ old('discount') }}" min="0" placeholder="Giảm giá">
                    @error('discount')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @php
                    $order = new App\Models\Order();
                @endphp
                <div class="form-group">
                    <label>Trạng thái </label>
                    <select class="form-control" name="status">
                        <option value="{{ $order::STATUS_PREPARE }}" selected>
                            {{ $order::STATUS_TEXT[$order::STATUS_PREPARE] }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="3" name="note">{{ old('note') }}</textarea>
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
