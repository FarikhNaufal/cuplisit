<div class="w-full bg-white rounded-xl  sm:hidden lg:flex">
    <div class="m-6 w-full">
        <p class="mb-4 text-lg">Recommended for you</p>
        <div class="flex flex-col gap-4 mt-3 h-72 overflow-y-scroll no-scrollbar">
            @foreach ($recommendationUsers as $user)
                <div class="flex items-center">
                    <a href="{{ route('users.show', $user->username) }}" class="w-full">
                        <div class="flex gap-4 items-center">
                            <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                                alt="profile"
                                class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">

                            <div class="flex flex-col">
                                <p class="text-md">{{ $user->username }}</p>
                                <p class="text-xs">{{ $user->bio }}</p>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach


        </div>

    </div>
</div>


{{-- AsideRightBottom --}}
<div class="w-full bg-white rounded-xl sm:hidden overflow-y-auto lg:flex">
    <div class="m-6 w-full">
        <p class="mb-4 text-lg">People you follow</p>
        {{-- Isi --}}
        <div class="flex flex-col gap-4 mt-3">
            @foreach ($followedUsers as $user)
                <a href="{{route('users.show', $user->username)}}" class="w-full">
                    <div class="flex gap-4 items-center">
                        <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                            alt="profile"
                            class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">

                        <div class="flex flex-col">
                            <p class="text-md">{{ $user->username }}</p>
                            <p class="text-xs">{{ $user->bio }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

</div>
