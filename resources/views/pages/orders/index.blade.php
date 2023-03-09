@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Đơn hàng</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            Danh sách
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Cập nhật thành công!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    session()->forget('success');
                @endphp
            @endif

            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Cập nhật thất bại!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    session()->forget('fail');
                @endphp
            @endif

            @php
                $type = \App\Models\Order::TYPE_TEXT;
                $status = \App\Models\Order::STATUS_TEXT;
            @endphp 
            <form action="" class="form-inline mb-3">
                <div class="form-group w-100">
                    <input type="text" class="form-control mr-2" placeholder="Mã đơn hàng" name="code" value="{{ request()->get('code') }}">
                    <input type="text" class="form-control mr-2" placeholder="Số điện thoại" name="phone" value="{{ request()->get('phone') }}">
                    <select class="form-control mr-2" name="type">
                        <option value="">Loại</option>
                        @foreach($type as $key => $t)
                            <option value="{{ $key }}" {!! request()->get('type') && request()->get('type') == $key ? 'selected' : '' !!}>
                                {{ $t }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-control mr-2" name="status">
                        <option value="">Trạng thái</option>
                        @foreach($status as $key => $s)
                            <option value="{{ $key }}" {!! request()->get('status') && request()->get('status') == $key ? 'selected' : '' !!}>
                                {{ $s }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>

                    <a href="{{ route('get.orders.create') }}" class="btn btn-success" style="margin-left: auto">
                        Tạo mới
                    </a>
                </div>
            </form>
            <table class="table table-bordered table-hover" style="background: #fff">
                <thead>
                    <tr>
                        <th scope="col" width="4%">ID</th>
                        <th scope="col" width="8%">Code</th>
                        <th scope="col" width="12.5%">Tên khách</th>
                        <th scope="col" width="12.5%">SĐT</th>
                        <th scope="col" width="25%">Địa chỉ</th>
                        <th scope="col" width="10%">Tổng tiền</th>
                        <th scope="col" width="9%">Loại</th>
                        <th scope="col" width="9%">Trạng thái</th>
                        <th scope="col" width="10%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @php
                            $total = 0;
                            foreach ($order->orderProducts as $orderProduct) {
                                $product = $orderProduct->product; 
                                $total += $product ? $product->price_sale * $orderProduct->quantity : 0;
                            }
                        @endphp
                        <tr>
                            <td>{{ $order->id }}</th>
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ number_format($total) }}</td>
                            <td>{{ $type[$order->type] }}</td>
                            <td>{{ $status[$order->status] }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('get.orders.show', ['id' => $order->id]) }}" class="btn btn-success mr-2">
                                        <i class="fa fa-eye" style="color: #fff"></i>
                                    </a>

                                    <a href="{{ route('get.orders.edit', ['id' => $order->id]) }}" class="btn btn-warning">
                                        <i class="fa fa-pen" style="color: #fff"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </section>
@endsection
