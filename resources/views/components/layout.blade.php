<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (@isset($title))
            {{ $title }} /
        @endif Tools / Cassette Nest
    </title>
    <script src="/htmx-1.9.4.min.js"></script>
    <script src="/idiomorph-ext-0.0.8.min.js"></script>
    <script src="/d3.v7.min.js"></script>
    <script defer data-domain="tools.cassettenest.com" src="https://plausible.io/js/script.js"></script>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="root">
        {{ $slot }}
    </div>
    <script>
        document.body.classList.add('has-js');
    </script>
    @stack('scripts')
</body>

</html>
