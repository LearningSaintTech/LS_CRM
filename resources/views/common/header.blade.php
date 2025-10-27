<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'CRM')</title>
        <meta name="author" content="dexignlabs">
        <meta name="robots" content="index, follow">
        <meta name="format-detection" content="telephone=no">
    <meta name="keywords"
        content="CRM, Customer Relationship Management, Business Management Software, Sales Management, Contact Management, Lead Management, Marketing Automation, Customer Support, Analytics Dashboard, Cloud-Based CRM, Mobile CRM, Sales Pipeline, Customer Engagement, CRM Solutions">
    <meta name="description"
        content="CRM, Customer Relationship Management, Business Management Software, Sales Management, Contact Management, Lead Management, Marketing Automation, Customer Support, Analytics Dashboard, Cloud-Based CRM, Mobile CRM, Sales Pipeline, Customer Engagement, CRM Solutions">
    <meta property="og:title" content="CRM, Customer Relationship Management, Business Management Software, Sales Management, Contact Management,">
    <meta property="og:description"
        content="HexaBox is a versatile and responsive Bootstrap admin dashboard template, perfect for analytics, CRM systems, and backend web interfaces.">
    <meta property="og:image" content="{{ url('assets/images/social-image.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="CRM">
    <meta name="twitter:description"
    content="Create high-performing dashboards with HexaBox – a responsive and feature-rich Bootstrap admin template for all kinds of web apps.">
    <meta name="twitter:image" content="{{ url('assets/images/social-image.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/learning_logo.svg') }}">
    
    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Vendor Styles -->
    <link href="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/metismenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/@flaticon/flaticon-uicons/css/all/all.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css">
    <link rel="stylesheet" href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link class="main-plugins" href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('styles')
    
    <!-- Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
@include('layouts.spinner')
<body>
    @include('common.toastr')
    <div id="main-wrapper">
        
        @include('layouts.navbar')
        
        @include('layouts.topbar')
        
        @include('layouts.sidebar')
        @include('common.toster')

