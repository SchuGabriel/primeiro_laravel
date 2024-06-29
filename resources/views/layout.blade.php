<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("pageTitle") - LaraTimes</title>
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}" type="text/css" />
    @yield("style")
</head>
<body>
    @include("includes.errors")
    @yield("content")
</body>
</html>