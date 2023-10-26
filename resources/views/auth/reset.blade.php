@extends('auth.template')

@section('content')
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
        </h1>

        <div class="lg:w-[40rem] w-[20rem] bg-secondry rounded-xl p-8">
            <form action="/reset-password" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <p class="text-white">Reset your Password</p>
                <input type="email"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email" name="email">
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
                        id="password" placeholder="New Password" name="password">
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

                <button class="w-full py-4 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">RESET</button>
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
@endsection
