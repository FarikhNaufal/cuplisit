@extends('auth.template')

@section('content')
    <div class="">
        <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
        </h1>

        @if (session('success'))
            <div class="bg-green-300 w-full text-green-900 border-green-400 border-2 p-2 my-3 rounded-md">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="lg:w-[40rem] w-[20rem] bg-secondry rounded-xl p-8">
            <form action="/forgot-password" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <p class="text-white">Forgot Password</p>
                <input type="email"
                    class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                    placeholder="Email" name="email">
                <span class="text-white text-xs my-3">Type your email and click SEND to reset your password</span>
                <button class="w-full py-4 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">SEND</button>
                <a href="register" class="mx-auto text-white text-sm hover:underline hover:underline-offset-2">I Don’t have
                    an account</a>
            </form>
        </div>
    </div>
@endsection
