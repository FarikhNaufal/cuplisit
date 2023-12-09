@extends('auth.template')

@section('content')
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
        </h1>

        <div class="lg:w-[40rem] w-[20rem] bg-secondry rounded-xl p-8">
            <form action="/register" method="POST" class="flex flex-col" enctype="multipart/form-data">
                @csrf

                <p class="text-white">Register Form</p>
                <input type="text"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <label class="text-red-600">{{ $message }}</label>
                @enderror
                <input type="email"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
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

                <div class="relative my-3">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden cjs-password-toggle" id="ctoggle" type="checkbox" />
                        <label
                            class="bg-primary opacity-60 hover:bg-gray-400 rounded px-2 py-1 text-xs text-white font-mono cursor-pointer cjs-password-label"
                            for="ctoggle">show</label>
                    </div>
                    <input type="password"
                        class="cjs-password placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                        id="cpassword" placeholder="Confirm Password" name="confirmPassword">
                </div>
                @error('confirmPassword')
                    <label class="text-red-600">{{ $message }}</label>
                @enderror

                <div class="flex items-center justify-between">
                    <div class="flex flex-col gap-y-2">
                        <input type="date" class="mt-3 mb-2 text-primary rounded-md px-2 py-1" name="dob"
                            value="{{ old('dob') }}">
                        @error('dob')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <select name="gender" class="text-primary px-2 py-1 rounded-md ">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="undefined">Undefined</option>
                        </select>
                        @error('gender')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-1 mt-2">
                    <input type="checkbox" name="rememberme" id="">
                    <span class="text-white text-xs">Remember me</span>
                </div>

                <div class="g-recaptcha flex mt-3 scale-75 md:scale-100 -ms-8 md:ms-0" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                </div>
                @error('g-recaptcha-response')
                    <label class="text-red-600">{{ $message }}</label>
                @enderror


                <button class="w-full py-4 text-white rounded-md bg-primary mt-7 mb-2 hover:bg-opacity-60">REGISTER
                    NOW</button>
                <a href="login" class="mx-auto text-white text-sm hover:underline hover:underline-offset-2">I already have
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
        const cpasswordToggle = document.querySelector('.cjs-password-toggle')

        cpasswordToggle.addEventListener('change', function() {
            const password = document.querySelector('.cjs-password'),
                passwordLabel = document.querySelector('.cjs-password-label')

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
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
