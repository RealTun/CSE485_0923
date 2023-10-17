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
        <form action="{{route('authors.update', $author->id)}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">SỬA THÔNG TIN TÁC GIẢ</h3>
            <div class="mt-4">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Mã tác giả</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="id" value="{{$author->id}}" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tên bác sĩ</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="{{$author->name}}">
                </div>             
            </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                    <a href="{{route('authors.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</main>   
@endsection
