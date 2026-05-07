@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.orders.index') }}" class="text-emerald-600 hover:text-emerald-800 text-sm flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Pesanan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700 p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Informasi Pesanan</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Dipesan pada {{ $order->created_at->format('d F Y H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-{{ $order->status_color }}-100 text-{{ $order->status_color }}-800 dark:bg-{{ $order->status_color }}-900 dark:text-{{ $order->status_color }}-300">
                        {{ $order->status_label }}
                    </span>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-zinc-900 rounded-xl mb-6">
                    <div class="w-16 h-16 rounded-lg overflow-hidden bg-white dark:bg-zinc-800 flex-shrink-0">
                        @if($order->product?->main_image)
                            <img src="{{ asset('storage/' . $order->product->main_image) }}" alt="{{ $order->product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800 dark:text-white text-lg">{{ $order->product?->name ?? 'Produk dihapus' }}</h4>
                        <p class="text-sm text-emerald-600 font-semibold">Rp {{ number_format($order->product?->price ?? 0, 0, ',', '.') }} x {{ $order->quantity }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Total Bayar</p>
                        <p class="text-xl font-bold text-gray-800 dark:text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="font-medium text-gray-800 dark:text-white border-b border-gray-100 dark:border-zinc-700 pb-2">Catatan Pesanan</h4>
                    <p class="text-gray-600 dark:text-gray-300 italic">
                        {{ $order->notes ?: 'Tidak ada catatan khusus.' }}
                    </p>
                </div>
            </div>

            <!-- Customer Details -->
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700 p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Detail Pelanggan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Nama</p>
                        <p class="text-gray-800 dark:text-white font-medium">{{ $order->user?->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Nomor WhatsApp</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}" target="_blank" class="text-emerald-600 hover:underline flex items-center gap-2">
                            {{ $order->phone }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                        </a>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Alamat Pengiriman</p>
                        <p class="text-gray-800 dark:text-white font-medium leading-relaxed">
                            {{ $order->shipping_address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Status Update -->
        <div class="space-y-6">
            <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700 p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Update Status</h3>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status Pesanan</label>
                            <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-emerald-500">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Menunggu</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Diproses</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Diterima</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-medium">
                            Simpan Status
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-emerald-900 rounded-xl p-6 text-white">
                <h3 class="font-bold mb-2">Kontak Pelanggan</h3>
                <p class="text-emerald-100 text-sm mb-4">Segera hubungi pelanggan via WhatsApp untuk konfirmasi pengiriman dan pembayaran.</p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}?text=Halo%20{{ urlencode($order->user?->name) }},%20saya%20dari%20Genjah%20Rumah%20Bibit%20ingin%20mengonfirmasi%20pesanan%20Anda%20{{ urlencode($order->product?->name) }}." target="_blank" class="flex items-center justify-center gap-2 w-full px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors font-medium">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                    WhatsApp Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection
