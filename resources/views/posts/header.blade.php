<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Universitas Teknologi Bandung</title>
        <link rel="stylesheet" href="https://stackpath.bootstrap.com/bootsrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <img src="{{asset('images/254721151_utb_kotak.png') }}" alt="Logo SantriKoding" class="img-fluid"
            style="max-width: 150px;">
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="text-center-mb-4">
            @if(isset($user))
            <h3 class="text-primary">Haiiiii {{ $user->name }}</h3>
            @else
            <h3 class="text-primary">@yield('header-title')</h3>
            @endif
            <hr class="bg-primary">
</div>
</div>
</div>