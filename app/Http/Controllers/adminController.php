<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\purchase;
use Carbon\Carbon;
use App\Models\cancel;
use Illuminate\Support\Facades\DB;
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

        // barchart
        $transactions = purchase::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
                    
        $months = purchase::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

            $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months as $index => $month){
                $datas[$month] = $transactions[$index];
            }

        // linechart
        $transactions = purchase::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
                    
        $months = purchase::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
            
            $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months as $index => $month){
                $datas[$month] = $transactions[$index];
            }
        $lastyear = (date("Y")-1);
        $Revenue_one = purchase::select(DB::raw("SUM(revenue) as total1"))
                    ->where('created_at', '>=', Carbon::createFromDate(date("Y"), 1, 1)) 
                    ->where('created_at', '<=', Carbon::createFromDate(date("Y"), 12, 31))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('total1');
        
        $Revenue_two = purchase::select(DB::raw("SUM(revenue) as total2"))
                    ->where('created_at', '>=', Carbon::createFromDate($lastyear, 1, 1)) 
                    ->where('created_at', '<=', Carbon::createFromDate($lastyear, 12, 31))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('total2');
        $months = purchase::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $months2 = purchase::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', (date('Y')-1))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
            $revenues_one = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months as $index => $month){
                $revenues_one[$month] = $Revenue_one[$index];
            }

            $revenues_two = array(0,0,0,0,0,0,0,0,0,0,0,0);
            if(!$Revenue_two->isEmpty()){
                
                foreach($months2 as $index => $month){
                    
                        
                    $revenues_two[$month] = $Revenue_two[$index];
                }
            }

        return view('admin.dashboard' , ['today'=>$today , 'purchase'=>$purhcase , 'purchases' => $purhcases , 'cancel'=>$cancel, 
        'datas'=>$datas, 'revenues_one'=>$revenues_one, 'revenues_two'=>$revenues_two]);
    }
    public function indexsearch(Request  $request){
        $today = purchase::whereDate('created_at', Carbon::today())->get();
        $purhcase = purchase::all();
        $purhcases = purchase::where('recipt', 'LIKE', "%$request->search%")->paginate();
        $cancel = cancel::all();

         // barchart
         $transactions = purchase::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
                
        $months = purchase::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            $datas[$month] = $transactions[$index];
        }

        // linechart
        $transactions = purchase::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
                
        $months = purchase::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            $datas[$month] = $transactions[$index];
        }
        $lastyear = (date("Y")-1);
        $Revenue_one = purchase::select(DB::raw("SUM(revenue) as total1"))
                ->where('created_at', '>=', Carbon::createFromDate(date("Y"), 1, 1)) 
                ->where('created_at', '<=', Carbon::createFromDate(date("Y"), 12, 31))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('total1');

        $Revenue_two = purchase::select(DB::raw("SUM(revenue) as total2"))
                ->where('created_at', '>=', Carbon::createFromDate($lastyear, 1, 1)) 
                ->where('created_at', '<=', Carbon::createFromDate($lastyear, 12, 31))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('total2');
        $months = purchase::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $months2 = purchase::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', (date('Y')-1))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
        $revenues_one = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            $revenues_one[$month] = $Revenue_one[$index];
        }

        $revenues_two = array(0,0,0,0,0,0,0,0,0,0,0,0);
        if(!$Revenue_two->isEmpty()){
            
            foreach($months2 as $index => $month){
                
                    
                $revenues_two[$month] = $Revenue_two[$index];
            }
        }

        return view('admin.dashboard' , ['today'=>$today , 'purchase'=>$purhcase , 'purchases' => $purhcases,'cancel'=>$cancel,
        'datas'=>$datas, 'revenues_one'=>$revenues_one, 'revenues_two'=>$revenues_two]);

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
    public function productsremove($id){
        $data = Products::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function users(){
        $admin = User::all()->where('role','admin');
        $cashier = User::all()->where('role' , 'cashier');
        $data = User::all();

        // pie chart
        
        $total_admin = User::where('role', 'admin')->count();
        $total_kasir = User::where('role', 'cashier')->count();
        $total_staffgudang = User::where('role', 'storage')->count();

        return view('admin.users', ['admin' => $admin , 'cashier'=> $cashier ,'data'=>$data,
        'dataadmin'=>$total_admin, 'datakasir'=>$total_kasir, 'datastfgudang'=>$total_staffgudang ]);
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
