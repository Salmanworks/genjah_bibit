@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
    <div class="mb-8 animate-fade-up">
        <a href="{{ route('admin.orders.index') }}" class="group admin-back-link">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Antrean Pesanan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Info -->
        <div class="lg:col-span-2 space-y-8">
            <div class="glass-card rounded-3xl p-8 animate-fade-up">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h3 class="text-2xl font-extrabold text-white tracking-tight">Invoice #{{ $order->id }}</h3>
                        <p class="text-sm text-lime-100/40">Diterima pada {{ $order->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400 border border-{{ $order->status_color }}-500/20">
                        {{ $order->status_label }}
                    </span>
                </div>

                <div class="flex items-center gap-6 p-6 bg-white/5 rounded-3xl border border-white/5 mb-8">
                    <div class="w-24 h-24 rounded-2xl overflow-hidden bg-white/10 flex-shrink-0 shadow-2xl">
                        @if($order->product?->main_image)
                            <img src="{{ asset('storage/' . $order->product->main_image) }}" alt="{{ $order->product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-white/20">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="text-[10px] font-bold text-lime-400 uppercase tracking-widest mb-1">Produk Dipesan</div>
                        <h4 class="font-bold text-white text-xl mb-1">{{ $order->product?->name ?? 'Produk dihapus' }}</h4>
                        <p class="text-sm text-lime-100/40 font-medium">Rp {{ number_format($order->product?->price ?? 0, 0, ',', '.') }} <span class="mx-2">×</span> {{ $order->quantity }} Item</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-lime-100/20 uppercase tracking-widest mb-1">Total Transaksi</p>
                        <p class="text-2xl font-black text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-2 text-xs font-bold text-lime-100/20 uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                        Catatan Khusus Pelanggan
                    </div>
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5 italic text-lime-100/60 leading-relaxed">
                        "{{ $order->notes ?: 'Tidak ada catatan tambahan untuk pesanan ini.' }}"
                    </div>
                </div>
            </div>

            <!-- Customer Details -->
            <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.1s">
                <h3 class="text-lg font-bold text-white mb-8 flex items-center gap-2">
                    <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Informasi Pengiriman
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-[10px] font-bold text-lime-100/20 uppercase tracking-widest mb-2">Nama Penerima</p>
                        <p class="text-white font-bold text-lg">{{ $order->user?->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-lime-100/20 uppercase tracking-widest mb-2">Kontak WhatsApp</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}" target="_blank" class="text-lime-400 hover:text-lime-300 font-bold text-lg flex items-center gap-2 transition-colors">
                            {{ $order->phone }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                        </a>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-[10px] font-bold text-lime-100/20 uppercase tracking-widest mb-2">Alamat Pengiriman Lengkap</p>
                        <p class="text-white font-medium leading-relaxed bg-white/5 p-6 rounded-2xl border border-white/5">
                            {{ $order->shipping_address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-8">
            <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.2s">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Manajemen Status
                </h3>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div>
                            <select name="status" class="admin-input w-full px-6 py-3 rounded-2xl">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Telah Dikirim</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Pesanan Selesai</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit" class="admin-action-btn w-full py-4 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gradient-to-br from-lime-600 to-lime-800 rounded-3xl p-8 text-white shadow-2xl shadow-lime-500/20 animate-fade-up" style="animation-delay: 0.3s">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                </div>
                <h3 class="text-xl font-black mb-2">Konfirmasi Pesanan</h3>
                <p class="text-lime-100/60 text-sm mb-6 leading-relaxed">Pilih cara mengirim pesan ke pelanggan:</p>
                
                <!-- WhatsApp Web Button -->
                <button onclick="openWhatsAppWeb()" class="flex items-center justify-center gap-3 w-full py-4 bg-white text-lime-600 rounded-2xl hover:bg-lime-50 transition-all font-black shadow-xl mb-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                    WhatsApp Web (Browser)
                </button>

                <!-- WhatsApp Desktop/Mobile Button -->
                <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]/', '', $order->phone) }}&text={{ urlencode("Halo Kak " . $order->user?->name . ",\n\nSaya dari *Genjah Rumah Bibit* ingin mengonfirmasi pesanan Anda:\n\n*Produk:* " . $order->product?->name . "\n*Jumlah:* " . $order->quantity . " pcs\n*Total:* Rp " . number_format($order->total_price, 0, ',', '.') . "\n\nMohon konfirmasi alamat pengiriman dan metode pembayaran Anda.\n\nTerima kasih! 🌱") }}" target="_blank" class="flex items-center justify-center gap-3 w-full py-4 bg-lime-500 text-white rounded-2xl hover:bg-lime-600 transition-all font-bold shadow-xl mb-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.222-4.032c1.504.893 3.12 1.362 4.776 1.363 5.31 0 9.632-4.321 9.635-9.632.001-2.572-1.001-4.991-2.823-6.813-1.822-1.823-4.242-2.826-6.815-2.827-5.311 0-9.632 4.322-9.635 9.634-.001 1.765.483 3.484 1.397 4.999l-1.066 3.891 3.991-1.047zm11.377-7.462c-.312-.156-1.848-.912-2.134-1.017-.286-.105-.494-.156-.703.156-.208.312-.806 1.017-1.008 1.24-.201.222-.403.251-.715.095-.312-.156-1.318-.485-2.51-1.548-.928-.827-1.553-1.849-1.735-2.161-.182-.312-.019-.481.137-.636.141-.14.312-.364.468-.546.156-.182.208-.312.312-.52.104-.208.052-.39-.026-.546-.078-.156-.703-1.693-.962-2.316-.252-.605-.51-.523-.703-.533-.182-.008-.39-.01-.598-.01s-.546.078-.832.39c-.286.312-1.092 1.067-1.092 2.6s1.118 3.017 1.274 3.225c.156.208 2.201 3.361 5.332 4.712.745.321 1.326.512 1.778.656.748.238 1.429.205 1.967.125.6-.089 1.848-.755 2.107-1.484.259-.729.259-1.354.182-1.484-.077-.13-.285-.208-.597-.364z"/></svg>
                    WhatsApp Desktop/Mobile
                </a>

                <!-- Copy Message Button -->
                <button onclick="copyMessage()" class="flex items-center justify-center gap-3 w-full py-3 bg-white/20 text-white rounded-2xl hover:bg-white/30 transition-all font-bold border-2 border-white/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    Copy Pesan
                </button>

                <!-- Hidden textarea for copy -->
                <textarea id="waMessage" style="position: absolute; left: -9999px;">Halo Kak {{ $order->user?->name }},

Saya dari *Genjah Rumah Bibit* ingin mengonfirmasi pesanan Anda:

*Produk:* {{ $order->product?->name }}
*Jumlah:* {{ $order->quantity }} pcs
*Total:* Rp {{ number_format($order->total_price, 0, ',', '.') }}

Mohon konfirmasi alamat pengiriman dan metode pembayaran Anda.

Terima kasih! 🌱</textarea>

                <script>
                function openWhatsAppWeb() {
                    const phone = '{{ preg_replace('/[^0-9]/', '', $order->phone) }}';
                    const message = `Halo Kak {{ $order->user?->name }},

Saya dari *Genjah Rumah Bibit* ingin mengonfirmasi pesanan Anda:

*Produk:* {{ $order->product?->name }}
*Jumlah:* {{ $order->quantity }} pcs
*Total:* Rp {{ number_format($order->total_price, 0, ',', '.') }}

Mohon konfirmasi alamat pengiriman dan metode pembayaran Anda.

Terima kasih! 🌱`;

                    // Encode message for URL
                    const encodedMessage = encodeURIComponent(message);
                    
                    // Force open in browser (not WhatsApp Desktop)
                    const url = `https://web.whatsapp.com/send?phone=${phone}&text=${encodedMessage}`;
                    
                    // Open in new window
                    window.open(url, '_blank', 'width=1000,height=800');
                }

                function copyMessage() {
                    const textarea = document.getElementById('waMessage');
                    textarea.select();
                    document.execCommand('copy');
                    
                    // Show notification
                    const btn = event.target.closest('button');
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Tersalin!';
                    btn.classList.add('bg-white/40');
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.classList.remove('bg-white/40');
                    }, 2000);
                }
                </script>
            </div>
        </div>
    </div>
@endsection
