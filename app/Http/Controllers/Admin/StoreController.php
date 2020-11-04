<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller {

    public function __construct() {

        $this->middleware('user.has.store')->only(['create', 'store']);
        $this->middleware('user.is.owner.store')->only(['edit', 'update']);

    }

    public function index() {

        $store = auth()->user()->store;
        return view('admin.stores.index', compact('store'));
    }

    public function create() {

        if(auth()->user()->store) {

            return redirect('admin/stores');
        }

        $users = User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request) {

        $data = $request->all();
        $user = auth()->user();
        $store = $user->store()->create($data);

        flash('Loja criada com sucesso!');

        return redirect()->route('store.index');

    }

    public function edit($storeId) {

        $store = Store::find($storeId);
        $users = User::all();
        $currentUser = User::find($store->user_id);
        //dd($currentUser);

        return view('admin.stores.edit', compact(['store', 'users', 'currentUser']));
    }

    public function update(StoreRequest $request, $storeId) {

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
