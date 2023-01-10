<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('admin.transaction.daftar-transaction',compact('widget'));
    }
    public function indexPending()
    {
        //
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
        return view('admin.transaction.daftar-pending-transaction',compact('widget'));
    }

    public function indexLoaned()
    {
        //
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
        return view('admin.transaction.daftar-loaned-transaction',compact('widget'));
    }
    public function indexReturned()
    {
        //
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
        return view('admin.transaction.daftar-returned-transaction',compact('widget'));
    }
    public function indexLost()
    {
        //
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
        return view('admin.transaction.daftar-lost-transaction',compact('widget'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allusers = User::where('itsDelete',1)->get()->count();
        $users = User::where('itsDelete',1)->get();
        $products = Product::where('itsDelete',1)->get();
        $trans = Transaction::where('itsDelete',1)->get()->count();
        $product = Product::where('itsDelete',1)->get()->count();
        $rs = Transaction::select(DB::raw('sum(priceRent) as price'))->where('itsDelete',1)->get()[0]->price;
        $Pending = Transaction::where('status',1)->where('itsDelete',1)->get()->count();
        $widget = [
            'users' => $allusers,
            'pending' => $rs,
            'transaksi' => $trans,
            'product' => $product,
            //...
        ];
        return view('admin.transaction.create-transaction', compact('widget','products','users'));
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
        // dd($request);
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
        ];
       
        $request->validate([
            'idPeminjam' => ['required', 'integer'],
            'idProduct' => ['required', 'integer'],
            'dateIn' => ['required'],
            'dateOut' => ['required'],
        ],
        [
            'idPeminjam.required' => 'Pilih Peminjam Terlebih dahulu',
            'idProduct.required' => 'Pilih Barang Terlebih dahulu',
            'dateIn.required' => 'pilihlah waktu pengambilan barang Terlebih dahulu',
            'dateOut.required' => 'Pilihlah waktu kembali barang Terlebih dahulu'
        ]);

        $products = Product::find($request->idProduct);
        $dataIn = new Carbon($request->dateIn);
        $dataOut = new Carbon($request->dateOut);
        $hari = $dataIn->diff($dataOut)->days;
        $harga = $hari * $products->priceProduct;
       
        $product =[
            'idPeminjam' => $request->idPeminjam,
            'idProduct' => $request->idProduct,
            'dateIn' => $request->dateIn,
            'dateOut' => $request->dateOut,
            'priceRent' => $harga,
            'itsDelete' => 1,
            'status'=> 1,
        ];
        DB::table('transactions')->insert($product);

        return view('admin.transaction.daftar-transaction', compact('widget'));
    }
    
    public function rent(Request $request)
    {
        //
        // dd($request);
        $Tfinish = Transaction::where('status',3)->where('itsDelete',1)->where('idPeminjam',Auth::user()->id)->get()->count();
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
       
        $request->validate([
            'idPeminjam' => ['required', 'integer'],
            'idProduct' => ['required', 'integer'],
            'dateIn' => ['required'],
            'dateOut' => ['required'],
        ],
        [
            'idPeminjam.required' => 'Pilih Peminjam Terlebih dahulu',
            'idProduct.required' => 'Pilih Barang Terlebih dahulu',
            'dateIn.required' => 'pilihlah waktu pengambilan barang Terlebih dahulu',
            'dateOut.required' => 'Pilihlah waktu kembali barang Terlebih dahulu'
        ]);

        $products = Product::find($request->idProduct);
        $dataIn = new Carbon($request->dateIn);
        $dataOut = new Carbon($request->dateOut);
        $hari = $dataIn->diff($dataOut)->days;
        $harga = $hari * $products->priceProduct;
       
        $product =[
            'idPeminjam' => $request->idPeminjam,
            'idProduct' => $request->idProduct,
            'dateIn' => $request->dateIn,
            'dateOut' => $request->dateOut,
            'priceRent' => $harga,
            'itsDelete' => 1,
            'status'=> 1,
        ];
        DB::table('transactions')->insert($product);

        return view('customer.customer-overview', compact('widget'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //\
        return view('admin.transaction.edit-transaction',compact('transaction'));
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
    public function loanedRent(Request $request,Transaction $transaction)
    {
        # code...
        DB::table('products')->where('id',$transaction->idProduct)->decrement('stockProduct');
        $transaction->status = 2;
        $transaction->save();
        return back();
    }
    
    public function returnedRent(Transaction $transaction)
    {
        # code...
        DB::table('products')->where('id',$transaction->idProduct)->increment('stockProduct');
        $transaction->status = 3;
        $transaction->save();
        return back();
    }
    public function returnedLostRent(Transaction $transaction)
    {
        # code...
        DB::table('products')->where('id',$transaction->idProduct)->increment('stockProduct');
        $transaction->status = 4;
        $transaction->save();
        return back();
    }

    public function lostRent(Request $request,Transaction $transaction)
    {
        # code...
        $transaction->status = 4;
        $transaction->save();
        return back();
    }

    public function FoundRent(Request $request,Transaction $transaction)
    {
        # code...
        $transaction->status = 3;
        $transaction->save();
        return back();
    }


    public function getAllTransactions()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
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
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $html = '
                <a class="btn btn-info mb-1" href="/show-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                ';
               
                return $html;
            })
            ->make(true);
    }
    public function getAllTransactionsPending()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
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
            ->where('t.status','=','1') 
            ->where('t.itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $linkAprrove = 'transaction.loaned';
                $transactionid = 'transaction';
                $html = '
                <a class="btn btn-info mb-1" href="/show-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <form class="btn-group" action="'. route($linkAprrove,[$transactionid=>$transaction->id]) . '" method="put">
                <input type="hidden" value="'.$transaction->id.'" name="id" > 
                <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                </form>
                ';
               
                return $html;
            })
            ->make(true);
    }
    public function getAllTransactionsLoaned()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
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
            ->where('t.status','=','2') 
            ->where('t.itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $linkLoadned = 'transaction.returned';
                $linkRentlost = 'transaction.returnedLostRent';
                $transactionid = 'transaction';
                $html = '
                <a class="btn btn-info mb-1" href="/show-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <form class="btn-group" action="'. route($linkLoadned,[$transactionid=>$transaction->id]) . '" method="put">
                <input type="hidden" value="'.$transaction->id.'" name="id" >
                 <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                </form>
                <form class="btn-group" action="'. route($linkRentlost,[$transactionid=>$transaction->id]) . '" method="put">
                <input type="hidden" value="'.$transaction->id.'" name="id" >
                 <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                </form>
                ';
                return $html;
            })
            ->make(true);
    }
    public function getAllTransactionsReturned()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
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
            ->where('t.status','=','3') 
            ->where('t.itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $linkLost = 'transaction.lost';
                $transactionid = 'transaction';
                $html = '
                <a class="btn btn-info mb-1" href="/show-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <form class="btn-group" action="'. route($linkLost,[$transactionid=>$transaction->id]) . '" method="put">
                <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                </form>
                ';
               
                return $html;
            })
            ->make(true);
    }
    public function getAllTransactionsLost()
    {
        $transactions = DB::table('transactions as t')
            ->select(
                't.id as id',
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
            ->where('t.status','=','4') 
            ->where('t.itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($transactions)
            ->addColumn('action', function($transaction) {
                $linkLoadned = 'transaction.found';
                $transactionid = 'transaction';
                $html = '
                <a class="btn btn-info mb-1" href="/show-transaction/'.$transaction->id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <form class="btn-group" action="'. route($linkLoadned,[$transactionid=>$transaction->id]) . '" method="put">
                <input type="hidden" value="'.$transaction->id.'" name="id" >
                 <button type="submit" class="btn btn-warning   "><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                </form>
                ';
               
                return $html;
            })
            ->make(true);
    }

    public function getTransaction(Transaction $transaction)
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
        return view('admin.transaction.edit-transaction',compact('transaction','data'));
    }
}
