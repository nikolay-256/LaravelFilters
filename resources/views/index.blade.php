<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Houses</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: #d1d1d1
        }
        #mute {
            position: absolute;
        }
        #mute.on {
            background: white;
            opacity: 0.7;
            z-index: 1000;
            height: 100%;
            width: 100%;
        }
        #mute.on #loader{
            background-image: url({{asset('/images/loader.gif')}});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            height: 128px;
            width: 128px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="mute" class="on"><div id="loader"></div></div>
<div id="app"></div>
<script src="js/app.js"></script>
</body>
</html>
