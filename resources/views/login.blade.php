<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="flex min-h-screen items-center justify-center bg-blue-200">
    <div class="w-full max-w-md rounded-sm border border-gray-300 bg-white p-8 shadow-md">
        <div class="flex flex-col items-center space-y-6">
            <h1 class="text-2xl font-bold text-gray-700">Bem-vindo(a)</h1>
            <p class="text-gray-600">Entre com suas credenciais para continuar</p>
            <form action="{{ route('login') }}" method="POST" class="w-full space-y-4">
                @csrf
                <!-- Campo de E-mail -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        class="mt-1 w-full rounded-md border border-gray-300 p-2 text-gray-700 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        placeholder="Digite seu e-mail">
                </div>

                <!-- Campo de Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="mt-1 w-full rounded-md border border-gray-300 p-2 text-gray-700 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        placeholder="Digite sua senha">
                </div>

                <!-- Botão de Login -->
                <button
                    type="submit"
                    class="w-full rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Entrar
                </button>
            </form>

            <!-- Link para recuperação de senha -->
            <div class="text-center text-sm text-gray-500">
                <a href="#" class="text-blue-500 hover:underline">Esqueceu sua senha?</a>
            </div>
        </div>
    </div>
</body>

</html>
