@extends('auth.template')

@section('content')
<div class="">
    <h1 class="text-3xl lg:text-5xl font-bold text-secondry text-center mb-14">CUPLIS<span class="text-primary">.IT</span>
    </h1>
    <div class="lg:w-[40rem] w-[20rem] h-[17rem] lg:h-[18rem] bg-secondry rounded-xl p-8">
        <form action="" class="flex flex-col">
            <p class="text-white">Forgot Password</p>
            <input type="email"
                class="mt-3 mb-2 placeholder:text-opacity-60 placeholder:text-primary rounded-md w-full px-2 py-1"
                placeholder="Email">
            <span class="text-white text-xs mt-3 mb-8">Type your email and click SEND to reset your password</span>
            <button class="w-full py-4 text-white rounded-md bg-primary mb-2 hover:bg-opacity-60">SEND</button>
            <a href="register" class="mx-auto text-white text-sm hover:underline hover:underline-offset-2">I Don’t have an account</a>
        </form>
    </div>
</div>
@endsection