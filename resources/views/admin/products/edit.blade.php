@extends('layouts.app')

@section('content')

<form action="{{route('products.update', $product->id)}}" method="post">

        @csrf
        @method("PUT")

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
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    </form>
@endsection


