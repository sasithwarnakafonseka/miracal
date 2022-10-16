<?php

  

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Products;

  

class CartController extends Controller
{
  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function addToCart(Request $request)

    {
        $id = $request->id;
        $qty = $request->quantity;
        $product = Products::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $qty;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "id" => $product->id,
                "max_items" => $product->i_stock_quantity,
                "quantity" => $qty,
                "price" => $product->g_regular_price,
                "image" => $product->product_thumbnail_image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function update(Request $request)

    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');

        }else{
            return 'error';
        }

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');

        }

    }

}
