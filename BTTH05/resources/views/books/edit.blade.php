@extends('layouts.base')

@section('title')
    Sách
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('authors.index') }}">Tác giả</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('books.index') }}">Sách</a>
    </li>
@endsection

@section('main')
<main class="container vh-100 mt-5">
    <div>    
        <form action="{{route('books.update', $book->id)}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">SỬA THÔNG TIN SÁCH</h3>
            <div class="mt-4">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Mã sách</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="id" value="{{$book->id}}" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tiêu đề</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="title" value="{{$book->title}}">
                </div>             
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Tác giả</label>
                <select class="form-select" name="nameAuthor" id="inputGroupSelect01">
                    <option selected>{{$author->name}}</option>
                    @foreach ($authors as $author)
                        <option>{{ $author->name }}</option>;
                    @endforeach
                </select>
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
