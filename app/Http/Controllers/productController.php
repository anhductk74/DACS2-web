<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\cart;
use App\Models\User;
use App\Models\vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class productController extends Controller
{
    //


    public function productAll(){
        $dataStar = [];
        $ProductIndex = products::orderBy('idProduct','desc')->where('quantitySum','>',0)->Paginate(8);
        $ProductPage = ceil(products::count()/8);
        foreach ($ProductIndex as $item){
            $star = vote::where('idProduct', $item->idProduct)->avg('star');
            $dataStar[$item->idProduct] = round($star);
        }
        return view('users.user.products',['dataProductAll'=>$ProductIndex,'star'=>$dataStar,'pageProduct'=>$ProductPage]);
    }

    public function productIndex(){
        $data = [];
        $dataStar = [];
        $ProductIndex = products::orderBy('idProduct','desc')->where('quantitySum','>',0)->limit(8)->get();
        foreach ($ProductIndex as $item){
            $star = vote::where('idProduct', $item->idProduct)->avg('star');
            if($star < 0.5){
                $dataStar[$item->idProduct] = floor($star);
            } else {
                $dataStar[$item->idProduct] = round($star);
            }
            $data[] = $item;
        }
        return view('users.user.index',['dataProductAll'=>$ProductIndex,'star'=>$dataStar]);
    }


    public function productDetail($id){
        $productDetail = DB::table('products')
        ->where('products.idProduct',$id)
        ->first();
        // dd($productDetail);
        $dataStar = [];
        $productRelated = DB::table('products')
            ->where('category', $productDetail->category)->get();
        foreach ($productRelated as $item){
            $star = vote::where('idProduct', $item->idProduct)->avg('star');
            if($star < 0.5){
                $dataStar[$item->idProduct] = floor($star);
            } else {
                $dataStar[$item->idProduct] = round($star);
            }
        }
        return view('users.user.product-detail',['productDetail'=>$productDetail,'idProduct'=>$id,'productRelated'=>$productRelated,'star'=>$dataStar]);
    }


    public function productVotes(Request $request,$idProduct){
        $data = [
            'idProduct'=>$idProduct,
            'idUser'=>Auth::user()->id,
            'star'=>$request->star,
        ];
        $result = vote::where([
            'idProduct'=>$idProduct,
            'idUser'=>Auth::user()->id
        ])->first();
        if($result){
            vote::where([
                'idProduct'=>$idProduct,
                'idUser'=>Auth::user()->id
            ])->update([
                'star'=>$request->star,
            ]);
            return redirect('/product-detail/'.$idProduct);
        } else {
            vote::insert($data);
            return redirect('/product-detail/'.$idProduct);
        }
    }

    public function searchProduct(Request $request){
        $dataStar = [];
        $ProductIndex = products::orderBy('idProduct','desc')->where('quantitySum','>',0)
        ->where('nameProduct','like','%'.$request->search.'%')->get();
        foreach ($ProductIndex as $item){
            $star = vote::where('idProduct', $item->idProduct)->avg('star');
            $dataStar[$item->idProduct] = round($star);
        }
        return view('users.user.products',['dataProductAll'=>$ProductIndex,'star'=>$dataStar,'pageProduct'=>0]);
    }
}