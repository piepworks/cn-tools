<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if (@isset($title)) {{ $title }} / @endif Tools / Cassette Nest</title>
    <link rel="stylesheet" href="/main.css">
    <script src="/htmx-1.8.4.min.js"></script>
    <script src="/idiomorph-ext-0.0.7.min.js"></script>
</head>
<body>
    <div id="root">
        {{ $slot }}
    </div>
    <script>document.body.classList.add('has-js');</script>
</body>
</html>
