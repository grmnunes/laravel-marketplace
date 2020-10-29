<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller {

    public function index() {

        $stores = Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    public function create() {

        $users = User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request) {

        $data = $request->all();
        $user = User::find($data['user']);

        $store = $user->store()->create($data);

        return $store;

    }

    public function edit($storeId) {

        $store = Store::find($storeId);
        $users = User::all();
        $currentUser = User::find($store->user_id);
        //dd($currentUser);

        return view('admin.stores.edit', compact(['store', 'users', 'currentUser']));
    }

    public function update(Request $request, $storeId) {

        $data = $request->all();
        $store = Store::find($storeId);

        $store->update($data);

        flash('Loja atualizada com sucesso')->success();

        return redirect()->route('store.index');
    }

    public function destroy($storeId) {

        $store = Store::find($storeId);
        $store->delete();

        flash('Loja removida com sucesso')->success();

        return redirect()->route('store.index');
    }
}
