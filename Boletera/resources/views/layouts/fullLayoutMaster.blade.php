@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp
<html lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif"
data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}"
class="{{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')

</head>

<body class="vertical-layout vertical-menu-modern {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{ $configData['theme'] === 'dark' ? 'dark-layout' : 'light' }}
    data-menu=" vertical-menu-modern"
    data-layout="{{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
    style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/') }}">

    <!-- BEGIN: Content-->
    <div class="app-content content {{ $configData['pageClass'] }}">
        <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
            <div class="content-body">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- End: Content-->

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

</html>