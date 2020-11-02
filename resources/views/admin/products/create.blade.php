@extends('layouts.app')

@section('content')

<form action="{{route('products.store')}}" method="post">

    @csrf

    <div class="form-group">
        <label for="user">Selecione uma categoria:</label>
        <select name="categories[]" id="caategories" class="form-control" multiple>
            <option value="#">Selecione...</option>
            @foreach($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
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
        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"
            value="{{old('name')}}">

        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Descrição: </label>
        <input type="text" name="description" id="description"
            class="form-control  @error('description') is-invalid @enderror" value="{{old('description')}}">

        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Conteúdo: </label>
        <textarea name="body" id="body" cols="30" rows="10"> {{old('body')}}</textarea>

        @error('body')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Preço: </label>
        <input type="text" name="price" id="price" class="form-control  @error('price') is-invalid @enderror"
            value="{{old('price')}}">

        @error('price')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Slug: </label>
        <input type="text" name="slug" id="slug" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
</form>
@endsection
