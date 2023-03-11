@extends('layouts.app')

@section('title', 'Cập nhật đơn hàng')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/pages/orders/create.css') }}"/>
    <style>
        .label-w-200 {
            width: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Đơn hàng {{ $order->id }} - {{ $order->created_at->format('h:i:s d/m/Y') }}</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('get.orders') }}">Đơn hàng</a>
                        </li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @php
        $orderModel = new App\Models\Order();
    @endphp
    <section class="content">
        <div class="container-fluid">
            <form class="w-50">
                <div class="form-group">
                    <label class="label-w-200">Mã đơn: </label> <span>{{ $order->code }}</span>
                </div>

                <div class="form-group">
                    <label class="label-w-200">Tên khách hàng: </label> <span>{{ $order->name }}</span>
                </div>

                <div class="form-group">
                    <label class="label-w-200">Số điện thoại: </label> <span>{{ $order->phone }}</span>
                </div>

                <div class="form-group">
                    <label class="label-w-200">Địa chỉ: </label> <span>{{ $order->address }}</span>
                </div>

                <div class="form-group">
                    <label class="label-w-200">Kiểu đơn hàng: </label> <span>{{ $orderModel::TYPE_TEXT[$order->type] }}</span>
                </div>

                <div class="form-group">
                    <label class="label-w-200">Trạng thái: </label> <span>{{ $orderModel::STATUS_TEXT[$order->status] }}</span>
                </div>

                <div class="form-group" style="display: flex; justify-content: space-between">
                    <label class="label-w-200">Ghi chú: </label> 
                    <p style="width: calc(100% - 200px)">{{ $order->note ?? 'Không có ghi chú nào' }}</p>
                </div>

                <div class="mb-3 list-row-product">
                    <div style="display: flex; align-items: center" class="mb-2">
                        <label class="mb-0">Chi tiết hóa đơn: </label>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col" class="pl-0">Mã sản phẩm</td>
                                <td scope="col">Tên sản phẩm</td>
                                <td scope="col">Giá nhập</td>
                                <td scope="col">Giá bán</td>
                                <td scope="col" class="text-center">Số lượng</td>
                                <td scope="col" class="pr-0">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($order->orderProducts as $orderProduct)
                                <tr>
                                    <td class="pl-0">{{ $orderProduct->product->code }}</td>
                                    <td>{{ $orderProduct->product->name }}</td>
                                    <td>{{ number_format($orderProduct->price_buy) }}</td>
                                    <td>{{ number_format($orderProduct->price_sale) }}</td>
                                    <td class="text-center">{{ $orderProduct->quantity }}</td>
                                    <td class="pr-0">{{ number_format($orderProduct->quantity * $orderProduct->price_sale) }}</td>
                                    @php
                                        $total += $orderProduct->quantity * $orderProduct->price_sale;
                                    @endphp
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="pl-0"><b>Giảm giá:</b></td>
                                <td colspan="5" class="pr-0">{{ number_format($order->discount) }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="pl-0"><b>Tổng tiền:</b></td>
                                <td colspan="5" class="pr-0"><b>{{ number_format($total - $order->discount) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/pages/orders/create.js') }}"></script>
@endsection
