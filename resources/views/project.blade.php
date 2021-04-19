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
            <div class="flex justify-between">
            <h1 class="text-xl mb-2">Projetos > {{ $project->name }}</h1>
            <a href='/'>Voltar</a>
            </div>
            <!-- Atalho para criar um projeto -->
            <div class="border p-2 rounded bg-white mb-4">
                <h2 class='text-lg'>Descrição do Projeto</h2>
                <p>
                    {{ $project->description }}
                </p>
            </div>

            <form action="/projects/{{ $project->id }}/tasks" method="post" class="border p-2 mb-4 rounded bg-white">
                <h2>Adicionar tarefa ao projeto</h2>
                @csrf
                <!-- @if(count($errors) > 0) -->
                {!! implode('', $errors->all('<div class="text-red-800">:message</div>')) !!}
                <!-- @endif -->
                <input type="text" value="{{ old('task') }}" name="task" placeholder="Tarefa" class="border rounded p-1 w-full mb-3">
                <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white p-2 rounded">Salvar</button>
            </form>

            <div class="border p-2 rounded bg-white">
                <h2 class='text-lg'>Tarefas Cadastradas ({{ $tasks->count() }})</h2>
                <ul class="list-inside">
                    @foreach($tasks as $task)
                    <li class="list-disc flex items-center mb-2">
                        <form action="/tasks/{{$task->id}}" class="h-6" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="status" value="{{ $task->done_at == null ? '1' : '0' }}">
                            <button type="submit" class="text-xs   px-1 focus:outline-none">
                            @if($task->done_at == null)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M5 2C3.346 2 2 3.346 2 5v14c0 1.654 1.346 3 3 3h14c1.654 0 3-1.346 3-3V5c0-1.654-1.346-3-3-3H5zm19 3v14a5 5 0 01-5 5H5a5 5 0 01-5-5V5a5 5 0 015-5h14a5 5 0 015 5z"/></svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M19 0H5a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5V5a5 5 0 00-5-5zm-8.959 17l-4.5-4.319 1.395-1.435 3.08 2.937L17.037 7l1.422 1.409L10.041 17z"/></svg>
                            @endif</button>
                        </form>
                        <span class="{{ $task->done_at != null ? 'line-through' : '' }}"> {{ $task->task  }} </span>
                        @if($task->done_at)
                        <span class="text-xs text-gray-600 inline-block ml-2"> Finalizada em {{ $task->done_at->format('d/m/Y H:i') }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
