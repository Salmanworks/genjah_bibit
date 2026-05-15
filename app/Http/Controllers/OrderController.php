<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create(Product $product)
    {
        return view('orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'       => 'required|exists:products,id',
            'quantity'         => 'required|integer|min:1',
            'shipping_address' => 'required|string|max:500',
            'phone'            => 'required|string|max:20',
            'notes'            => 'nullable|string|max:1000',
        ]);

        $product    = Product::findOrFail($validated['product_id']);
        $totalPrice = $product->price * $validated['quantity'];

        $order = Order::create([
            'user_id'          => Auth::id(),
            'product_id'       => $validated['product_id'],
            'quantity'         => $validated['quantity'],
            'total_price'      => $totalPrice,
            'shipping_address' => $validated['shipping_address'],
            'phone'            => $validated['phone'],
            'notes'            => $validated['notes'],
            'status'           => 'pending',
        ]);

        $customerName = Auth::user()->name ?? 'Pelanggan';
        $whatsappMessage = "Pesanan Baru dari Website Genjah Rumah Bibit" . PHP_EOL . PHP_EOL;
        $whatsappMessage .= "Nama: {$customerName}" . PHP_EOL;
        $whatsappMessage .= "Produk: {$product->name}" . PHP_EOL;
        $whatsappMessage .= "Jumlah: {$validated['quantity']} unit" . PHP_EOL;
        $whatsappMessage .= "Total Harga: " . format_price($totalPrice) . PHP_EOL;
        $whatsappMessage .= "Alamat Kirim: {$validated['shipping_address']}" . PHP_EOL;
        $whatsappMessage .= "No. WhatsApp: {$validated['phone']}" . PHP_EOL;
        if (!empty($validated['notes'])) {
            $whatsappMessage .= "Catatan: {$validated['notes']}" . PHP_EOL;
        }
        $whatsappMessage .= PHP_EOL . "Mohon konfirmasi pesanan ini.";

        return redirect()->away(whatsapp_link($whatsappMessage));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Hanya pesanan berstatus Menunggu yang dapat diubah.');
        }

        $order->load('product');

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Hanya pesanan berstatus Menunggu yang dapat diubah.');
        }

        $order->load('product');
        $product = $order->product;

        $validated = $request->validate([
            'quantity'         => 'required|integer|min:1',
            'shipping_address' => 'required|string|max:500',
            'phone'            => 'required|string|max:20',
            'notes'            => 'nullable|string|max:1000',
        ]);

        if ($validated['quantity'] > $product->stock) {
            return back()
                ->withErrors(['quantity' => 'Jumlah melebihi stok saat ini (' . $product->stock . ' unit).'])
                ->withInput();
        }

        $totalPrice = $product->price * $validated['quantity'];

        $order->update([
            'quantity'         => $validated['quantity'],
            'total_price'      => $totalPrice,
            'shipping_address' => $validated['shipping_address'],
            'phone'            => $validated['phone'],
            'notes'            => $validated['notes'] ?? null,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Data pesanan diperbarui. Total mengikuti harga produk terkini.');
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan yang sudah diproses tidak dapat dibatalkan.');
        }

        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
