<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'quantity' => 1, 'price' => $product->prod_price, 'attributes' => array('img' => $product->prod_img)]);
    	return redirect('cart/show');
    }

    public function getShowCart(){
    	$data['total'] = Cart::getTotal();
    	$data['items'] = Cart::getContent();
    	return view('frontend/cart',$data);
    }

    public function getDeleteCart($id){
        if($id == 'all'){
            Cart::clear();
        }
        else{
            Cart::remove($id);
        }
        return back();
    }

    public function getUpdateCart(Request $request){
        $id = $request->id;
        $quantity = ['quantity' => $request->quantity];
        Cart::update($id, $quantity);
    }

    public function postSendEmail(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
        Mail::send('frontend/email', $data, function ($message) use ($email) {
            $message->from('nhokkononline96@gmail.com', 'Long Bui');
        
            $message->to($email, $email);
        
            $message->cc('boy_deptrai_onlinevodoi@yahoo.com', 'Long Bui');
        
            $message->subject('Xác nhận hóa đơn mua hàng');
        });
        Cart::clear();
        return redirect('complete');
    }

    public function getComplete(){
        return view('frontend/complete');
    }
}
