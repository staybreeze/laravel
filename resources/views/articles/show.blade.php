{{-- resources/views/articles/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <p>發布時間: {{ $article->formatted_time }}</p>
</div>
@endsection