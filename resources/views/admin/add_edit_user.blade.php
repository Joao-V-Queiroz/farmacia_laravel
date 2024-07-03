@extends('layouts.content')
@section('main-content')
    <section class="content">
        <header
            class="content mt-2 flex w-full flex-row items-center justify-center p-10 pb-8">
            <h1 class="text-2xl font-bold">{{ $title }}</h1>
        </header>
    </section>
    <section class="mt-10 bg-white p-10" style="margin-right: 300px; margin-left: 450px;" id="cadastro">
        <article class="flex flex-row items-start justify-start" id="formulario">
            <header>
                <h2 class="text-md font-bold">Dados para cadastro</h2>
            </header>
        </article>
        <!-- formulário para cadastro -->
        <form class="mt-8"
            method="post"
            action="@if (isset($edit->id)) {{ route('user.update', ['id' => $edit->id]) }}@else{{ route('user.store') }} @endif"
            enctype="multipart/form-data">
            <!-- user o multipart/form-data, quando quiser fazer upload de arquivos -->
            @csrf <!-- diretiva do blade para proteção de formulários -->
            <div
                class="flex flex-col items-start justify-start space-x-2 space-y-2">
                <label for="">Nome</label>
                <input id="name"
                    name="name"
                    type="text"
                    value="@if (isset($edit->id)) {{ $edit->name }}@else {{ old('name') }} @endif"
                    placeholder="Digite seu nome">
                <div>
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <label for="">E-mail</label>
                <input id="email"
                    name="email"
                    type="text"
                    value="@if (isset($edit->id)) {{ $edit->email }}@else {{ old('email') }} @endif"
                    placeholder="Digite seu e-mail">
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <label for="">Foto</label>
                <input id="photo"
                    name="photo"
                    type="file"
                    accept=".png, .jpg, .jpeg"
                    onchange="previewImage(this)">
                @error('photo')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 space-x-4">
                @if (isset($edit->id))
                    @method('PUT')
                    @csrf
                    <form action="{{ route('user.update', $edit->id) }}"
                        method="PUT">
                        <input
                            class="rounded-md bg-blue-200 px-4 py-2 hover:bg-blue-400"
                            type="submit" value="Submit">
                    </form>
                @else
                    <input
                        class="rounded-md bg-green-500 px-4 py-2 hover:bg-green-700"
                        type="submit" value="Submit">
                @endif
                <a class="rounded-md bg-red-500 px-4 py-2 hover:bg-red-700"
                    href="{{ route('user.index') }}">Cancel</a>
            </div>
        </form>
    </section>
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
