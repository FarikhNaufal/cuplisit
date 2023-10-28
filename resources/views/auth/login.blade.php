@extends('auth.template')

@section('content')
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
        </h1>
        @if (session('success'))
            <div class="bg-green-300 w-full text-green-900 border-green-400 border-2 p-2 my-3 rounded-md">
                <p>{{session('success')}}</p>
            </div>
        @endif
        <div class="lg:w-[40rem] w-[20rem] h-[20rem] lg:h-[25rem] bg-secondry rounded-xl p-8">

            <form action="" method="POST" class="flex flex-col" enctype="multipart/form-data">
                @csrf
                <p class="text-white">Login Form</p>
                <input type="text"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email or Username" name="EmailOrUsername">
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
                    @error('password')
                        <label class="text-red-600">{{ $message }}</label>
                    @enderror
                </div>
<<<<<<< HEAD
                <div class="flex gap-1 mt-2 mb-5">
                    <input type="checkbox" name="rememberme" id="">
=======
                <div class="flex gap-1 mt-2 mb-6">
                    <input type="checkbox" name="" id="">
>>>>>>> 92265c1a0e51de96086564b3f4758ecb1fe02706
                    <span class="text-white text-xs">Remember me</span>
                    <a href="forgotPass" class="text-white text-xs ms-auto hover:underline hover:underline-offset-2">Forgot
                        password</a>
                </div>
                <button class="w-full py-4 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">LOGIN</button>
                <a href="register" class="mx-auto text-white text-sm hover:underline hover:underline-offset-2">I Don’t have
                    an account</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
@endsection
