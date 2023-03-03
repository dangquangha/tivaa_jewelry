@extends('layouts.app')

@section('title', 'Cập nhật ản phẩm')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sản phẩm</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('get.products') }}">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form class="w-50" action="{{ route('post.products.update', ['id' => $product->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                    <label>Mã sản phẩm <span class="text-muted">(Sẽ tự tạo nếu bỏ trống)</span></label>
                    <input type="text" class="form-control" name="code" value="{{ $product->code }}">
                    @error('code')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="image" style="display: block">
                </div>

                <div class="form-group">
                    <label>Danh mục <span class="text-danger">(*)</span></label>
                    <select class="form-control" name="category">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {!! $product->category_id == $category->id ? 'selected' : '' !!}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="provider">
                        <option value="">Chọn nhà cung cấp</option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}" {!! $product->provider_id == $provider->id ? 'selected' : '' !!}>
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Giá nhập</label>
                    <input type="number" class="form-control" name="price_buy" value="{{ $product->price_buy }}">
                </div>

                <div class="form-group">
                    <label>Giá bán</label>
                    <input type="number" class="form-control" name="price_sale" value="{{ $product->price_sale }}">
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="3" name="note">{{ $product->note }}</textarea>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </section>
@endsection
