<!doctype html>
<html lang="en">

@include('theme.layouts.head')

@if(LaravelLocalization::getCurrentLocale() == 'ar')
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" dir="rtl">
@else
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" dir="ltr">

@endif

@include('theme.layouts.header')

@yield('content')

@include('theme.layouts.footer')

<!-- Modal -->
@include('theme.layouts.modal')

@include('theme.layouts.scripts')
</body>

</html>
