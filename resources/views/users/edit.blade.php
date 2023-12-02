@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-3 h-auto lg:gap-6 gap-y-2">
        <div class="lg:hidden">
            @include('users.template')
        </div>
        {{-- isi --}}
        <div class="w-full h-[90vh] lg:col-span-2 p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
            <p class="lg:text-xl text-lg">Edit Profile</p>
            @if (session('success'))
                <div class="bg-green-400 px-2 rounded-md my-5 py-1">
                    <p class="text-green-800 p-2">{{ session('success') }}</p>
                </div>
            @endif
            <form action="{{ route('users.update', $user->username) }}" class="flex flex-col gap-4" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="flex gap-4 items-center">
                    <img id="avatar-preview"
                        src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                        alt="" class="border-2 border-primary w-14 my-3 rounded-full aspect-square object-cover">

                    <div class="flex flex-col">
                        <p class="text-lg">{{ $user->username }}</p>

                        <input type="file" id="avatar-input" name="avatar" class="hidden"
                            onchange="previewAvatar(this)">
                        <button type="button" onclick="openFileInput()"
                            class="text-primary font-thin hover:text-opacity-70 cursor-pointer">
                            Change Photo
                        </button>
                    </div>
                </div>

                <div class="lg:flex justify-between">
                    <label for="username" class="text-lg mr-5 my-auto">Username</label>
                    <div class="flex flex-col lg:w-10/12 w-full">
                        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                            class="w-full p-2 border-2 border-primary rounded-lg">
                        @error('username')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>

                </div>
                <div class="lg:flex justify-between">
                    <label for="name" class="text-lg mr-5 my-auto">Full Name</label>
                    <div class="flex flex-col lg:w-10/12 w-full">
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="w-full p-2 border-2 border-primary rounded-lg">
                        @error('name')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="lg:flex justify-between">
                    <label for="bio" class="text-lg mr-5 my-auto">Bio </label>
                    <div class="flex flex-col lg:w-10/12 w-full">

                        <textarea name="bio" id="bio" cols="30" rows="6"
                            class="w-full p-2 border-2 border-primary rounded-lg">{{ $user->bio }}</textarea>
                        @error('bio')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>

                </div>
                <div class="lg:flex justify-between">
                    <label for="email" class="text-lg mr-5 my-auto">Email</label>
                    <input type="email" value="{{ $user->email }}" disabled
                        class="lg:w-10/12 w-full text-neutral-400 p-2 border-2 rounded-lg">
                </div>
                <div class="lg:flex justify-between">
                    <label for="gender" class="text-lg mr-5 my-auto">Gender</label>
                    <div class="flex flex-col lg:w-10/12 w-full border-2 rounded-md border-primary">
                        <select name="gender" class="text-primary p-2 rounded-md">
                            <option value="male" @selected($user->gender == 'male')>Male</option>
                            <option value="female" @selected($user->gender == 'female')>Female</option>
                            <option value="undefined" @selected($user->gender == 'undefined')>Undefined</option>
                        </select>
                        <label class="text-red-600"></label>
                    </div>
                </div>
                <div class="lg:flex lg:gap-[2.15rem]">
                    <label for="dob" class="text-lg mr-5 my-auto">Date Of Birth</label>
                    <div class="flex flex-col gap-y-2">
                        <input type="date"
                            class=" text-primary border-2 border-primary rounded-md p-2 lg:w-fit w-max" name="dob"
                            value="{{ $user->dob }}">
                        @error('dob')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="bg-green-700 rounded-md px-5 w-fit py-2 text-white mt-2">Save</button>
            </form>
        </div>
        {{-- menu --}}
        <div class="hidden lg:block">
            @include('users.template')
        </div>

    </div>
@endsection
@section('script')
    <script>
        function previewAvatar(input) {
            const preview = document.getElementById('avatar-preview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset('images/user.jpg') }}"; // Default image if no file selected
            }
        }

        function openFileInput() {
            document.getElementById('avatar-input').click();
        }
    </script>
@endsection
