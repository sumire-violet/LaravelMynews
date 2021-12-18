<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    </body>
</html>
{{-- layouts/plofile.blade.phpを読み込む --}}
@extends('layouts.profile')
{{-- profile.blade.phpの@yield('title')に'MYプロフィール'を埋め込む --}}
@section('title', 'MYプロフィール')