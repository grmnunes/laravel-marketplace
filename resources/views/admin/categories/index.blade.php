@extends('layouts.app')

@section('content')

        <a href="{{route('categories.create')}}" class="btn btn-lg btn-success m-3">Nova categoria</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-secondary">EDITAR</a>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post" style="display: inline;">
                            @csrf()
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
