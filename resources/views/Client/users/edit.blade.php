@extends('layout.clients')

@section('title')
    {{$title}}
@endsection


@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif
    <h1>{{$title}}</h1>

    <form action="{{route('users.post-edit')}}" method="POST">
        <div class="mb-3">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên........." value="{{old('fullname') ?? $usersDetail->fullname}}">
            @error('fullname')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="email........." value="{{old('email') ?? $usersDetail->email}}">
            @error('email')
                <span style="color: red;">{{$message}}</span>
            @enderror
            <hr>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
        </div>
        @csrf
    </form>

@endsection
