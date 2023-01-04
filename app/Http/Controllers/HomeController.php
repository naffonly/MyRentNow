<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('itsDelete',1)->get()->count();
        $trans = Transaction::where('itsDelete',1)->get()->count();
        $product = Product::where('itsDelete',1)->get()->count();
        $rs = Transaction::select(DB::raw('sum(priceRent) as price'))->where('itsDelete',1)->get()[0]->price;
        $Pending = Transaction::where('status',1)->where('itsDelete',1)->get()->count();
        $widget = [
            'users' => $users,
            'pending' => $rs,
            'transaksi' => $trans,
            'product' => $product,
            //...
        ];
        return view('admin.overview', compact('widget'));
    }
}
