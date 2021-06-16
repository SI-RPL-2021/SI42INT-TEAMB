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
    public function editprof(){
        return view('editprofile');
    }
    public function editprofs(Request $request){
        $data = Auth::user();
        if (Hash::check($request->password , $data->password  ) ){
           $data->username = $request->username;
           if ($request->npassword){
               $data->password = Hash::make($request->npassword);
           }else{

           }

           $data->update();
           return redirect(route('admin.users'));
        }else{

            return redirect()->back()->with('error','error');
        }
    }

    public function indexsearch(Request $request){
        $data = Products::where('name', 'LIKE',"%{$request->search}%")->paginate();
        return view('index' , ['data'=>$data]);
    }

    public function cart($id , Request $request){
        $data = new cart();
        $data->quantity = $request->quantity;
        $data->product_id = $id;
        $data->save();
        return redirect()->back();
    }

    public function cartindex(){
        $data = cart::all();
        return view('cart' , ['data'=> $data]);
    }

    public function checkout(){
        $data = cart::all();
        $tes = request_order::latest()->first();
        $x = 0;
        if ($tes == null){
            $x = 1;
        } else{
            $x = $tes->id + 1;
        }

        foreach($data as $d){
            $request = new request_order();
            $request->quantity = $d->quantity;
            $request->product_id = $d->product_id;
            $request->status = "Ready To Process";
            $request->recipt = $x ;
            $request->save();
            $d->delete();
        }
//

        return redirect('/cart')->with('recipt',$x);
    }
}
