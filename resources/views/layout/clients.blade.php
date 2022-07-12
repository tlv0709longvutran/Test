<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')- Unicode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('asset/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/clients/css/style.css')}}">
    @yield('css')
</head>
<body>
    @include('Client.block.header')
    <main class="border py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <aside>
                        @section('sidebar')
                            @include('Client.block.sidebar')
                        @show
                    </aside>
                </div>
                <div class="col-8">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('Client.block.footer')
    <script src="{{asset('asset/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/clients/js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    @yield('js')
    @stack('scripts')
</body>
</html>
