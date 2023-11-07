@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-3 h-auto lg:gap-6 gap-y-2">
        <div class="lg:hidden">
            @include('users.template')
        </div>
        {{-- isi --}}
        <div class="w-full h-[90vh] lg:col-span-2 p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
            <p class="lg:text-xl text-lg">Edit Profile</p>
            <div class="bg-green-300 px-2 rounded-md my-5 py-1">
                <p class="text-green-700">Succesfly edit</p>
            </div>
            <div class="flex gap-4 items-center mb-6">
                <img src="images/faiz.jpg" alt="" class="border-2 border-primary w-14 rounded-full">

                <div class="flex flex-col">
                    <p class="" class="text-lg">Faiz Alil</p>
                    <a href="" class="text-primary font-thin hover:text-opacity-70">Change Photo</a>
                </div>
            </div>
            <form action="" class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <label for="username" class="text-lg mr-5 my-auto">Username</label>
                    <input type="text" id="username" class="lg:w-10/12 w-3/4 p-2 border-2 border-primary rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="name" class="text-lg mr-5 my-auto">Name</label>
                    <input type="text" id="name" class="lg:w-10/12 w-3/4 p-2 border-2 border-primary rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="bio" class="text-lg mr-5 my-auto">Bio </label>
                    <textarea name="" id="bio" cols="30" rows="6" class="lg:w-10/12 w-3/4 p-2 border-2 border-primary rounded-lg"></textarea>
                </div>
                <div class="flex justify-between">
                    <label for="email" class="text-lg mr-5 my-auto">Email</label>
                    <input type="email" id="email" disabled class="lg:w-10/12 w-3/4 p-2 border-2 rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="phone" class="text-base mr-5 my-auto">Phone Number</label>
                    <input type="number" id="phone" class="lg:w-10/12 w-3/4 p-2 border-2 border-primary rounded-lg">
                </div>
                <div class="flex justify-between">
                    <label for="email" class="text-lg mr-5 my-auto">Gender</label>
                    <div class="flex flex-col lg:w-10/12 w-3/4 border-2 rounded-md border-primary">
                        <select name="gender" class="text-primary px-2 py-1 rounded-md">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="female">Undefined</option>
                        </select>
                        <label class="text-red-600"></label>
                        
                    </div>
                </div>
                <button type="submit" class="bg-green-500 rounded-md px-5 w-fit py-2 text-white mt-2">Save</button>
            </form>
        </div>
        {{-- menu --}}
        <div class="hidden lg:block">
            @include('users.template')
        </div>
        
    </div>
@endsection
