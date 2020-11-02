@extends('layouts.app')

@section('content')

    <form action="{{route('categories.update', $category->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text" name="description" id="description" class="form-control" value="{{$category->description}}">
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar categoria</button>
    </form>
@endsection


