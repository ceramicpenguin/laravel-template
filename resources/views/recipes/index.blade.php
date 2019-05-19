@extends('layouts.main')

@section('title', 'Recipes')

@section('content')
    <h1>Recipes index</h1>

    <ul>
        @foreach($recipes as $recipe)
            <li>{{ $recipe->title }}</li>
        @endforeach
    </ul>

@endsection