@extends('layouts.app')

@section('content')

    <form action="{{route('store.update', $store->id)}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group" >
            <label for="user">Selecione um usuário:</label>
            <select name="user" id="users" class="form-control">
            <option value="#">Selecione...</option>
            @foreach($users as $user)
                @if($currentUser->id === $user->id)
                    <option value={{$user->id}} selected >{{$user->name}}</option>
                @else
                    <option value={{$user->id}} >{{$user->name}}</option>
                @endif
            @endforeach
            </select>
        </div>

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


