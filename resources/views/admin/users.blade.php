@extends('navbar.adminnav')
@section('content')
    <a href="/admin/usersadd" style="position: fixed; right: 50px ; bottom: 50px" class="btn btn-success"> Create new user</a>
    <div class="container mt-3">
        <h2>Users</h2>
        <h3 class="h4 mt-4"> Monitoring</h3>



        <div class="row mt-5">
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <div class="col"><h4>Admin Total</h4></div>
                        <div class="col"><h1>{{count($admin)}}</h1></div>
                    </div>

                </div>
            </div>
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <div class="col"><h4>Active Admin</h4></div>
                        <div class="col"><h1>1</h1></div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <div class="col"><h4>Cashier Total</h4></div>
                        <div class="col"><h1>{{count($cashier)}}</h1></div>
                    </div>

                </div>
            </div>
            <div class="col-md">
                <div class="card w-100 p-3 d-flex shadow" style="border-left: 10px solid #3A5488">
                    <div class="row">
                        <div class="col"><h4>Cashier Active</h4></div>
                        <div class="col"><h1>0</h1></div>
                    </div>

                </div>
            </div>


        </div>
        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex">
                <h3 class="h4 mr-5 "> Users List</h3>
                <a href="/admin/users/" class="btn btn-primary">All</a>
                <a href="/admin/users/storage" class="btn btn-primary">Storage</a>
                <a href="/admin/users/cashier" class="btn btn-primary">Cashier</a>

            </div>
            <form action="/admin/users/search/" method="post">
                @csrf
            <div class="d-flex">
                <input type="text" width="400px" name="search" class="form-control" placeholder="input name here">
                <button type="submit" class="btn btn-secondary"> Search </button>
            </div>
            </form>
        </div>


        <div class="card p-5 mt-3">
            <div class="card-body p-3">
                <table class="table w-100 shadow">
                    <tr class="p-3">
                        <th scope="col">ID</th>
                        <th>Type</th>
                        <th>Person Name</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                    @foreach($data as $d)
                    <tr class="" style="margin-top: 200px">
                        <td>{{$d->id}}</td>
                        <td>{{$d->role}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->username}}</td>
                        <td class="text-danger">offline</td>
                        <td><a href="/admin/users/remove/{{$d->id}}" class="btn btn-danger">Remove</a></td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
@endsection
