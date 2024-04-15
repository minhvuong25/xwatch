<?php


//
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Models\Province;
use Cart;

class CartController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function showCart()
    {
        $cart = session()->get('cart');
        return view('web.cart.index', compact('cart'));
    }
    public function addToCart(Request $request, $id)
    {
        $product = $this->productRepo->with(["images",
            "brand"])->find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            if(!empty($request['size'])) {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name_item' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'images' => $product->images,
                    'size' => $request['size']
                ];
            }else{
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name_item' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'images' => $product->images,
                ];
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.showCart');

    }
    public function addCartAjax(Request $request, $id)
    {
        $product = $this->productRepo->with(["images",
            "brand"])->find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            if(!empty($request['size'])) {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name_item' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'images' => $product->images,
                    'size' => $request['size']
                ];
            }else{
                $cart[$id] = [
                    'product_id' => $product->id,
                    'name_item' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'images' => $product->images,
                ];
            }
        }
        session()->put('cart', $cart);
        // dd(session()->get('cart'));
        return response()->json(['code' => 200, 'message' =>'success'], 200);

    }


    public function updateCart(Request $request)
    {
 
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $cartComponent = view('web.cart.components.cart_component', compact('cart'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200 ] , 200);
        }
        
    }
    public function deleteCartItem(Request $request)
    {
        if ($request->id ) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $cartComponent = view('web.cart.components.cart_component', compact('cart'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200 ] , 200);
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.showCart');
    }
}
