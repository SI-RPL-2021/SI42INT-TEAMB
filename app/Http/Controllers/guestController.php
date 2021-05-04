<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\cart;
use App\Models\request_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class guestController extends Controller
{
    public function index()
    {
        $data = Products::all();
        return view('index' , ['data'=>$data]);
    }

    public function indexsearch(Request $request){
        $data = Products::where('name', 'LIKE',"%{$request->search}%")->paginate();
        return view('index' , ['data'=>$data]);
    }

}
