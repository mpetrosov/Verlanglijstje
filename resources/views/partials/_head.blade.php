<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verlanglijstje | @yield('addressBarTitle')</title>
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{ Html::style('css/normalize.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') }}
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
    
    @yield('customHead')
    <style></style>
</head>