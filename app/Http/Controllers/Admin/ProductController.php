<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller {

    private $product;
    private $store;
    private $category;

    public function __construct(Product $product, Store $store, Category $category) {

        $this->middleware('product.belongsTo.user')->only(['edit', 'update']);

        $this->product = $product;
        $this->store = $store;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $categories = $this->category->all(['id', 'name']);

        return view('admin.products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {

        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->uploadImages($request, 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto cadastrado com sucesso!')->success();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productId) {

        $product = $this->product->findOrFail($productId);
        $categories = $this->category->all(['id', 'name']);


        return view('admin.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId) {

        $data = $request->all();
        $product = $this->product->find($productId);

        $product->update($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->uploadImages($request, 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto atualizado com sucesso!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId) {

        $product = $this->product->find($productId);

        $product->delete();

        flash('Produto removido com sucesso!');

        return redirect()->route('products.index');
    }

    private function uploadImages(Request $request, $imageColumn) {

        $images = $request->file('photos');
        $uploadedImages = [];

        foreach ($images as $image) {
            $uploadedImages[] = [$imageColumn => $image->store('products', 'public')];
        }

        return $uploadedImages;
    }
}
