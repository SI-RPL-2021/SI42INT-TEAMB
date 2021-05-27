<?php
namespace App\Http\Middleware;
namespace App\Http\Controllers;
use App\Models\request_order;
use App\Models\cancel;
use App\Models\total;
use App\Models\purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;

class cashierController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('cashier1');
    }

    public function detail($id , $req){
        $data = request_order::all()->where('recipt', $id);
        $total = total::all()->where('id_request',$req)->first();
        return view('cashier.detail' , ['data'=>$data , 'total'=>$total , 'ids'=>$id , 'req'=>$req]);
    }


 }
