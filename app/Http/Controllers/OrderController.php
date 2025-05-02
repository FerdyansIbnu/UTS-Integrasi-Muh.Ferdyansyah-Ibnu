<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    // GET: Menampilkan semua pesanan
    public function index()
    {
        $orders = Order::all();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found'], 404);
        }

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'data' => $orders
        ], 200);
    }

    // GET: Menampilkan pesanan berdasarkan ID
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'message' => 'Order retrieved successfully',
            'data' => $order
        ], 200);
    }

    // POST: Membuat pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'product_id'  => 'required|integer',
            'quantity'    => 'required|integer|min:1'
        ]);

        // Validasi ke Customer Service
        $customerResponse = Http::get("http://localhost:8002/api/customers/{$request->customer_id}");
        if (!$customerResponse->ok()) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // Validasi ke Product Service
        $productResponse = Http::get("http://localhost:8000/api/product/{$request->product_id}");
        if (!$productResponse->ok()) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $productData = $productResponse->json();
        $total = $productData['harga'] * $request->quantity;

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'total_price' => $total,
        ]);

        return response()->json([
            'message'  => 'Order created successfully',
            'data'     => $order,
            'customer' => $customerResponse->json(),
            'product'  => $productData
        ], 201);
    }

    // PUT: Memperbarui pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'product_id'  => 'required|integer',
            'quantity'    => 'required|integer|min:1'
        ]);

        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $customerResponse = Http::get("http://localhost:8002/api/customers/{$request->customer_id}");
        if (!$customerResponse->ok()) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $productResponse = Http::get("http://localhost:8000/api/product/{$request->product_id}");
        if (!$productResponse->ok()) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $productData = $productResponse->json();
        $total = $productData['harga'] * $request->quantity;

        $order->update([
            'customer_id' => $request->customer_id,
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'total_price' => $total,
        ]);

        return response()->json([
            'message'  => 'Order updated successfully',
            'data'     => $order,
            'customer' => $customerResponse->json(),
            'product'  => $productData
        ], 200);
    }

    // DELETE: Menghapus pesanan
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
