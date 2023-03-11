@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sản phẩm</h1>
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

            <form action="" class="form-inline mb-3">
                <div class="form-group w-100">
                    <input type="number" class="form-control mr-2" placeholder="Id" name="id" value="{{ request()->get('id') }}">
                    <input type="text" class="form-control mr-2" placeholder="Tên sản phẩm" name="name" value="{{ request()->get('name') }}">
                    <input type="text" class="form-control mr-2" placeholder="Mã sản phẩm" name="code" value="{{ request()->get('code') }}">
                    <select class="form-control mr-2" name="category_id">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {!! request()->get('category_id') == $category->id ? 'selected' : '' !!}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-control mr-2" name="provider_id">
                        <option value="">Nhà phân phối</option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}" {!! request()->get('provider_id') == $provider->id ? 'selected' : '' !!}>
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>

                    <a href="{{ route('get.products.create') }}" class="btn btn-success" style="margin-left: auto">
                        Tạo mới
                    </a>
                </div>
            </form>
            <p class="text-danger">
                Để có thể xem chi tiết hình ảnh sản phẩm vui lòng vào <a href="https://drive.google.com/drive/folders/1ZJkACx1mL900ScEE-VzaVCmieE7oR5ci">Link</a> rồi tìm kiếm theo thư mục và mã sản phẩm
            </p> 
            <table class="table table-bordered table-hover" style="background: #fff">
                <thead>
                    <tr>
                        <th scope="col" width="5%">ID</th>
                        <th scope="col" width="15%">Tên</th>
                        <th scope="col" width="10%">Mã</th>
                        <th scope="col" width="12.5%">Loại</th>
                        <th scope="col" width="12.5%">Nguồn</th>
                        <th scope="col" width="10%">Giá nhập</th>
                        <th scope="col" width="10%">Giá bán</th>
                        <th scope="col" width="10%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->category ? $product->category->name : '---' }}</td>
                            <td>{{ $product->provider ? $product->provider->name : '---' }}</td>
                            <td>{{ number_format($product->price_buy) }}</td>
                            <td>{{ number_format($product->price_sale) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('get.products.edit', ['id' => $product->id]) }}" class="btn btn-warning mr-2">
                                        <i class="fa fa-pen" style="color: #fff"></i>
                                    </a>
                                    <form action="{{ route('post.products.delete', ['id' => $product->id]) }}" method="POST" onsubmit="return confirm('Bạn thực sự muốn xóa bản ghi này?')">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection
