<!doctype html>
<html lang="en">

@include('theme.layouts.head')

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


@include('theme.layouts.header')

@yield('content')

@include('theme.layouts.footer')

<!-- Modal -->
@include('theme.layouts.modal')

@include('theme.layouts.scripts')
</body>

</html>
