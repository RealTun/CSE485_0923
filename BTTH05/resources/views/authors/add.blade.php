@extends('layouts.base')

@section('title')
    Tác giả
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('authors.index') }}">Tác giả</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('books.index') }}">Sách</a>
    </li>
@endsection

@section('main')
    <main class="container vh-100 mt-5">
        <div>
            <form action="{{ route('authors.store') }}" method="post">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tên tác giả</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Thêm" class="btn btn-success"></input>
                    <a href="{{ route('authors.index') }}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </main>
@endsection
