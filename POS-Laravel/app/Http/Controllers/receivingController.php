<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;



class receivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receiving.index');
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

    public function directReceiving()
    {
        return view('receiving.direct');
    }

    public function search(Request $request)
    {
        
        
            if(isset($_GET['query'])){
            
            $search_text = $_GET['query'];
            
            $product = DB::table('products')->where('name','LIKE','%'.$search_text.'%')->paginate(2);
                $product->appends($request->all());
            //   $product->paginate(10);
                return view('receiving.direct',['products'=>$product]);
            }
            else{
                return view('receiving.direct');            
            }
        // $search_text = $_GET['query'];
        // $product = Product::where('name','LIKE','%'.$search_text.'%')->get();
    //     $products = $products->where('name', 'LIKE', "%{$request->search}%");
    
    // return ;
    }
}
