@extends('layouts.app')
@section('title','Edytuj produkt')
    @section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data"> 
            @method('PATCH')
            @csrf
            <label>Tutaj mozesz edytować swój produkt {{ Auth::user()->name }}</label>
            <div class="row">
                <div class="col-12 py-3">
                    <input type="text" name="title" class="{{ $errors->has('title') ? 'border border-danger ' : '' }}form-control" placeholder="Nazwa produktu" required value="{{ $product->title }}">
                </div>
                <div class="col-12 py-3">
                    <textarea class="{{ $errors->has('description') ? 'border border-danger ' : '' }}form-control" name="description" placeholder="Opis produktu" rows="10" required >{{ $product->description }}</textarea>
                </div>
                <div class="col-12 py-3">
                    <div class="custom-file">
                        <input type="file" class="{{ $errors->has('image') ? 'border border-danger ' : '' }}custom-file-input"  name="image" required value="{{ $product->image }}">
                        <label class="custom-file-label" for="validatedCustomFile">Dodaj zdjęcie</label>
                    </div>
                </div>
                <div class="col py-3">
                    <button type="submit" class="btn btn-primary">Edytuj produkt</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-6">
                <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data"> 
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Usuń produkt</button>
                </form>
        </div>
        </div>

    @endsection
