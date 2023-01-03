<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('product');
        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        }
        else{
            $products = Product::get();
        }
        return view('shop.shop', compact('products'));
    }
    public function cart()
    {
        $products = Product::get();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.cart', $param);
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
    public function checkOuts()
    {
        return view('shop.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

        // dd('1');
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['amount']++;
            // dd( $cart[$id]['amount']);
            // dd(1230);

        } else {
            $cart[$id] = [
                "nameVi" => $product->name,
                "amount" => 1,
                "price" => $product->price,
                'image' => $product->image,
                'max' => $product->amount,
            ];
        }

        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        return redirect()->route('shop.cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categorys = Category::get();
        $param = [
            'product' => $product,
            'categorys' => $categorys
        ];
        return view('shop.showproduct',$param);
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

            if ($request->id && $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                $totalCart = number_format(($cart[$request->id]["price"]) * $cart[$request->id]["quantity"]);
                $totalAllCart = 0;
                $TotalAllRefreshAjax = 0;
                foreach ($cart as $id => $details) {
                    $totalAllCart = $details['price'] * $details['quantity'];
                    $TotalAllRefreshAjax += $totalAllCart;
                }
                session()->put('cart', $cart);
                session()->flash('message', 'Cart updated successfully');
                return response()->json([
                    'status' => 'cập nhật thành công',
                    'totalCart' => '' . $totalCart,
                    'TotalAllRefreshAjax' => '' . number_format($TotalAllRefreshAjax),
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function search(Request $request)
    {

        $search = $request->input('product');
        if (!$search) {
            return redirect()->route('category.index');
        }
        $product = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('shop.shop', compact('product'));
    }
    public function remove(Request $request)
    {
        // dd('fsfd');
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->put('cart', $cart);

        }
    }
    public function order(Request $request)
    {
            $id = Auth::user()->id;
            $data = User::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();

            $order = new Orders();
            $order->user_id = Auth::user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();

                $count_product = count($request->product_id);
                for ($i = 0; $i < $count_product; $i++) {
                    $orderItem = new OrderDetail();
                    $orderItem->order_id =  $order->id;
                    $orderItem->product_id = $request->product_id[$i];
                    $orderItem->quantity = $request->amount[$i];
                    $orderItem->total = $request->total[$i];
                    $orderItem->save();
                    session()->forget('cart');
                    DB::table('products')
                        ->where('id', '=', $orderItem->product_id)
                        ->decrement('amount', $orderItem->quantity);
                }

                return redirect()->route('shop');
    }
}
