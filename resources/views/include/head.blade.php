<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @yield('title')
    {{-- <title>For coffe</title> --}}

    <!-- Google fonts -->


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.jpg') }}">

    <!-- page css -->
    @yield('cssForPage')

    <!-- Core css -->  
    <link href=" {{ asset('assets/css/app.min.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="app.css">

     <!-- google font (Montserrat)-->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>