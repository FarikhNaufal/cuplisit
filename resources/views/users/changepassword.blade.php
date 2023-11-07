@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-3 h-auto lg:gap-6 gap-y-2">
        <div class="lg:hidden">
            @include('users.template')
        </div>
        {{-- isi --}}
        <div class="w-full h-[90vh] lg:col-span-2 p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
            <p class="lg:text-xl text-lg">Change Password</p>
            <div class="bg-green-300 px-2 rounded-md my-5 py-1">
                <p class="text-green-700">Succesfly change password</p>
            </div>
            <div class="flex gap-4 items-center mb-6">
                <img src="images/faiz.jpg" alt="" class="border-2 border-primary w-14 rounded-full">

                <div class="flex flex-col">
                    <p class="text-xl">Faiz Alil</p>
                </div>
            </div>
            <form action="" class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <label for="username" class="text-lg mr-5 my-auto">Old Password</label>
                    <input type="password" id="username" class="w-10/12 p-2 border-2 border-primary rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="name" class="text-lg mr-5 my-auto">New Password</label>
                    <input type="password" id="name" class="w-10/12 p-2 border-2 border-primary rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="name" class="text-base mr-5 my-auto">Confirm Password</label>
                    <input type="password" id="name" class="w-11/12 p-2 border-2 border-primary rounded-lg">
                </div>
                <button type="submit" class="bg-green-500 rounded-md px-5 w-fit py-2 text-white mt-2">Change Password</button>
            </form>
        </div>
        {{-- menu --}}
        <div class="">
            @include('users.template')
        </div>
        
    </div>
@endsection
