@extends('navbar.adminnav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container mt-4 border w-border shadow-sm p-3  bg-body rounded">
                    <table class="table">

                        <tbody>
                        <tr>
                            <th scope="row">Product Id</th>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>QTY</th>
                            <th>Price/Unit</th>
                            <th>Price Total</th>
                        </tr>
                        @foreach($data as $y)
                            <tr>

                                <td><img src="{{asset('/products/'.$y->product['gambar'])}}" width="100px" alt=""></td>
                                <td>{{$y->product['id']}}</td>
                                <td>{{$y->product['name']}}</td>
                                <td>{{$y->product['description']}}</td>
                                <td>{{$y->product['category']}}</td>
                                <td>{{$y['quantity']}}</td>
                                <td>{{$y->product['price']}}</td>
                                <td>{{$y['quantity'] * $y->product['price']}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-4">
                <div class="d-flex bd-highlight border w-border shadow-sm p-3  bg-body rounded  mt-4">
                    <div class="p-2 flex-fill bd-highlight text-center" id="text"><p>Receipt Number</p> {{$ids}}}</div>
                    <div class="p-2 flex-fill bd-highlight text-center" id="text"><h4 class="h4 mt-3 green"> IDR {{$total->total_price}}</h4></div>
                </div>
                <form action="/cashier/post/{{$ids}}/{{$req}}" method="post">
                    @csrf
                <div class="container mt-3 p-2 border w-border shadow-sm  bg-body rounded">
                    <label class="mb-3 fs-5" for="">Enter Payment Method</label>
                    <br>
                    <select class="form-control" id="Method" name="met">
                        <option value="cash">Cash</option>
                        <option value="OVO">OVO</option>
                        <option value="card">CARD</option>
                        <option value="m-banking">M-banking</option>
                    </select>
                </div>


                    <div class="container p-2 border w-border shadow-sm  bg-body rounded mt-3" id="text">
                        <label class="mb-3 fs-5" for="">Enter Cash Amount</label>
                        <br>
                        <input class="form-control w-100" type="number" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3 w-100">Pay</button>

            </form>
        </div>

    </div>
@endsection
