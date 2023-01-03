<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
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
        $widget = [
            'users' => $users,
            //...
        ];
        return view('admin.product.daftar-product', compact('widget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::where('itsDelete',1)->get()->count();
        $widget = [
            'users' => $users,
            //...
        ];
        return view('admin.product.create-product', compact('widget'));
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
        $users = User::where('itsDelete',1)->get()->count();
        $widget = [
            'users' => $users,
            //...
        ];
        $request->validate([
            'nameProduct' => ['required', 'string', 'max:255'],
            'spekProduct' => ['required', 'string', 'max:255'],
            'imgProduct' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'priceProduct' => ['required', 'string'],
            'stockProduct' => ['required', 'string'],
            'categotyProduct' => ['required', 'string'],
        ],
        [
            'nameProduct.required' => 'Nama Produk harus diisi',
            'spekProduct.required' => 'Spektifikasi dari Produk harus diisi',
            'stockProduct.required' => 'Stok dari Produk harus diisi',
            'priceProduct.required' => 'Harga dari Produk harus diisi',
            'categotyProduct.required' => 'Pilih Kategori Produk Terlebih Dahulu'
        ]);

        if ( $productImg =  $request->imgProduct) {
            $imageName = time().random_int(2,5).'.'.$productImg->extension();
            Storage::putFileAs('public/product',$productImg,$imageName);
            $imgProduct = 'storage/product/' .  $imageName;
        }
        

        $product =[
            'nameProduct' => $request->nameProduct,
            'spekProduct' => $request->spekProduct,
            'priceProduct' => $request->priceProduct,
            'stockProduct' => $request->stockProduct,
            'categoryId' => $request->categotyProduct,
            'imgProduct' => $imgProduct,
            'itsDelete' => 1,
        ];

        DB::table('products')->insert($product);
        return view('admin.product.daftar-product', compact('widget'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.product.edit-product',compact('product'));
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
    public function update(Request $request)
    {
        //
        $users = User::where('itsDelete',1)->get()->count();
        $widget = [
            'users' => $users,
            //...
        ];

        $request->validate([
            'nameProduct' => 'required|string|max:255',
            'spekProduct' => 'nullable|string|max:255',
            'categoryProduct' => 'required|string|max:255',
            'imgProduct' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'priceProduct' => 'required',
            'stockProduct' => 'required',
           
        ]);
        
        $product = Product::findOrFail($request->id);
        $product->nameProduct = $request->input('nameProduct');
        $product->spekProduct = $request->input('spekProduct');
        $product->categoryId = $request->input('categoryProduct');
        $product->priceProduct = $request->input('priceProduct');
        $product->stockProduct = $request->input('stockProduct');

        if ( $productImg =  $request->imgProduct) {
            $imageProduct = time().random_int(2,5).'.'.$productImg->extension();
            Storage::putFileAs('public/product',$productImg,$imageProduct);
            $product->imgProduct = 'storage/product/' .  $imageProduct;
        }else{
            unset( $product->imgProduct);
        }
        

        $product->save();
        return redirect()->route('product.overview')->withSuccess('Update Successfully');
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
    
    public function getAllProducts()
    {
        $products = DB::table('products as p')
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
            ->orderBy('id', 'asc')
            ->get();
            

            return DataTables::of($products)
            ->addColumn('action', function($product) {
                $link = 'product.softDelete';
                $productId = 'product';
                $html = '
                <a class="btn btn-info" href="/detail-product/'.$product->id.'">Show</a>
                <form class="btn-group" action="'. route($link,[$productId=>$product->id]) . '" method="put">
                 <button type="submit" class="btn btn-danger">Delete</button>
                </form>';
      
                return $html;
            })
            ->make(true);
    }
    
    public function softDelete(Request $request,Product $product)
    {
        # code...
        $product->itsDelete = 0;
        $product->save();
        return back();
    }
}
