@extends('layouts.base')

@section('title')
    Homepage
@endsection

@section('main')
    <div class="container-fluid text-center text-bg-info ">
        <h3>Welcome to Library Management</h3>
    </div>
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link active" href="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('authors.index') }}">Tác giả</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('books.index')}}">Sách</a>
    </li>
@endsection