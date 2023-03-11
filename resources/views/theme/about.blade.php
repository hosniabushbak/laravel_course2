@extends('theme.layouts.master')
@push('style')
    <style>
        h1 {
            color: red;
        }
    </style>
@endpush
@section('content')
    <h1>Hello Mahmooud</h1>
@endsection
@push('scripts')
    <script>
        alert();
    </script>
@endpush
