@extends('layouts.main')

@section('title', 'Recipes')

@section('content')
    <h1>Create a new recipe</h1>

    <form method="POST" action="/recipes">
        {{ csrf_field() }}
        <div>
            <label for="projectTitle"></label>
            <input type="text" name="title" id="projectTitle">
        </div>
        <div>
            <label for="projectDescription"></label>
            <textarea name="description" id="projectDescription"></textarea>
        </div>
        <div>
            <button type="submit">Create recipe</button>
        </div>
    </form>

@endsection