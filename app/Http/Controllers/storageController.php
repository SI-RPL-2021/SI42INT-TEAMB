<?php

namespace App\Http\Controllers;
use App\Models\request_order;
use App\Models\total;

class storageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('storage');
    }
    public function ready()
    {
        $data = request_order::all()->where('status','Ready To Process');
        return view('storage.readyprocindex' , ['data'=>$data]);
    }
    public function inprogres()
    {
        $data = request_order::all()->where('status','In Progress');
        return view('storage.inprogindex' , ['data'=>$data]);
    }

    public function readys($id){
        $isi = request_order::all()->where('recipt',$id);
        $data = request_order::all()->where('status','Ready To Process');
        return view('storage.readyproc' , ['data'=>$data , 'isi'=>$isi , 'recipt'=>$id]);
    }
    public function inprogress($id){
        $isi = request_order::all()->where('recipt',$id);
        $data = request_order::all()->where('status','In Progress');
        return view('storage.inprog' , ['data'=>$data , 'isi'=>$isi , 'recipt'=>$id]);
    }
    public function progres($id){
        $isi = request_order::all()->where('recipt',$id);
        foreach ($isi as $t){
            $t->status = 'In Progress';
            $t->update();
        }
        return redirect('storage/ready-proc/');
    }
    public function cashier($id ,$price,$qty){
        $isi = request_order::all()->where('recipt',$id);
        $y = 0;
        foreach ($isi as $t){
            $t->status = 'Ready To Pay';
            $t->update();
            if ($y == 0 ){
                $baru = new total();
                $baru->id_request = $t->id;
                $baru->total_things = $qty;
                $baru->total_price = $price;
                $baru->save();
            }else{

            }
            $y = 1;
        }
        return redirect('storage/in-prog/');
    }
}
