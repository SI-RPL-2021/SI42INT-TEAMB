@extends('navbar.adminnav')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2 class="h2">Purchase Order List</h2>
            </div>
            <div class="col">
                <form class="d-flex" method="get" action="/cashier/index/cart/search">
                @csrf
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- UCIL -->
        <div class="container mt-4 border w-border shadow-sm p-3 mb-3 bg-body rounded border border-2">

            <table class="table">
                <thead>
                </thead>
                <tbody>
                <tr class="container mt-4 border w-border shadow-sm p-3 mb-3 bg-body rounded border border-2">
                    <th scope="row">Purchased Id</th>
                    <th>Total Items</th>
                    <th>Total Prices</th>
                    <th>Receipt Number</th>
                    <th>Cashier Id</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php $x = 0 ; $d = 0;?>
                @foreach($data as $d)
                    @if($d->recipt == $x)
                    @else

                <tr>
                    <td scope="row">{{$d->recipt}}</td>
                    <td>{{$d->total['total_things']}}</td>
                    <td>{{$d->total['total_price']}}</td>
                    <td>{{$d->recipt}}</td>
                    <td>{{Auth::user()->id}}</td>
                    <td class="text-success">{{$d->status}}</td>
                    <td><a class="btn btn-success" href="/cashier/detail/{{$d->recipt}}/{{$d->id}}">Procced</a> <a href="/cashier/delete/{{$d->rec}}" class="btn btn-outline-danger">Cancel</a> </td>

                </tr>
                        <?php $x = $d->recipt?>
                    @endif
                @endforeach


                @foreach($inprog as $in)
                        <tr>
                            <td scope="row">{{$in->id}}</td>
                            <td>{{$in->quantity}}</td>
                            <td>{{$in->price * $in->quantity}}</td>
                            <td>{{$in->recipt}}</td>
                            <td>{{Auth::user()->id}}</td>
                            <td class="text-warning">{{$in->status}}</td>
                            <td><a href="/cashier/delete/{{$in->id}}" class="btn btn-outline-danger">Cancel</a> </td>
                        </tr>
                @endforeach

                @foreach($read as $r)
                    <tr>
                        <td scope="row">{{$r->id}}</td>
                        <td>{{$r->quantity}}</td>
                        <td>{{$r->price * $r->quantity}}</td>
                        <td>{{$r->recipt}}</td>
                        <td>{{Auth::user()->id}}</td>
                        <td class="text-danger">{{$r->status}}</td>
                        <td><a href="/cashier/delete/{{$r->id}}" class="btn btn-outline-danger">Cancel</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>








@endsection
