<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\purchase;
use Carbon\Carbon;
use App\Models\cancel;
use function Ramsey\Uuid\v1;

class adminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $today = purchase::whereDate('created_at', Carbon::today())->get();
        $purhcase = purchase::all();
        $purhcases = purchase::all();
        $cancel = cancel::all();
        return view('admin.dashboard' , ['today'=>$today , 'purchase'=>$purhcase , 'purchases' => $purhcases , 'cancel'=>$cancel]);
    }
    public function indexsearch(Request  $request){
        $today = purchase::whereDate('created_at', Carbon::today())->get();
        $purhcase = purchase::all();
        $purhcases = purchase::where('recipt', 'LIKE', "%$request->search%")->paginate();
        $cancel = cancel::all();
        return view('admin.dashboard' , ['today'=>$today , 'purchase'=>$purhcase , 'purchases' => $purhcases,'cancel'=>$cancel]);
    }

    public function products(){
        $data = Products::all();
        $hitung = Products::all();
        $purhcases = purchase::all();
        return view('admin.products' , ['data' => $data , 'hitung' =>$hitung ,'purchases'=>$purhcases]);
    }

    public function productsadd(){
        return view('admin.productsadd');
    }
    public function productsadds(Request $request){
        $data = new Products();
        $data->name  = $request->name;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;

        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('products/'), $imageName);
        $data->gambar = $imageName;

        $data->save();
        return redirect(route('admin.products'));
    }


    public function productssearch(Request $request){
        $data = Products::where('name', 'LIKE',"%{$request->search}%")->paginate();
        $hitung = Products::all();
        $purhcases = purchase::all();

        return view('admin.products' , ['data' => $data , 'hitung'=>$hitung , 'purchases'=>$purhcases]);
    }

    public function productsedit($id){
        $data = Products::find($id);
        return view('admin.productsedit' , ['data'=>$data]);
    }
    public function productsedits($id, Request $request){
        $data = Products::find($id);
        $data->name  = $request->name;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        if ($request->gambar != null){
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('products/'), $imageName);
        $data->gambar = $imageName;
        }

        $data->update();
        return redirect(route('admin.products'));
    }


    public function users(){
        $admin = User::all()->where('role','admin');
        $cashier = User::all()->where('role' , 'cashier');
        $data = User::all();
        return view('admin.users', ['admin' => $admin , 'cashier'=> $cashier ,'data'=>$data]);
    }
    public function userstheme($theme){
        $admin = User::all()->where('role','admin');
        $cashier = User::all()->where('role' , 'cashier');
        $data = User::all()->where('role',$theme);
        return view('admin.users', ['admin' => $admin , 'cashier'=> $cashier ,'data'=>$data]);
    }
    public function usersearch(Request $request){

        $admin = User::all()->where('role','admin');
        $cashier = User::all()->where('role' , 'cashier');
        $data = User::where('name', 'LIKE' , "%$request->search%")->paginate();
        return view('admin.users', ['admin' => $admin , 'cashier'=> $cashier ,'data'=>$data]);
    }
    public function usersadd(){
        return view('admin.usersadd');
    }
    public function usersremove($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
}
