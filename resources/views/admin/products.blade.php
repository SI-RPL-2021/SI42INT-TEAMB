@extends('navbar.adminnav')
@section('content')

    <?php $product = 0 ; $prod = 0; ?>
    @foreach($hitung as $prod)
        <?php $product += $prod->quantity ?>
    @endforeach

    <a href="{{route('admin.addproducts')}}" style="position: fixed; right: 50px ; bottom: 50px" class="btn btn-success">Add Product</a>
    <div class="container mt-3">
        <h2>Products</h2>
        <h3 class="h4 mt-4"> Monitoring</h3>

        <div class="card rounded shadow p-3 " style="border-top: 15px solid #3A5488">
            <div class="card-body">
                <div class="row">
                    <div class="col"><h4>products in Total</h4></div>
                    <div class="col"><h1>{{count($hitung)}}</h1></div>
                </div>

            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <div class="col"><h4>Product in storage</h4></div>
                        <div class="col"><h1>{{$product}}</h1></div>
                    </div>

                </div>
            </div>
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <?php $item = 0 ; $x = 0?>
                        @foreach($purchases as $x)
                            <?php $item += $x['total_items']?>
                        @endforeach
                        <div class="col"><h4>Product sold</h4></div>
                        <div class="col"><h1>{{$item}}</h1></div>
                    </div>

                </div>
            </div>


        </div>
        <div class="d-flex justify-content-between mt-4">
            <h3 class="h4 "> Product List</h3>

            <form class="d-flex" method="get" action="{{route('admin.productssearch')}}">
                @csrf
                @method('get')
                <input type="text" width="400px" class="form-control" name="search" placeholder="search product">
                <button type="submit" class="btn btn-secondary"> Search </button>

            </form>
        </div>


        <div class="card p-5 mt-3">
            <div class="card-body p-3">
                <table class="table w-100 shadow">
                    <tr class="p-3">
                        <th scope="col">Product</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Qty in storage</th>
                        <th>Price/Unit</th>
                        <th>ACtion</th>
                    </tr>
                    @foreach($data as $d)
                    <tr class="" style="margin-top: 200px">
                        <td><img src="{{asset('products/'.$d->gambar)}}" class="card-img" alt=""></td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->description}}</td>
                        <td>{{$d->category}}</td>
                        <td>{{$d->quantity}}</td>
                        <td>{{$d->price}}</td>
                        <td><a href="/admin/products/edit/{{$d->id}}" class="btn btn-success">Edit</a></td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
@endsection
