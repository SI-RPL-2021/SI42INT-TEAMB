@extends('navbar.adminnav')

@section('content')
    <div class="container">
        <h3 class="mt-3">New product</h3>
        <form action="/admin/products/edit/{{$data->id}}" class="form-group mt-3" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="text" placeholder="Product Names" class="form-control mt-3" name="name" value="{{$data->name}}" required>
            <input type="text" placeholder="Category" class="form-control  mt-3" name="category" value="{{$data->category}}" required>
            <img src="{{asset('products/'.$data->gambar)}}" class="d-block mx-auto w-50 mt-3" alt="">
            <div class="custom-file mt-3">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar" >
                <label class="custom-file-label" for="inputGroupFile01">Ganti Gambar Product</label>
            </div>
            <input type="number" placeholder="price" class="form-control  mt-3" value="{{$data->price}}" name="price" required>
            <input type="number" placeholder="Quantity" class="form-control  mt-3" value="{{$data->quantity}}" name="quantity" required>
            <textarea class="form-control mt-3" id="exampleFormControlTextarea1" name="description" placeholder="description" rows="3" required>{{$data->description}}"</textarea>
            <button class="btn btn-success mt-3 d-block mx-auto w-100" type="submit">Create New Product</button>
        </form>
    </div>
@endsection

@push('script')
    <script>
        document.querySelector('.custom-file-input').addEventListener('change',function(e){
            var fileName = document.getElementById("inputGroupFile01").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
@endpush
