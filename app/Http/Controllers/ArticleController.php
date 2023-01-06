<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
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
        return view('admin.article.daftar-article', compact('widget'));
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
        return view('admin.article.create-article', compact('widget'));
        
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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'desk' => ['required', 'string'],
            'imgArticle' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            
        ],
        [
            'title.required' => 'Judul Artikel harus diisi',
            'desk.required' => 'deskripsi dari Artikel harus diisi',
            'imgArticle.required' => 'Gambar dari Artikel harus diisi',
        ]);

        if ( $img =  $request->imgArticle) {
            $imageName = time().random_int(2,5).'.'.$img->extension();
            Storage::putFileAs('public/article',$img,$imageName);
            $imageUrl = 'storage/article/' .  $imageName;
        }
        

        $article =[
            'title' => $request->title,
            'desk' => $request->desk,
            'image' => $imageUrl,
            'itsDelete' => 1,
        ];

        DB::table('articles')->insert($article );
        return view('admin.article.daftar-article', compact('widget'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return view('admin.article.edit-article',compact('article'));
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

        $request->validate([
            'title' => 'required|string|max:255',
            'desk' => 'nullable|string',
            'imgArticle' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           
        ]);
        
        $article = Article::findOrFail($request->id);
        $article->title = $request->input('title');
        $article->desk = $request->input('desk');

        if ( $image =  $request->imgArticle) {
            $newImg = time().random_int(2,5).'.'.$image->extension();
            Storage::putFileAs('public/product',$image,$newImg);
            $article->imgArticle = 'storage/product/' .  $newImg;
        }else{
            unset( $article->imgArticle);
        }
        

        $article->save();
        return redirect()->route('article.overview')->withSuccess('Update Successfully');
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

     
    public function softDelete(Request $request,Article $article)
    {
        # code...
        $article->itsDelete = 0;
        $article->save();
        return back();
    }
    public function getAllArcticles()
    {
        $articles = DB::table('articles as a')
            ->select(
                'a.id as id',
                'a.title as title',
                'a.desk as desk',
                'a.image as image',
                )
            ->where('itsDelete','=','1')
            ->orderBy('id', 'asc')
            ->get();

            return DataTables::of($articles)
            ->addColumn('action', function($article) {
                $link = 'article.softDelete';
                $articleid = 'article';
                $html = '
                <a class="btn btn-info" href="/detail-article/'.$article->id.'">Show</a>
                <form class="btn-group" action="'. route($link,[$articleid=>$article->id]) . '" method="put">
                 <button type="submit" class="btn btn-danger">Delete</button>
                </form>';
               
                return $html;
            })
            ->make(true);
    }
}
