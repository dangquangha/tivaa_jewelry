@extends('layouts.app')

@section('title', 'Cập nhật danh mục')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh mục</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('get.categories') }}">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form class="w-50" action="{{ route('post.categories.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên danh mục <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mã danh mục <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" name="code" value="{{ $category->code }}">
                    @error('code')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </section>
@endsection
