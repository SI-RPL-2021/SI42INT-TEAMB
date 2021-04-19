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

    public function usersadd(){
        return view('admin.usersadd');
    }
    public function usersremove($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
}
