@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

<p class="mb-6">{{ $post->body }}</p>

<a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">✏️ Bewerken</a>
<a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">← Terug naar lijst</a>
@endsection
