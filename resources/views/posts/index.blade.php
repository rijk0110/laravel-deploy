@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Alle Posts</h1>

<ul class="space-y-4">
    @foreach ($posts as $post)
    <li class="p-4 bg-gray-100 rounded-xl flex justify-between items-center">
        <div>
            <a href="{{ route('posts.show', $post) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                {{ $post->title }}
            </a>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 hover:underline">✏️ Bewerken</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit wil verwijderen?')">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">🗑️ Verwijder</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endsection
