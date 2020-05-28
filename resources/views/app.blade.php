<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products, Orders and Logistics</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- todo install via npm --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <router-link to="/" exact>Logistics</router-link>
            <router-link to="/orders">Orders</router-link>
            <router-link to="/products">Products</router-link>
            <router-view></router-view>
        </div>

        <script src="{{ mix('js/manifest.js') }}" defer></script>
        <script src="{{ mix('js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
