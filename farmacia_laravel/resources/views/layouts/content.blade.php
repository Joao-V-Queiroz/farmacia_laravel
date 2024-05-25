@include('layouts.header')
<body class="bg-blue-200">
    @yield('main-content')
    @include('layouts.footer')
    @stack('js')
</body>
