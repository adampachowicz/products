@extends('layouts.app')
@section('title','Produkty')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row py-6 bg-white min_height">
                <div class="col-12 pt-5">
                    <h1>{{ $product->title }}</h1>
                    <hr class="my-4">
                </div>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid pb-3" src="{{url('storage/uploads/'.$product->image)}}" alt="{{ $product->image }}">
                    <div class="row pl-3">

                            <button type="button" class="btn btn-light mr-4"><a href="/products/{{ $product->id}}/edit">Edytuj</a></button>
                       
                       
                            <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data"> 
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Usuń produkt</button>
                            </form>
                       
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <p class="lead">dodano: {{$product->created_at}} przez: {{ $product->user->name}}</p>
                    {{ $product->description }}
                </div>
                <div class="col-12 py-5">
                    <div class="col-12 py-3">
                        <h2>Dodaj nowy komentarz</h2>
                        <hr class="my-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="col-12 py-3">
                            <input type="text" name="comment_title" class="form-control" placeholder="Tytuł komentarza" required>
                        </div>
                        <div class="col-12 py-3">
                            <textarea class="form-control" name="comment_description" placeholder="Dodaj komentarz" rows="10" required></textarea>
                        </div>
                        <div class="col-12 py-3">
                            <button type="submit" class="btn btn-primary">Dodaj komentarz</button>
                        </div>
                    </form>
                    @if ($product->comments->count())
                        <div class="col-12 py-5">
                            <h2>Komentarze</h2>
                            <hr class="my-4">
                            @foreach($product->comments as $comment)
                            <div class="jumbotron">
                                <h4>{{ $comment->title }}</h4>
                                <p class="lead">dodano: {{$comment->created_at}} przez: {{ $comment->user->name}}</p>
                                <hr class="my-4">
                                <p>{{ $comment->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    @endif      
                </div>
                            
            </div>
        </div>    
    </div>
@endsection