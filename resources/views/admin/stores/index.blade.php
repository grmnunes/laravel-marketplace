@extends('layouts.app')

@section('content')
    <a href="{{route('store.create')}}" class="btn btn-lg btn-success m-3">Nova Loja</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('store.edit', $store->id)}}" class="btn btn-sm btn-secondary">EDITAR</a>
                        <a href="{{route('store.destroy', $store->id)}}" class="btn btn-sm btn-danger">REMOVER</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$stores->links()}}
@endsection
