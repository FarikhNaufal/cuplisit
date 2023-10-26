@extends('auth.template')

@section('content')
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
        </h1>
        <div class="lg:w-[40rem] w-[20rem] h-[27rem] lg:h-[25rem] bg-secondry rounded-xl p-8">
            <form action="" class="flex flex-col">
                <p class="text-white">Register Form</p>
                <input type="text"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="User Name">
                <input type="email"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email">
                <div class="relative my-3">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                        <label
                            class="bg-primary opacity-60 hover:bg-gray-400 rounded px-2 py-1 text-xs text-white font-mono cursor-pointer js-password-label"
                            for="toggle">show</label>
                    </div>
                    <input type="password"
                        class="js-password placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                        id="password" placeholder="Password">
                </div>
                <div class="flex items-center justify-between">
                    <input type="date"
                        class="mt-3 mb-2 text-primary rounded-md px-2 py-1"
                        placeholder="Email">
                    <select name="cars" class="text-primary px-2 py-1 rounded-md" id="cars">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="flex gap-1 mt-2 mb-5">
                    <input type="checkbox" name="" id="">
                    <span class="text-white text-xs">Remember me</span>
                </div>
                <button class="w-full py-4 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">LOGIN</button>
                <a href="login" class="mx-auto text-white text-sm hover:underline hover:underline-offset-2">I already have an account</a>
            </form>
        </div>
    </div>
@endsection
