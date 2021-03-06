@extends('layouts.app')

@section('content')

    <form action="{{route('store.save')}}" method="post">

        @csrf

        <div class="form-group">
            <label for="name">Nome da Loja: </label>
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
            <label for="name">Telefone: </label>
            <input type="text"
                   name="phone"
                   id="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{old('phone')}}"
            >

            @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Celular/Whatsapp: </label>
            <input type="text"
                   name="mobile_phone"
                   id="mobile_phone"
                   class="form-control @error('mobile_phone') is-invalid @enderror"
                   value="{{old('mobile_phone')}}"
            >

            @error('mobile_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Slug: </label>
            <input type="text" name="slug" id="slug" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar loja</button>
    </form>
@endsection


