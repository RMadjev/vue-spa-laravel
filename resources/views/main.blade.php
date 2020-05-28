@extends('app')

@section('content')
    <section class="hero is-success is-fullheight">
        <div class="hero-header">
            <nav class="tabs is-boxed">
                <div class="container">
                    <ul>
                        <router-link tag="li" to="/" exact><a>Logistics</a></router-link>
                        <router-link tag="li" to="/orders"><a>Orders</a></router-link>
                        <router-link tag="li" to="/products"><a>Products</a></router-link>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="hero-body">
            <router-view></router-view>
        </div>
    </section>
@endsection
