@extends('layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh mục</h1>
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

            <form action="" class="form-inline mb-3">
                <div class="form-group w-100">
                    <input type="number" class="form-control mr-2" placeholder="Id" name="id" value="{{ request()->get('id') }}">
                    <input type="text" class="form-control mr-2" placeholder="Tên danh mục" style="width: 30vw" name="name" value="{{ request()->get('name') }}">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>

                    <a href="{{ route('get.categories.create') }}" class="btn btn-success" style="margin-left: auto">
                        Tạo mới
                    </a>
                </div>
            </form>
            <table class="table table-bordered table-hover" style="background: #fff">
                <thead>
                    <tr>
                        <th scope="col" width="10%">ID</th>
                        <th scope="col" width="40%">Tên</th>
                        <th scope="col" width="40%">Mã danh mục</th>
                        <th scope="col" width="10%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->code }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('get.categories.edit', ['id' => $category->id]) }}" class="btn btn-warning mr-2">
                                        <i class="fa fa-pen" style="color: #fff"></i>
                                    </a>
                                    <form action="{{ route('post.categories.delete', ['id' => $category->id]) }}" method="POST" onsubmit="return confirm('Bạn thực sự muốn xóa bản ghi này?')">
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
                {{ $categories->appends(request()->input())->links() }}
            </div>
        </div>
    </section>
@endsection
