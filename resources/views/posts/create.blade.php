@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Nieuwe Post</h1>

<form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="title" class="block font-semibold">Titel:</label>
        <input type="text" name="title" id="title" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div>
        <label for="body" class="block font-semibold">Body:</label>
        <textarea name="body" id="body" required class="w-full p-2 border border-gray-300 rounded" rows="6"></textarea>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
</form>

<a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">← Terug</a>
@endsection
