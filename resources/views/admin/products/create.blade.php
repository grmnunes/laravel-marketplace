@extends('layouts.app')

@section('content')

    <form action="{{route('products.store')}}" method="post">

        @csrf

        <div class="form-group" >
            <label for="user">Selecione uma categoria:</label>
            <select name="category" id="caategory" class="form-control">
            <option value="#">Selecione...</option>
            @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group" >
            <label for="store">Selecione uma Loja:</label>
            <select name="store" id="store" class="form-control">
            <option value="#">Selecione...</option>
            @foreach($stores as $store)
                <option value={{$store->id}}>{{$store->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nome do Produto: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Conteúdo: </label>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Preço: </label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>
@endsection


