<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderProducts', 'orderProducts.product']);

        $orders = $orders->paginate(10);
        
        $viewData = [
            'orders' => $orders
        ];

        return view('pages.orders.index')->with($viewData);
    }

    public function create()
    {
        $viewData = [

        ];

        return view('pages.orders.create')->with($viewData);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        $orderCode = time();

        DB::beginTransaction();
        try {
            // Create order
            $order = Order::create([
                'code' => $orderCode,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->type,
                'status' => $request->status,
            ]);

            // Create order product
            $products = Product::whereIn('code', $request->product_codes)->pluck('id', 'code')->toArray();
            $orderProducts = [];
            for ($i = 0; $i < count($request->product_codes); $i++) {
                if (isset($products[$request->product_codes[$i]])) {
                    $orderProducts[] = [
                        'order_id' => $order->id,
                        'product_id' => $products[$request->product_codes[$i]],
                        'quantity' => $request->product_quantitys[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            OrderProduct::insert($orderProducts);

            $request->session()->put('success', true);
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->put('fail', true);
        }
        
        return redirect()->route('get.orders');
    }
}
