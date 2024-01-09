<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jockey+One&family=Jost:wght@100;800&family=Montserrat&display=swap');
    </style>
</head>
<body class="bg-slate-400 flex lg:px-0 px-20 overflow-hidden h-screen justify-center items-center"
style="font-family: 'Jockey One', sans-serif">
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">ADMIN<span class="text-primary">.IT</span>
        </h1>
        @if (session('success'))
            <div class="bg-green-300 w-full text-green-900 border-green-400 border-2 p-2 my-3 rounded-md">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="lg:w-[40rem] w-[20rem] bg-secondry rounded-xl p-8">

            <form action="{{ route('login-process') }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
                @csrf
                <p class="text-white">Login Form</p>
                <input type="text"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email or Username" name="EmailOrUsername" value="{{ old('EmailOrUsername') }}">
                @error('EmailOrUsername')
                    <label class="text-red-600">{{ $message }}</label>
                @enderror
                <div class="relative my-3">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                        <label
                            class="bg-primary opacity-60 hover:bg-gray-400 rounded px-2 py-1 text-xs text-white font-mono cursor-pointer js-password-label"
                            for="toggle">show</label>
                    </div>
                    <input type="password"
                        class="js-password placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                        id="password" placeholder="Password" name="password">
                </div>
                @error('password')
                    <label class="text-red-600">{{ $message }}</label>
                @enderror

                @if (session('loginerror'))
                    <label class="text-red-600">{{ session('loginerror') }}</label>
                @endif
                {{-- <div class="flex gap-1 mt-2 mb-5">
                    <input type="checkbox" name="rememberme" id="">
                    <span class="text-white text-xs">Remember me</span>
                    <a href="forgotPass" class="text-white text-xs ms-auto hover:underline hover:underline-offset-2">Forgot
                        password</a>
                </div> --}}
                <button class="w-full py-4 mt-2 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">LOGIN</button>
                
            </form>
        </div>
    </div>

    <script>
        const passwordToggle = document.querySelector('.js-password-toggle')

        passwordToggle.addEventListener('change', function() {
            const password = document.querySelector('.js-password'),
                passwordLabel = document.querySelector('.js-password-label')

            if (password.type === 'password') {
                password.type = 'text'
                passwordLabel.innerHTML = 'hide'
            } else {
                password.type = 'password'
                passwordLabel.innerHTML = 'show'
            }

            password.focus()
        });
    </script>
</body>
</html>