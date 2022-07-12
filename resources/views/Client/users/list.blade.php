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
    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
<hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Ten</th>
                <th>EMail</th>
                <th width="10%">Thoi Gian</th>
                <th width="5%">Update</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->create_at}}</td>
                        <td>
                            <a href="{{route('users.edit',['id'=> $item->id])}}" class="btn btn-warning btn-sm">Update</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="{{route('users.delete',['id' => $item->id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6">Khong co nguoi dung</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection
