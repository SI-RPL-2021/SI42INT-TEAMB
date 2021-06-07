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

    public function index()
    {
        $data = request_order::all()->where('status','Ready To Pay');
        $inprog = request_order::all()->where('status','In Progress');
        $read = request_order::all()->where('status','Ready To Process');
        return view('cashier.index' , ['data'=>$data , 'inprog'=>$inprog , 'read'=>$read]);
    }

    public function delete($id){
        $data = request_order::find($id);
        $cancel = new cancel();
        $cancel->cancel = "cancel";
        $cancel->save();
        $data->delete();
        return redirect()->back();
    }

    public function detail($id , $req){
        $data = request_order::all()->where('recipt', $id);
        $total = total::all()->where('id_request',$req)->first();
        return view('cashier.detail' , ['data'=>$data , 'total'=>$total , 'ids'=>$id , 'req'=>$req]);
    }

    public function search(Request $request){
        $data = request_order::where('status','Ready To Pay')->where('recipt', 'LIKE' , "%$request->search%")->paginate();
        $inprog = request_order::where('status','In Progress')->where('recipt', 'LIKE' , "%$request->search%")->paginate();
        $read = request_order::where('status','Ready To Process')->where('recipt', 'LIKE' , "%$request->search%")->paginate();
        return view('cashier.index' , ['data'=>$data , 'inprog'=>$inprog , 'read'=>$read]);
    }
    
    public function post($id , $req , Request $request){
        $data = request_order::all()->where('recipt' , $id);

        $total = total::all()->where('id_request',$req)->first();
        $purchase = new purchase();
        $purchase->revenue = $total->total_price;
        $purchase->total_items = $total->total_things;
        $purchase->recipt = $id;
        $purchase->purhcase_id = $id;
        $purchase->cashier_id = Auth::user()->id;
        $purchase->status = $request->met;
        $purchase->save();
        $total->delete();
        foreach($data as $d){
            $tes = Products::all()->where('id',$d->product_id)->first();
            $tes->quantity = $tes->quantity - $d->quantity;
            $tes->update();
            $d->delete();
        }
        return redirect('/cashier/index')->with('success' ,'success');
    }

 }
