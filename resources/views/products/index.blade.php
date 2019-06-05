@extends('layouts.app')
@section('title','Produkty')
@section('content')
    <div class="row">
        <div class="col-12 py-5">
            <h1>Wszystkie produkty</h1>
        </div>
        @foreach ($products as $product)
                <div class="col-12 col-lg-4 pb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{url('storage/uploads/'.$product->image)}}" alt="{{ $product->image }}">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/products/{{ $product->id }}">{{ $product->title }}</a></h5>
                            <p class="card-text">{{ str_limit($product->description, 150 ) }}</p>
                        </div>
                        <div class="row pb-1 p-4">
                            <button type="button" class="btn btn-light mr-4"><a href="/products/{{ $product->id}}/edit">Edytuj</a></button>
                            <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data"> 
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Usuń produkt</button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection