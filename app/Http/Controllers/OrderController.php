<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['orderProducts']);

        if (isset($request->code)) {
            $orders->where('code', $request->code);
        }

        if (isset($request->phone)) {
            $orders->where('phone', $request->phone);
        }

        if (isset($request->type)) {
            $orders->where('type', $request->type);
        }
        
        if (isset($request->status)) {
            $orders->where('status', $request->status);
        }

        $orders = $orders->paginate(10);
        
        $viewData = [
            'orders' => $orders
        ];

        return view('pages.orders.index')->with($viewData);
    }

    public function create()
    {
        return view('pages.orders.create');
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
                'discount' => $request->discount,
                'note' => $request->note,
            ]);

            // Create order product
            $products = Product::whereIn('code', $request->product_codes)->get();
            $orderProducts = [];
            foreach ($request->product_codes as $key => $product_code) {
                foreach ($products as $product) {
                    if ($product->code == $product_code) {
                        $orderProducts[] = [
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'price_buy' => $product->price_buy,
                            'price_sale' => $product->price_sale,
                            'quantity' => $request->product_quantitys[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
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

    public function edit($id)
    {
        $order = Order::with(['orderProducts', 'orderProducts.product'])->where('id', $id)->first();

        if (!$order) {
            return redirect()->route('get.products');
        }

        $viewData = [
            'order' => $order,
        ];

        return view('pages.orders.edit')->with($viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $order = Order::where('id', $id)->first();

            if ($order->status == \App\Models\Order::STATUS_PREPARE) {
                $validated = $request->validate([
                    'name' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                    'type' => 'required',
                    'status' => 'required'
                ]);
                
                $order->name = $request->name;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->type = $request->type;
                $order->status = $request->status;
                $order->discount = $request->discount;
                $order->note = $request->note;
                $order->save();
    
                // Create order product
                OrderProduct::where('order_id', $id)->forceDelete();
                $products = Product::whereIn('code', $request->product_codes)->get();
                $orderProducts = [];
                foreach ($request->product_codes as $key => $product_code) {
                    foreach ($products as $product) {
                        if ($product->code == $product_code) {
                            $orderProducts[] = [
                                'order_id' => $id,
                                'product_id' => $product->id,
                                'price_buy' => $product->price_buy,
                                'price_sale' => $product->price_sale,
                                'quantity' => $request->product_quantitys[$key],
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }
                }
                OrderProduct::insert($orderProducts);
    
            } else {
                $order->status = $request->status;
                $order->save();
            }
    
            $request->session()->put('success', true);
        } catch(Exception $e) {
            DB::rollBack();
            $request->session()->put('fail', true);
        }

        return redirect()->route('get.orders');
    }

    public function show($id)
    {
        $order = Order::with(['orderProducts', 'orderProducts.product'])->where('id', $id)->first();

        if (!$order) {
            return redirect()->route('get.products');
        }

        $viewData = [
            'order' => $order,
        ];

        return view('pages.orders.show')->with($viewData);
    }
}
