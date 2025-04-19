<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.partials.head')

<body>

@include('components.partials.navbar')

{{ $slot }}

@include('components.partials.footer')
@include('components.partials.script')
</body>
</html>
