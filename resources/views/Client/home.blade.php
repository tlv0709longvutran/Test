
    @extends('layout.clients')

    @section('title')
        {{$title}}
    @endsection

    @section('sidebar')
        @parent
        <h3>Home sidebar</h3>
    @endsection

    @section('content')
    @if (session('msg'))
        <div class="alert alert-info">
            {{session('msg')}}
        </div>
    @endif
        <h1>Trang Chủ</h1>
        @include('Client.content.slide')
        @include('Client.content.about')

        @env('production')
            <p>Môi Trường Production</p>
        @elseenv('test')
            <p>Môi Trường Test</p>
        @else
            <p>Môi Trường dev</p>
        @endenv
    @php

    @endphp
        <x-alert type="success" :content="$message" />

        <x-button />

        <p><img src="storage/app/public/baby_love.jpg" alt=""></p>
        <p><a href="{{route('downloadImage').'?image='.public_path('storage/baby_love.jpg')}}" class="btn btn-primary">Download Anh</a></p>
    @endsection

    @section('css')
        <style>
            img{
                max-width: 100%;
                height: auto;
            }
        </style>
    @endsection
