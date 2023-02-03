<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\order;
use App\Models\User;
use App\Models\vote;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function home(){
        $totalRevenue = 0;
        $resultTotalRe = order::join('products', 'products.idProduct','=','orders.idProduct')
        ->where(['statusOrder'=>'shipSuccess'])
        ->get();
        foreach($resultTotalRe as $items){
            $totalRevenue += $items->qtyOrder*$items->price;
        }
        $resultStar = vote::all()->count();
        $resultOrder = order::where(['statusOrder'=>'shipSuccess'])->count();
        $resultNewUser = User::where(['permission'=>'user'])->count();
        return view('admin.home',['totalRevenue'=>$totalRevenue, 'resultStar'=>$resultStar, 'resultOrder'=>$resultOrder, 'resultNewUser'=>$resultNewUser]);
    }
    public function create(){
        return view('admin.category.add');
    }
    public function createCategory(Request $request){
        $file = $request->img->getClientOriginalName();
        $filenamehash = Str::random(10).$file;
        $file1 = $request->img1->getClientOriginalName();
        $filenamehash1 = Str::random(10).$file1;
        $file2 = $request->img2->getClientOriginalName();
        $filenamehash2 = Str::random(10).$file2;
        $file3 = $request->img3->getClientOriginalName();
        $filenamehash3 = Str::random(10).$file3;

        Products::create([
            'nameProduct' => $request->nameProduct,
            'category' => $request->category,
            'imgProduct' => $filenamehash,
            'img1' => $filenamehash1,
            'img2' => $filenamehash2,
            'img3' => $filenamehash3,
            'price' => $request->price,
            'quantitySum' => $request->quantity,
            'detail' => $request->detail
        ]);
        $request->file('img')->storeAs('public/images',$filenamehash);
        $request->file('img1')->storeAs('public/images',$filenamehash1);
        $request->file('img2')->storeAs('public/images',$filenamehash2);
        $request->file('img3')->storeAs('public/images',$filenamehash3);
        return redirect('/admin/categories');
    }

    public function index(){
        $result = products::all();
        return view('admin.category.index',['productAll'=>$result]);
    }

    public function findCategory($idProduct){
        $result = products::where(['idProduct'=>$idProduct])->first();
        return view('admin.category.edit',['product'=>$result,'idProduct'=>$idProduct]);
    }

    public function updateCategory(Request $request,$idProduct){
        $data = [
            'nameProduct' => $request->nameProduct,
            'imgProduct' => $request->img,
            'img1' => $request->img1,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'price' => $request->price,
            'quantitySum' => $request->quantity,
            'detail' => $request->detail
        ];
        products::where(['idProduct'=>$idProduct])->update($data);
        return redirect('/admin/categories');
    }
    public function removeCategory($idProduct){
        products::where(['idProduct'=>$idProduct])->delete();
        return redirect('/admin/categories');
    }


}
