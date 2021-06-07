@extends('navbar.adminnav')
@section('content')
    <div class="container-fluid  ">
        <div class="row mt-0">

            <div class="col-3 border border-secondary p-5">

                <h2 class="h2 mb-3 ">Queue</h2>
                <div class="d-flex bd-highlight  mb-4">
                    <a href="/storage/ready-proc" class="btn btn-secondary"> <div class="text-white">Ready To Process</div></a>
                    <a href="/storage/in-prog" class="btn btn-outline-secondary"><div class="">In Progress</div></a>
                </div>
                <?php $x = 0 ; $d = 0;?>
                @foreach($data as $d)
                    @if($x == $d->recipt)
                    @else
                <a href="/storage/ready-proc/{{$d->recipt}}" class="btn btn-outline-secondary w-100 m-3">
                    <div class="d-flex  mb-2">
                        <div class="p-2 flex-fill bd-highlight">Receipt Number</div>
                        <div class="p-2 flex-fill bd-highlight">{{$d->recipt}}</div>
                    </div>
                </a>
                        <?php $x = $d->recipt ?>
                    @endif
                @endforeach




            </div>


            <div class="col-9 d-flex">

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="h2"> Purchase Order Detail</h2>
                        </div>

                        <h1>Silahkan Pilih Recipt</h1>


                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

@endsection
