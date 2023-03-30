@extends('layouts.app')

@section('title', 'Cập nhật đơn hàng')

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
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @php
        $orderModel = new App\Models\Order();
        $statusValid = $orderModel::STATUS_PREPARE;
    @endphp
    <section class="content">
        <div class="container-fluid">
            <form class="w-50" action="{{ route('post.orders.update', ['id' => $order->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên khách hàng <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $order->name }}" {{ $order->status == $statusValid ? '' : 'disabled' }}>
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Số điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="phone" value="{{ $order->phone }}" {{ $order->status == $statusValid ? '' : 'disabled' }}>
                    @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Địa chỉ <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="address" value="{{ $order->address }}" {{ $order->status == $statusValid ? '' : 'disabled' }}>
                    @error('address')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 list-row-product">
                    <div style="display: flex; align-items: center" class="mb-2">
                        <label class="mb-0">Sản phẩm</label>
                        <button class="btn btn-success btn-sm ml-2 add-row-product" type="button" {{ $order->status == $statusValid ? '' : 'disabled' }}>
                            Thêm <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    @foreach ($order->orderProducts as $orderProduct)
                        <div class="form-row row-product">
                            <div class="col-sm-3 my-1">
                                <input type="text" class="form-control" name="product_codes[]" placeholder="Mã sản phẩm" value="{{ $orderProduct->product->code }}" {{ $order->status == $statusValid ? '' : 'disabled' }} required>
                            </div>
                            <div class="col-sm-3 my-1">
                                <input type="number" min="1" class="form-control" name="product_quantitys[]" value="{{ $orderProduct->quantity }}" placeholder="Số lượng" {{ $order->status == $statusValid ? '' : 'disabled' }} required>
                            </div>
                            <div class="col-sm-2 my-1 delete-row-product d-none">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Phí phát sinh </label>
                    <input type="number" class="form-control" name="costs_incurred" value="{{ $order->costs_incurred }}" min="0" placeholder="Phí phát sinh">
                    <small class="form-text text-danger">Tổng các chi phí như ship, vỏ, túi,... Phải ghi rõ ở mục ghi chú</small>
                </div>

                <div class="form-group">
                    <label>Đã cọc </label>
                    <input type="number" class="form-control" name="deposit" value="{{ $order->deposit }}" {{ $order->status == $statusValid ? '' : 'disabled' }} min="0" placeholder="Đã cọc">
                </div>

                <div class="form-group">
                    <label>Giảm giá </label>
                    <input type="number" class="form-control" name="discount" value="{{ $order->discount }}" {{ $order->status == $statusValid ? '' : 'disabled' }} min="0" placeholder="Giảm giá">
                    @error('discount')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Trạng thái </label>
                    <select class="form-control" name="status">
                        @foreach ($orderModel::STATUS_TEXT as $key => $status)
                            <option value="{{ $key }}" {{ $key == $order->status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="3" name="note">{{ $order->note }}</textarea>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/pages/orders/create.js') }}"></script>
@endsection
