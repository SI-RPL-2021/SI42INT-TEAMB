@extends('navbar.adminnav')
@section('content')
<div class="container mt-3">
    <h2>Dashboard</h2>
    <h3 class="h4 mt-4"> Monitoring</h3>

    <div class="card rounded shadow p-3 " style="border-top: 15px solid #3A5488">
        <div class="card-body">
            <div class="row">
                <div class="col"><h4>Transaction Today</h4></div>
                <div class="col"><h1>{{count($today)}}</h1></div>
            </div>

        </div>
    </div>


    <div class="card rounded shadow p-3 mt-5" style="border-top: 15px solid #3A5488">
        <div class="card-body">
            <div class="row">
                <div class="col"><h4>Revenue</h4></div>
                <?php $revenue = 0 ; $x = 0?>
                @foreach($purchase as $x)
                    <?php $revenue+= $x['revenue']?>
                    @endforeach
                <div class="col"><h1>{{$revenue}}</h1></div>
            </div>

        </div>


</div>

    <div class="row mt-5">
        <div class="col-md">
            <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                <div class="row">
                    <?php $item = 0 ; $x = 0?>
                    @foreach($purchases as $x)
                        <?php $item += $x['total_items']?>
                    @endforeach
                    <div class="col"><h4>Purchased Today</h4></div>
                    <div class="col"><h1>{{$item}}</h1></div>
                </div>

            </div>
        </div>
        <div class="col-md">
            <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                <div class="row">
                    <div class="col"><h4>Order Canceled</h4></div>
                    <div class="col"><h1>{{count($cancel)}}</h1></div>
                </div>

            </div>
        </div>


    </div>
    <div class="d-flex justify-content-between mt-4">
        <h3 class="h4 "> Transaction List</h3>

        <form action="/admin/dashboard/search" method="get">
        <div class="d-flex">

            <input type="text" name="search" width="400px" class="form-control">

             <button type="submit" class="btn btn-secondary"> Search </button>


        </div>
        </form>
    </div>


    <div class="card p-5 mt-3">
        <div class="card-body p-3">
            <table class="table w-100 shadow">
                <tr class="p-3">
                    <th scope="col">Purchase ID</th>
                    <th>Total Items</th>
                    <th>Total Price</th>
                    <th>Recipt Number</th>
                    <th>Cashier ID</th>
                    <th>Status</th>
                </tr>
                @foreach($purchases as $p)
                <tr class="" style="margin-top: 200px">

                    <td>{{$p->id}}</td>
                    <td>{{$p->total_items}}</td>
                    <td>{{$p->revenue}}</td>
                    <td>{{$p->recipt}}</td>
                    <td>{{$p->cashier_id}}</td>
                    <td>{{$p->status}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
