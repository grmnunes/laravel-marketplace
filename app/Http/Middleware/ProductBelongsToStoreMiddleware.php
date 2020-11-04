<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;

class ProductBelongsToStoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $userStore = auth()->user()->store->id;
        $productId = $request->route('product');
        $product = Product::findOrFail($productId);

        if($product->store_id !== $userStore) {

            flash('Você não pode realizar essa operação!')->warning();

            return redirect()->route('products.index');
        }
        return $next($request);
    }
}
