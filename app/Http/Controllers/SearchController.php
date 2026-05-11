<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if (empty($query) || strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Query terlalu pendek',
                'products' => []
            ]);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->with(['category', 'images'])
            ->take(8)
            ->get()
            ->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'formatted_price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                    'category' => $product->category->name ?? 'Uncategorized',
                    'image' => $product->images->first()?->image_url ?? asset('images/placeholder.png'),
                    'url' => route('products.show', $product->slug),
                    'stock' => $product->stock,
                    'in_stock' => $product->stock > 0,
                ];
            });

        return response()->json([
            'success' => true,
            'count' => $products->count(),
            'products' => $products
        ]);
    }
}
