<!DOCTYPE html>
<html lang="en">

<head>
    <!-- General CSS HEAD -->
    @include('admin.layouts.head')
</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            {{-- layouts navbar --}}
            @include('admin.layouts.navbar')

            {{-- layouts sidebar --}}
            @include('admin.layouts.sidebar')

            {{-- Main Content --}}
            <div class="main-content">
                <section class="section">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @yield('content')
                </section>
            </div>

            {{-- Layout Footer --}}
            @include('admin.layouts.footer')

        </div>
    </div>
{{--
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script> --}}
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('template/base-admin/dist/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/base-admin/dist/assets/modules/datatables/datatables.min.js') }}"></script> --}}

    <!-- General JS Scripts -->
    @include('admin.layouts.script')

</body>

</html>
