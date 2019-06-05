@extends('layouts.app')
@section('title','Dodaj produkt')
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
        <form method="POST" action="/products" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12 py-3">
                    <input type="text" name="title" class="{{ $errors->has('title') ? 'border border-danger ' : '' }}form-control" placeholder="Nazwa produktu" required value="{{ old('title') }}">
                </div>
                <div class="col-12 py-3">
                    <textarea class="{{ $errors->has('description') ? 'border border-danger ' : '' }}form-control" name="description" placeholder="Opis produktu" rows="10" required>{{ old('description') }}</textarea>
                </div>
                <div class="col-12 py-3">
                    <div class="custom-file">
                        <input type="file" class="{{ $errors->has('image') ? 'border border-danger ' : '' }}custom-file-input"  name="image" required>
                        <label class="custom-file-label" for="validatedCustomFile">Dodaj zdjęcie</label>
                        <span class="custom-file-control"></span>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <button type="submit" class="btn btn-primary">Dodaj produkt</button>
                </div>
            </div>
        </form>
    @endsection
