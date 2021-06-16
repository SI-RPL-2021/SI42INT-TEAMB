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
</head>

<body style="background-color: gray">
<a href="{{route('cart')}}" style="position: fixed; right: 50px ; bottom: 50px" class="btn btn-success">Cart</a>

<!-- Image and text -->
<nav class="navbar navbar-light bg-light shadow">
    <a class="navbar-brand p-3" href="#">
        <img src="{{asset('/logo/logo.png')}}" class="d-inline-block align-top w-25" alt="">
    </a>
</nav>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">

            <form action="{{route('indexsearch')}}" class="d-flex" method="post">
                @csrf
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <h3 class="m-3">Barang Jualan</h3>

            <div class="d-flex flex-wrap">
                @foreach($data as $d)
                <div class="card m-3">
                    <div class="card-body text-center btn-dark">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal{{$d['id']}}">
                          <h4>{{$d->category}}</h4>
                         <img src="{{asset('products/'.$d->gambar)}}" class="card-img" style="max-width: 140px" alt="" >
                         <h5 class="mt-3">{{$d->name}}</h5>
                        </button>
                    </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{$d['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h3>{{$d['name']}}</h3>

                                </div>
                                <form action="/cart/{{$d->id}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body ">

                                        <img src="{{asset('products/'.$d->gambar)}}" class="card-img" alt="" >
                                        <h3 class="mt-3 text-center">Rp{{$d['price']}}</h3>
                                        <h3 class="mt-3 text-center">Stock : {{$d['quantity']}}</h3>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" id="minus{{$d['id']}}" onclick="decrease{{$d['id']}}()">-</button>
                                            <input type="number" class="form-control text-center" id="qty{{$d['id']}}" name="quantity" style="width: 100px" max="{{$d['quantity']}}" min="0">
                                            <button type="button" class="btn btn-secondary" id="plus{{$d['id']}}" onclick="increase{{$d['id']}}()">+</button>
                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success d-block mx-auto">Add To Cart</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        function increase{{$d['id']}}(){
                            var a = 1;
                            var textBox = document.getElementById("qty{{$d['id']}}");
                            if (textBox.value == {{$d['quantity']}}){

                            }else{
                                textBox.value++;
                            }


                        }
                        function decrease{{$d['id']}}(){
                            var textBox = document.getElementById("qty{{$d['id']}}");
                            if (textBox.value == 0){

                            }else {
                                textBox.value--;
                            }
                        }

                    </script>


                @endforeach
            </div>





        </div>
    </div>
</div>

</body>
