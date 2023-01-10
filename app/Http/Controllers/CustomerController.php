<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $Tfinish = Transaction::where('status',3)->where('itsDelete',1)->where('idPeminjam',auth::user()->id)->get()->count();
        $trans = Transaction::where('status',2)->where('itsDelete',1)->where('idPeminjam',auth::user()->id)->get()->count();
        $product = Product::where('itsDelete',1)->get()->count();
        $rs = Transaction::select(DB::raw('sum(priceRent) as price'))->where('itsDelete',1)->where('idPeminjam',auth::user()->id)->get()[0]->price;
        $TTotal = Transaction::where('itsDelete',1)->where('idPeminjam',auth::user()->id)->get()->count();
        $widget = [
            'Tfinish' => $Tfinish,
            'TPrice' => $rs,
            'total' => $TTotal,
            'Ontrans' => $trans,
            //...
        ];
        // dd($widget);
        return view('customer.customer-overview',compact('widget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profilUpdate(Request $request)
    {
  
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'indetityFace' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'indetityCard' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);
        
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
       
        if ( $faceImg =  $request->indetityFace) {
            $imageFaceName = time().random_int(2,5).'.'.$faceImg->extension();
            Storage::putFileAs('public/user/face',$faceImg,$imageFaceName);
            $user->indetityFace = 'storage/user/face/' .  $imageFaceName;
        }else{
            unset( $user->indetityFace);
        }
        

        if ($cardImg = $request->indetityCard) {
            $imageCardName = time().random_int(2,5).'.'. $cardImg->extension(); 
            Storage::putFileAs('public/user/card',$cardImg,$imageCardName);
            $user->indetityCard =  'storage/user/card/' .  $imageCardName;
        } else {
            unset($user->indetityCard);
        }
        
        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }
     
        $user->save();

        return redirect()->route('costumer')->withSuccess('Profile updated successfully.');
    }
   
    public function customerProfil()
    {
        return view('customer.profile');
    }

    public function getCostomerTransaction()
    {
        $customer = auth()->user()->id;
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
                't.idPeminjam as idC',  
                'p.nameProduct as nProduct',
                'u.name as name',
                't.dateIn as dateIn',
                't.dateOut as dateOut',
                't.status as tStatus',
                DB::raw('
                (CASE
                WHEN t.status="1" THEN "Pending"
                WHEN t.status="2" THEN "Dipinjam"
                WHEN t.status="3" THEN "DiKembalikan"
                WHEN t.status="4" THEN "Hilang"
                END) as status
                 '),
                't.itsDelete as itsDelete',
                't.priceRent as price',
                )
            ->join('products as p','p.id','=','idProduct')
            ->join('users as u','u.id','=','idPeminjam')
            ->where('t.itsDelete','=','1')
            ->where('t.idPeminjam','=',$customer)
            ->orderBy('id', 'desc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $html = '
                <a class="btn btn-info mb-1" href="/customer-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                ';
               
                return $html;
            })
            ->make(true);
    }
    public function getCosTransaction(Transaction $transaction)
    {

        $setdata = $transaction->id;
       
        $data = DB::table('transactions as t')
        ->select(
            't.id as id',
            'p.nameProduct as nProduct',
            'u.name as name',
            't.dateIn as dateIn',
            't.dateOut as dateOut',
            't.status as tStatus',
            'u.email as email',
            'u.phone as phone',
            'u.address as address',
            'u.indetityFace as indenC',
            'u.indetityCard as indenF',
            'p.imgProduct as imgP',
            DB::raw('
            (CASE
            WHEN t.status="1" THEN "Pending"
            WHEN t.status="2" THEN "Dipinjam"
            WHEN t.status="3" THEN "DiKembalikan"
            WHEN t.status="4" THEN "Hilang"
            END) as status
             '),
            't.itsDelete as itsDelete',
            't.priceRent as price',
            )
        ->join('products as p','p.id','=','idProduct')
        ->join('users as u','u.id','=','idPeminjam')
        ->where('t.id','=',$setdata) 
        ->where('t.itsDelete','=','1')
        ->orderBy('id', 'asc')
        ->get();
        
// return dd($data);
        return view('customer.show-transaction',compact('transaction','data'));
    }
}
