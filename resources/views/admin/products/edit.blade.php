@extends('layouts.app')

@section('content')

<form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">

        @csrf
        @method("PUT")

        <div class="form-group">
        <label for="user">Selecione uma categoria:</label>
        <select name="categories[]" id="caategories" class="form-control" multiple>

            @foreach($categories as $category)
            <option value={{$category->id}} @if($product->categories->contains($category)) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>

        @error('category')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

        <div class="form-group">
            <label for="name">Nome do Produto: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text" name="description" id="description" class="form-control" value="{{$product->description}}">
        </div>
        <div class="form-group">
            <label for="name">Conteúdo: </label>
            <textarea name="body" id="body" cols="30" rows="10">{{$product->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Preço: </label>
            <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="photos">Fotos do produto:</label>
            <input type="file" name="photos[]" id="photos" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    </form>

    <hr>

    <div class="row">
        @foreach($product->photos as $photo)

            <div class="col-4 text-center">
                <img src="{{asset('storage/'. $photo->image)}}" class="img-fluid" alt="">
                <form action="{{route('photo.remove', substr($photo->image, 9))}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-danger" style="margin-top: 10px;">REMOVER</button>
                </form>
            </div>

        @endforeach
    </div>
@endsection


