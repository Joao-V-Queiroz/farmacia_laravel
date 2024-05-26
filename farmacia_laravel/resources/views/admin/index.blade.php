@extends('layouts.content')
@section('main-content')
    <section
        class="content mt-36 rounded-2xl border-2 border-solid border-gray-500 bg-white p-6" style="margin-right: 300px; margin-left: 500px;">
        <header class="flex flex-row items-end justify-end">
            <button class="rounded-md bg-blue-200 p-2 hover:bg-blue-400"><a
                    class="text-black" href="{{ route('user.create') }}">Novo
                    Usuário</a></button>
        </header>
        @if (session('success'))
            <div
                class="mr-4 mt-2 flex w-full flex-row rounded-sm bg-green-400 p-2 hover:bg-green-700 hover:text-white">
                <p>Usuário Criado com Sucesso</p>
            </div>
        @endif
        @if (session('error'))
            <div
                class="mr-4 mt-2 flex w-full flex-row rounded-sm bg-red-400 p-2 hover:bg-red-700 hover:text-white">
                <p>Erro ao criar usuário</p>
            </div>
        @endif
        @if (session('delete'))
            <div
                class="mr-4 mt-2 flex w-full flex-row rounded-sm bg-red-400 p-2 hover:bg-red-700 hover:text-white">
                <p>Usuário deletado</p>
            </div>
        @endif
        @if (session('edit'))
            <div
                class="mr-4 mt-2 flex w-full flex-row rounded-sm bg-green-400 p-2 hover:bg-green-700 hover:text-white">
                <p>Usuário atualizado</p>
            </div>
        @endif
        <div class="relative mt-4 overflow-x-auto">
            <table
                class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead
                    class="bg-blue-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3" scope="col">
                            #
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Name
                        </th>
                        <th class="px-6 py-3" scope="col">
                            E-mail
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Photo
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Action
                        </th>
                    </tr>
                <tbody>
                    <!-- Usar o forelse caso queira verificar se existe registro anteriormente -->
                    @foreach ($users as $user => $row)
                        <tr
                            class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $user + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $row->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->email }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ $row->photo }}" alt="photo">
                            </td>
                            <td class="flex flex-row space-x-4 px-6 py-4">
                                <button
                                    class="rounded-md bg-blue-200 px-4 py-2 hover:bg-blue-400">
                                    <a class="text-black"
                                        href="{{ route('user.edit', ['id' => $row->id]) }}">Edit</a>
                                </button>
                                <form action="{{ route('user.destroy', $row->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Voce deseja mesmo excluir este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-md bg-red-400 px-4 py-2 hover:bg-red-700 text-white"
                                        type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </section>
@endsection
