@extends('layouts.content')
@section('main-content')
    <div class="mx-auto mt-4 max-w-2xl bg-white p-10" id="cadastro">
        <form class="mt-2"
            method="post"
            action="@if (isset($edit->id)) {{ route('user.update', ['id' => $edit->id]) }} @else {{ route('user.store') }} @endif"
            enctype="multipart/form-data">
            @csrf
            @if (isset($edit->id))
                @method('PUT')
            @endif

            <div class="mb-4 w-full">
                <label class="block text-sm font-medium text-gray-700"
                    for="name">Nome</label>
                <input
                    class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="name"
                    name="name"
                    type="text"
                    value="@if (isset($edit->id)) {{ $edit->name }} @else {{ old('name') }} @endif"
                    placeholder="Digite seu nome">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 w-full">
                <label class="block text-sm font-medium text-gray-700"
                    for="email">E-mail</label>
                <input
                    class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="email"
                    name="email"
                    type="text"
                    value="@if (isset($edit->id)) {{ $edit->email }} @else {{ old('email') }} @endif"
                    placeholder="Digite seu e-mail">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 w-full">
                <label class="block text-sm font-medium text-gray-700"
                    for="photo">Foto</label>
                <input
                    class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-md file:border file:border-gray-300 file:px-4 file:py-2"
                    id="photo"
                    name="photo"
                    type="file"
                    accept=".png, .jpg, .jpeg"
                    onchange="previewImage(this)">
                @error('photo')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center justify-end space-x-4">
                <button
                    class="rounded-md bg-green-500 px-4 py-2 text-white hover:bg-green-700"
                    type="submit">Salvar</button>
                <a class="rounded-md bg-red-500 px-4 py-2 text-white hover:bg-red-700"
                    href="{{ route('user.index') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
@push('name')
    <script type="text/javascript">
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css('background-image', 'url(' + e.target
                        .result + ')');
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
