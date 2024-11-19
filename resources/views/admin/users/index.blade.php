@extends('layouts.content')
@section('main-content')
    <section class="mx-auto mt-24 max-w-6xl rounded border border-gray-300 bg-white p-6 shadow-md">
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Gerenciar Usuários</h1>
            <button
                class="rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white shadow hover:bg-blue-600">
                <a href="{{ route('user.create') }}">Novo Usuário</a>
            </button>
        </header>

        <!-- Feedback -->
        @if (session('success'))
            <div class="mb-4 rounded bg-green-500 p-4 text-white">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500">
                <thead class="bg-blue-500 text-xs uppercase text-white">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">E-mail</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user => $row)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $user + 1 }}</td>
                            <td class="px-4 py-3">{{ $row->name }}</td>
                            <td class="px-4 py-3">{{ $row->email }}</td>
                            <td class="px-4 py-3">
                                <img class="h-10 w-10 rounded-full" src="{{ $row->photo }}" alt="Foto">
                            </td>
                            <td class="flex space-x-2 px-4 py-3">
                                <a href="{{ route('user.edit', $row->id) }}"
                                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Editar</a>
                                <form action="{{ route('user.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este usuário?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
