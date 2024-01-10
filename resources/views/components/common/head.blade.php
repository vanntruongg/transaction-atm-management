<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
      <div class="main">
        @component('components.common.header')
            
        @endcomponent
      </div>