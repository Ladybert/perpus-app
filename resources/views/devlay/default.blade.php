<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
@include('devlay.partials.head')
<body>
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('devlay.partials.sidebar')
        <div class="page-wrapper bg-slate-800">
            <!-- Page header -->
            @include('devlay.partials.header')
            <!-- Page body -->
            @yield('main-content')
            {{-- Page footer --}}
            @include('devlay.partials.footer')
        </div>
    </div>
</body>
@include('devlay.partials.scripts')
</html>
