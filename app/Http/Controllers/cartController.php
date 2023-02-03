<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    public function addProductCart($idProduct){
        $productFind = cart::where(['idUser'=>Auth::user()->id,'idProduct'=>$idProduct,'status'=>'unpaid'])->first();
        if($productFind == true){
            $cart = cart::where(['idUser'=>Auth::user()->id,'idProduct'=>$idProduct,'status'=>'unpaid'])
            ->update([
                'quantityCart'=>++$productFind->quantityCart,
            ]);
            if($cart == true){
                return redirect('/cart');
            }
        }else{
            $cart = cart::create([
                'idUser'=>Auth::user()->id,
                'idProduct'=>$idProduct,
            ]);
            if($cart == true){
                return redirect('/cart');
            }
        }
    }

    public function showCartAll(){
        $cartAll = [];
        $data = cart::where(['idUser'=>Auth::user()->id,'status'=>'unpaid'])
        ->join('products', 'products.idProduct', '=', 'carts.idProduct')
        ->get();
        foreach ($data as $item){
            $product = products::where(['idProduct'=>$item->idProduct])->first();
            if($item->quantityCart <= $product->quantitySum){
                $cartAll[] = $item;
            }
        }
        return view('users.user.Cart',['cartAll'=>$cartAll]);
    }

    public function updateQtyCart($idCart, Request $request){
        $cart = cart::where(['idCart'=>$idCart])->first();
        $product = products::where(['idProduct'=>$cart->idProduct])->first();
        if($product->quantitySum >= $request->quantityCart){
            $cart = cart::where(['idCart'=>$idCart])
                ->update([
                    'quantityCart'=>$request->quantityCart,
                ]);
                if($cart){
                    return redirect('/cart');
                }
        }
        return back();
    }
    public function cartRemove($idCart){
        $cartRemove = cart::where('idCart', $idCart)->delete();
        if($cartRemove){
            return redirect('/cart');
        }
    }

    public function cartPay(){
        $cartAll = [];
        $numCart = 0;
        $dataCart = cart::where(['idUser'=>Auth::user()->id,'status'=>'unpaid'])
        ->join('products', 'products.idProduct', '=', 'carts.idProduct')
        ->get();
        foreach ($dataCart as $item){
            $product = products::where(['idProduct'=>$item->idProduct])->first();
            if($item->quantityCart <= $product->quantitySum){
                $cartAll[] = $item;
                $numCart++;
            }
        }
        return view('users.user.cart-pay',['cartAll'=>$cartAll,'numCart'=>$numCart]);
    }


    public function order(Request $request){
        $dataCart = cart::where(['idUser'=>Auth::user()->id,'status'=>'unpaid'])
        ->join('products', 'products.idProduct', '=', 'carts.idProduct')
        ->get();
        foreach ($dataCart as $item){
            $product = products::where(['idProduct'=>$item->idProduct])->first();
            if($item->quantityCart <= $product->quantitySum){
                order::create([
                    'idUser'=>Auth::user()->id,
                    'idProduct'=>$item->idProduct,
                    'receiverName'=>$request->firstName." ".$request->lastName,
                    'address'=>$request->address,
                    'phone'=> $request->phone,
                    'note'=> $request->note,
                    'qtyOrder'=>$item->quantityCart,
                    'statusOrder'=>'unConfirm'
                ]);
                products::where(['idProduct'=>$item->idProduct])
                ->update(['quantitySum'=>$product->quantitySum-$item->quantityCart]);
                cart::where(['idCart'=>$item->idCart])->delete();
            }
        }
        return redirect('/cart');
    }
}