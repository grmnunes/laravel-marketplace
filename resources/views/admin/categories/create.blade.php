@extends('layouts.app')

@section('content')

    <form action="{{route('categories.store')}}" method="post">

        @csrf

        <div class="form-group">
            <label for="name">Nome: </label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{old('name')}}"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Descrição: </label>
            <input type="text"
                   name="description"
                   id="description"
                   class="form-control @error('description') is-invalid @enderror"
                   value="{{old('description')}}"
            >

            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar categoria</button>
    </form>
@endsection


