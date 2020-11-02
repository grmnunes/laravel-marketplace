@extends('layouts.app')

@section('content')
    @if(!$store)
        <a href="{{route('store.create')}}" class="btn btn-lg btn-success m-3">Nova Loja</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('store.edit', $store->id)}}" class="btn btn-sm btn-secondary">EDITAR</a>
                        <a href="{{route('store.destroy', $store->id)}}" class="btn btn-sm btn-danger">REMOVER</a>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection
