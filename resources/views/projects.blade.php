<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased bg-gray-200" >
        <div class="my-4 max-w-2xl mx-auto p-2 rounded">
            <h1 class="text-xl mb-2">Projetos</h1>
            <!-- Atalho para criar um projeto -->
            <form action="/projects" method="post" class="border p-2 mb-4 rounded bg-white">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="border rounded p-1 w-full mb-3">
                <textarea name="description" placeholder="Descrição" class="border rounded p-1 w-full mb-3"></textarea>
                <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white p-2 rounded">Salvar</button>
            </form>
            <!-- Lista de Projetos -->
            <div class="border p-2 rounded bg-white">
                <h2 class='text-lg'>Projetos Cadastrados</h2>
                <ul class="list-inside">
                    @foreach($projects as $project)
                    <li class="list-disc">
                        <a class="text-blue-800 hover:underline" href='/projects/{{ $project->id }}'>{{ $project->name }} ({{ $project->tasks->count() }})</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
