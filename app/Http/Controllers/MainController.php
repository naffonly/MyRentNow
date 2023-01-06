<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function katalogIndex()
    {
        # code...
        $camera = DB::table('products as p')
        ->select(
            'p.id as id',
            'p.nameProduct as nameP',
            'p.spekProduct as spekP',
            'p.imgProduct as imgP',
            'p.priceProduct as priceP',
            'p.stockProduct as stockP', 
            'p.categoryId as categoryId',
            'cp.nameCategory as nameC',   
            )
        ->join('categoryproduct as cp','cp.id','=','categoryId')
        ->where('itsDelete','=','1')
        ->where('p.categoryId','=','4')
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();
            
        $ipad = DB::table('products as p')
        ->select(
            'p.id as id',
            'p.nameProduct as nameP',
            'p.spekProduct as spekP',
            'p.imgProduct as imgP',
            'p.priceProduct as priceP',
            'p.stockProduct as stockP', 
            'p.categoryId as categoryId',
            'cp.nameCategory as nameC',   
            )
        ->join('categoryproduct as cp','cp.id','=','categoryId')
        ->where('itsDelete','=','1')
        ->where('p.categoryId','=','3')
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();

        $laptop = DB::table('products as p')
        ->select(
            'p.id as id',
            'p.nameProduct as nameP',
            'p.spekProduct as spekP',
            'p.imgProduct as imgP',
            'p.priceProduct as priceP',
            'p.stockProduct as stockP', 
            'p.categoryId as categoryId',
            'cp.nameCategory as nameC',   
            )
        ->join('categoryproduct as cp','cp.id','=','categoryId')
        ->where('itsDelete','=','1')
        ->where('p.categoryId','=','1')
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();

        $ht = DB::table('products as p')
        ->select(
            'p.id as id',
            'p.nameProduct as nameP',
            'p.spekProduct as spekP',
            'p.imgProduct as imgP',
            'p.priceProduct as priceP',
            'p.stockProduct as stockP', 
            'p.categoryId as categoryId',
            'cp.nameCategory as nameC',   
            )
        ->join('categoryproduct as cp','cp.id','=','categoryId')
        ->where('itsDelete','=','1')
        ->where('p.categoryId','=','2')
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();

        $proyektor = DB::table('products as p')
        ->select(
            'p.id as id',
            'p.nameProduct as nameP',
            'p.spekProduct as spekP',
            'p.imgProduct as imgP',
            'p.priceProduct as priceP',
            'p.stockProduct as stockP', 
            'p.categoryId as categoryId',
            'cp.nameCategory as nameC',   
            )
        ->join('categoryproduct as cp','cp.id','=','categoryId')
        ->where('itsDelete','=','1')
        ->where('p.categoryId','=','5')
        ->orderBy('id', 'asc')
        ->limit(3)
        ->get();
        
        return view('main.katalog',compact('camera','ipad','laptop','proyektor','ht'));
    }

    public function about()
    {
        # code...
       
            
        return view('main.about');
    }

    public function detailKatalog()
    {
        return view('main.detail-katalog');
    }
    public function listKatalog()
    {
       return view('main.list-katalog');
    }
}
