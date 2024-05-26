@extends('layouts.content')
@section('main-content')
    <section
        class="content ml-10 mr-10 mt-36 rounded-2xl border-2 border-solid border-gray-500 bg-white p-4 pb-6">
        <header class="flex flex-row items-end justify-end">
            <button class="rounded-md bg-blue-200 p-2 hover:bg-blue-400"><a
                    class="text-black" href="{{route('user.create')}}">Novo Usuário</a></button>
        </header>
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
                    @forelse ($users as $user)
                        <tr
                            class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                scope="row">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ $user->photo }}" alt="photo">
                            </td>
                            <td class="space-x-4 px-6 py-4">
                                <button
                                    class="rounded-md bg-blue-200 px-4 py-2 hover:bg-blue-400"><a href="" class="text-black">Edit</a></button>
                                <button
                                    class="rounded-md bg-red-500 px-4 py-2 hover:bg-red-700"><a href="" class="text-black">Delete</a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
                {{-- <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                    </tr>
                </tbody> --}}
            </table>
        </div>

    </section>
@endsection
