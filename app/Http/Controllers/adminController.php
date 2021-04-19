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

    public function usersadd(){
        return view('admin.usersadd');
    }
    public function usersremove($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
}
