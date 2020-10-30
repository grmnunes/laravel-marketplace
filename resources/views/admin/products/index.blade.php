@extends('layouts.app')

@section('content')
    <a href="{{route('products.create')}}" class="btn btn-lg btn-success m-3">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-secondary">EDITAR</a>
                        <form action="{{route('products.destroy', $product->id)}}" method="post" style="display: inline;">
                            @csrf()
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$products->links()}}
@endsection
