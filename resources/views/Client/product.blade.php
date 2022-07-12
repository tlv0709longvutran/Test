
    @extends('layout.clients')

    @section('title')
        {{$title}}
    @endsection

    {{-- @section('sidebar')
        {{-- @parent
        <h3>Home sidebar</h3>
    @endsection --}}

    @section('css')

    @endsection

    @section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
        <h1>Sản Phẩm</h1>

    @endsection
