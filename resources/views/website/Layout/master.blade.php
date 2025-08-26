<!doctype html>
<html lang="bn">
@include('website.Layout.Parents.head')

<body>

    @include('website.Layout.Parents.header')

    @yield('content')

    @include('website.Layout.Parents.footer')
    @include('website.Layout.Parents.script')

</body>

</html>