@extends('layouts.app')

@section('content')

    <form action="{{route('store.save')}}" method="post">

        @csrf

        <div class="form-group" >
            <label for="user">Selecione um usuário:</label>
            <select name="user" id="users" class="form-control">
            <option value="#">Selecione...</option>
            @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nome da Loja: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Telefone: </label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Celular/Whatsapp: </label>
            <input type="text" name="mobile_phone" id="mobile_phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar loja</button>
    </form>
@endsection


