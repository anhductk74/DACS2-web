<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function indexOrder(){
        $result = order::join('products', 'products.idProduct','=','orders.idProduct')
        ->where(['statusOrder'=>'unConfirm'])->get();
        return view('admin.order.index',['orderAll' => $result]);
    }

    public function orderConfirm($id){
        order::where(['id'=>$id])->update(['statusOrder'=>'confirm']);
        return redirect('/admin/order');
    }
    public function showConfirm(){
        $result = order::join('products', 'products.idProduct','=','orders.idProduct')
        ->where(['statusOrder'=>'confirm'])
        ->get();
        return view('admin.order.confirm',['orderConfirm' => $result]);
    }
    public function showCanceled(){
        $result = order::join('products', 'products.idProduct','=','orders.idProduct')
        ->where(['statusOrder'=>'canceled'])
        ->get();
        return view('admin.order.canceled',['orderCanceled' => $result]);
    }
    public function reConfirm($id){
        order::where(['id'=>$id])->update(['statusOrder'=>'confirm']);
        return redirect('/admin/order/confirm');
    }
    public function removeOrderAdmin($id){
        $resultOrder = order::where(['id'=>$id])->first();
        $resultProduct = products::where(['idProduct'=>$resultOrder->idProduct])->first();
        products::where(['idProduct'=>$resultOrder->idProduct])
        ->update(['quantitySum'=>$resultProduct->quantitySum+$resultOrder->qtyOrder]);
        order::where(['id'=>$id])
        ->update(['statusOrder'=>'shipFail']);
        return redirect('/admin/order/confirm');
    }

    public function shipSuccessAll(){
        $result = order::join('products', 'products.idProduct','=','orders.idProduct')
        ->where(['statusOrder'=>'shipSuccess'])
        ->get();
        return view('admin.order.success',['shipSuccess' => $result]);
    }
    public function shipSuccess($id){
        order::where(['id'=>$id])->update(['statusOrder'=>'shipSuccess']);
        return redirect('/admin/order/confirm');
    }

    public function orderCanceled($id){
        order::where(['id'=>$id])->update(['statusOrder'=>'canceled']);
        return redirect('/admin/order');
    }

    public function orderAll(){
        $orderAll = order::where([
            'idUser'=>Auth::user()->id,
        ])->join('products', 'products.idProduct', '=', 'orders.idProduct')
        ->orderBy('id','desc')->get();

        return view('users.user.order',['orderAll' => $orderAll]);
    }

    public function removeOrder($id){
        order::where([
            'id'=>$id,
        ])->delete();
        return redirect('/order');
    }
}
