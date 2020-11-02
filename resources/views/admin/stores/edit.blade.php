@extends('layouts.app')

@section('content')

    <form action="{{route('store.update', $store->id)}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label for="name">Nome da Loja: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{$store->name}}">
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text" name="description" id="description" class="form-control" value="{{$store->description}}">
        </div>
        <div class="form-group">
            <label for="name">Telefone: </label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{$store->phone}}">
        </div>
        <div class="form-group">
            <label for="name">Celular/Whatsapp: </label>
            <input type="text" name="mobile_phone" id="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$store->slug}}">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar loja</button>
    </form>
@endsection


