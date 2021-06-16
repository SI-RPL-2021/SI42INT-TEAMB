<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-color: gray">
<a href="{{route('admin.addproducts')}}" style="position: fixed; right: 50px ; bottom: 50px" class="btn btn-success">Cart</a>

<!-- Image and text -->
<nav class="navbar navbar-light bg-light shadow">
    <a class="navbar-brand p-3" href="#">
        <img src="{{asset('/logo/logo.png')}}" class="d-inline-block align-top w-25" alt="">
    </a>
</nav>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col">  <h1 class="m-3">Cart</h1>
                </div>
                <div class="col text-right">

                    <?php $total = 0 ; $d = 0 ; $item = 0;?>
                    @foreach($data as $d)
                        <?php ;$total += $d->product['price'] * $d['quantity'] ; $item += $d['quantity']?>

                        @endforeach
                        <h4>{{$item}}  Items</h4>
                    <h4>ToTal {{$total}} </h4>
                </div>
            </div>



            @foreach($data as $y)

                <div class="card m-2">
                    <div class="card-body d-flex align-items-center">
                        <h1 class="m-1">{{$y['quantity']}}</h1>
                        <img src="{{asset('products/'.$y->product['gambar'])}}" class="card-img m-1" style="max-width: 140px" alt="" >
                        <div class="">
                            <h5 class="m-1 mt-3">{{$y->product['name']}}</h5>
                            <h5>Rp{{$y->product['price'] * $y['quantity']}}</h5>
                        </div>

                    </div>
                </div>

                @endforeach
            <div class="p-5 text-right">
                <a href="/index" class="btn btn-info text-white">Back to Shopping</a>
                <a href="/cartcout" class="btn btn-success text-right">Checkout</a>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('recipt'))
    <script>
        swal("Selamat!", "pembelian berhasil recipt anda :  {{session('recipt')}}", "success");
    </script>
@endif
</body>
