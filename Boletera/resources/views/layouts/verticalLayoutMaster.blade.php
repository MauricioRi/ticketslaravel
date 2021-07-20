@auth

    @if (!empty(session()->get('menu')))

        <body class="vertical-layout vertical-menu-modern {{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}
    {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }}
    {{ $configData['verticalMenuNavbarType'] }}
    {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}" data-menu="vertical-menu-modern"
            data-col="{{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}"
            data-layout="{{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
            style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/') }}">

            {{-- Include Sidebar --}}
            @if (isset($configData['showMenu']) && $configData['showMenu'] === true)
                @include('panels.sidebar')
            @endif

            {{-- Include Navbar --}}
            @include('panels.navbar')

            <!-- BEGIN: Content-->
            <div class="app-content content {{ $configData['pageClass'] }}">
                <!-- BEGIN: Header-->
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>

                @if ($configData['contentLayout'] !== 'default' && isset($configData['contentLayout']))
                    <div
                        class="content-area-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
                        <div class="{{ $configData['sidebarPositionClass'] }}">
                            <div class="sidebar">
                                {{-- Include Sidebar Content --}}
                                @yield('content-sidebar')
                            </div>
                        </div>
                        <div class="{{ $configData['contentsidebarClass'] }}">
                            <div class="content-wrapper">
                                <div class="content-body">
                                    {{-- Include Page Content --}}
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
                        {{-- Include Breadcrumb --}}
                        @if ($configData['pageHeader'] === true && isset($configData['pageHeader']))
                            @include('panels.breadcrumb')
                        @endif

                        <div class="content-body">
                            {{-- Include Page Content --}}
                            @yield('content')
                        </div>
                    </div>
                @endif

            </div>
            <!-- End: Content-->

            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            {{-- include footer --}}
            @include('panels/footer')

            {{-- include default scripts --}}
            @include('panels/scripts')

            <script type="text/javascript">
                $(window).on('load', function() {
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                })
            </script>

            @if ($errors->any())
                @php
                    $msg = 'Debe corregir los siguientes errores: <p><ol>';
                @endphp
                @foreach ($errors->all() as $error)
                    @php
                        $msg .= '<li>' . $error . '</li>';
                    @endphp
                @endforeach
                @php
                    $msg .= '</ol></p>';
                @endphp
                <script type="text/javascript">
                    $(function() {
                        Swal.fire({
                            title: '¡Error!',
                            html: '{!! $msg !!}',
                            icon: 'error',
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                    })
                </script>
            @endif

        </body>

    @else

        <script>
            window.location = "{{ route('logout') }}";
        </script>

    @endif

@endauth

</html>
