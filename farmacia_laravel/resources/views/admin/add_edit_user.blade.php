@extends('layouts.content')
@section('main-content')
    <section class="content">
        <header
            class="content flex w-full flex-row items-center justify-center bg-white p-10 pb-8">
            <h1 class="text-2xl font-bold">{{ $title }}</h1>
        </header>
    </section>
    <section class="mt-10 w-full bg-white p-10" id="cadastro">
        <article class="flex flex-row items-start justify-start" id="formulario">
            <header>
                <h2 class="text-md font-bold">Dados para cadastro</h2>
            </header>
        </article>
        <!-- formulário para cadastro -->
        <form class="mt-8"
            method="post"
            action=""
            enctype="multipart/form-data">
            <!-- user o multipart/form-data, quando quiser fazer upload de arquivos -->
            @csrf <!-- diretiva do blade para proteção de formulários -->
            <div class="flex flex-row items-start justify-start space-x-2">
                <label for="">Nome</label>
                <input id="name"
                    name="name"
                    type="text"
                    value=""
                    placeholder="Digite seu nome">
                <label for="">E-mail</label>
                <input id="email"
                    name="email"
                    type="text"
                    value=""
                    placeholder="Digite seu e-mail">
                <label for="">Foto</label>
                <input id="photo"
                    name="photo"
                    type="file"
                    accept=".png, .jpg, .jpeg"
                    onchange="previewImage(this)">
            </div>
            <div class="mt-4 space-x-4">
                <input class="rounded-md bg-blue-200 px-4 py-2 hover:bg-blue-400"
                    type="submit" value="Submit">
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
