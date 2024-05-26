<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="bg-blue-200">
    <div class="mt-80 flex items-center justify-center rounded-2xl border-2 border-solid border-gray-500 bg-white pb-16 pt-2"
        style="margin-right: 700px; margin-left: 700px;">
        <div class="mt-2 flex flex-col items-center justify-center space-y-6">
            <h1 class="text-xl font-bold">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col items-center space-y-2">
                    <label for="email">E-mail</label>
                    <input
                        class="rounded-md border-2 border-solid border-gray-500"
                        id="email"
                        name="email"
                        type="email"
                        required>
                    <label for="password">Senha</label>
                    <input
                        class="rounded-md border-2 border-solid border-gray-500"
                        id="password"
                        name="password"
                        type="password"
                        required>
                    <button class="rounded-md bg-blue-200 p-2 hover:bg-blue-400"
                        type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
