<!doctype html>
<html lang="en">
@include('backend.Layout.Parents.head')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('backend.Layout.Parents.topbar')
        @include('backend.Layout.Parents.sidebar')



        <!--  Main wrapper -->
        <div class="body-wrapper">

            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('backend.Layout.Parents.script')
    @include('backend.Layout.Parents.footer')

</body>

</html>