<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('posts.index') }}" class="text-xl font-bold text-blue-600">📚 Mijn Blog</a>
            <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">+ Nieuwe Post</a>
        </div>
    </nav>

    <main class="container mx-auto p-4 bg-white shadow rounded-xl">
        @yield('content')
    </main>
</body>
</html>
