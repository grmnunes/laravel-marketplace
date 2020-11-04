<?php

namespace App\Http\Middleware;

use Closure;

class UserIsOwnerStore
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
        $storeId = $request->route('store');

        if($userStore != $storeId) {

            flash('Você não pode realizar essa operação!')->warning();

            return redirect()->route('store.index');
        }
        return $next($request);
    }
}
