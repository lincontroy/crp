<!-- favicon -->
<link rel="shortcut icon" href="{{ get_fav($basic_settings) }}" type="image/x-icon">

<!-- Select 2 CSS -->
<link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/library/popup/magnific-popup.css') }}">

<!-- fontawesome css link -->
<link rel="stylesheet" href="{{ asset('/frontend/css/fontawesome-all.min.css') }}">
<!-- bootstrap css link -->
<link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
<!-- swipper css link -->
<link rel="stylesheet" href="{{ asset('/frontend/css/swiper.min.css') }}">
<!-- lightcase css links -->
<link rel="stylesheet" href="{{ asset('/frontend/css/lightcase.css') }}">
<!-- line-awesome-icon css -->
<link rel="stylesheet" href="{{ asset('/frontend/css/line-awesome.min.css') }}">
<!-- animate.css -->
<link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}">
<!-- main style css link -->
<link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
<!-- nice-select -->
<link rel="stylesheet" href="{{ asset('/frontend/css/nice-select.css') }}">

@php
    $base_color = $basic_settings->base_color;
    $secondary_color = $basic_settings->secondary_color;
@endphp

<style>
    :root {
        --base_color: {{ $base_color }};
    }

    :root {
        --secondary_color: {{ $secondary_color }};
    }
</style>