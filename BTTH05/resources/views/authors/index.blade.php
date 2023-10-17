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
        <a class="nav-link" href="{{ route('books.index')}}">Sách</a>
    </li>
@endsection

@section('main')
<main class="container vh-100 mt-5">
    <div>    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif     
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif   
        <a href="{{route('authors.create')}}" class="btn btn-success">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tác giả</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            @foreach ($authors as $author)
                <tbody>
                    <tr>
                        <th scope="row">{{$author->id}}</th>
                        <td>{{$author->name}}</td>
                        <td><a href="{{route('authors.edit', $author->id)}}"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#author{{$author->id}}"><i class="bi bi-trash-fill"></i>
                            </button>
                            <div class="modal fade" id="author{{$author->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Delete the doctor has id: {{$author->id}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('authors.destroy', $author->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">OK</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
    </div>

    {{$authors->links()}}
</main>
@endsection