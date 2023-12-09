<div class="flex flex-wrap gap-2 lg:gap-12 my-auto">
    <div class="flex-col">
        <h1 class="text-sm line-clamp-1 lg:text-xl">{{ $user->name }}</h1>
        <p class="text-sm lg:text-xl">{{ '@' }}{{ $user->username }}</p>
        <small class="font-sans text-neutral-600 text-sm">{{ $user->bio ?? 'Tidak ada bio' }}</small>
        <div class="flex text-sm lg:text-lg gap-2 text-neutral-600">
            <div x-data="{ followingTab: false }">
                <button @click="followingTab = true">{{ $following->count() }} Following</button>
                <div x-cloak x-show="followingTab"
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-60"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-100">
                    <div class="bg-white rounded-lg w-80 lg:w-1/5 mx-4"
                        x-transition:enter="transition ease-out duration-300">
                        <div class="flex p-3">
                            <h3 class="text-lg mx-auto">Following's</h3>
                            <button @click="followingTab = false" type="button" class="text-xl">
                                <img src="{{asset('svg/close-btn.svg')}}" class="w-8 h-8">
                            </button>
                        </div>
                        <hr>
                        <div
                            class="p-5 overflow-y-scroll no-scrollbar {{ $following->count() < 4 ? 'h-fit' : 'h-54 mb-3' }}">
                            @foreach ($following as $flw)
                                <div class="flex mb-4 items-center">
                                    <a class="flex gap-3 items-center" href="{{ route('users.show', $flw->user->username) }}">
                                        <img src="{{ $flw->user->avatar ? asset('users/' . $flw->user->id . '/' . $flw->user->avatar) : asset('images/user.jpg') }}"
                                            alt="profile"
                                            class="w-8 h-8 aspect-square object-cover rounded-full border-primary border-2">
                                        <p class="text-base">{{ $flw->user->username }}</p>
                                    </a>
                                    @if (Auth::user() == $user)
                                        <button wire:click="unfollowButton({{ $flw->user->id }})"
                                            class="ms-auto me-0 py-1 px-2 text-sm rounded-lg bg-secondry hover:bg-opacity-75 text-white">Unfollow</button>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{ followerTab: false }">
                <button @click="followerTab = true">{{ $followers->count() }} Follower</button>
                <div x-cloak x-show="followerTab"
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-60"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-100">
                    <div class="bg-white rounded-lg w-80 lg:w-1/5 mx-4"
                        x-transition:enter="transition ease-out duration-300">
                        <div class="flex p-3">
                            <h3 class="text-lg mx-auto">Follower's</h3>
                            <button @click="followerTab = false" type="button" class="px-2 text-xl">
                                <img src="{{asset('svg/close-btn.svg')}}" class="w-8 h-8">
                            </button>
                        </div>
                        <hr>
                        <div
                            class="p-5 overflow-y-scroll no-scrollbar {{ $followers->count() < 4 ? 'h-fit' : 'h-54 mb-3' }}">

                            @foreach ($followers as $flwr)
                                <div class="flex mb-4 items-center">
                                    <a class="flex items-center gap-3"
                                        href="{{ route('users.show', $flwr->follower->username) }}">
                                        <img src="{{ $flwr->follower->avatar ? asset('users/' . $flwr->follower->id . '/' . $flwr->follower->avatar) : asset('images/user.jpg') }}"
                                            alt="profile"
                                            class="w-8 h-8 aspect-square object-cover rounded-full border-primary border-2">
                                        <p class="text-base">{{ $flwr->follower->username }}</p>
                                    </a>
                                    @if (Auth::user() == $user)
                                        <button wire:click="removeFollower({{ $flwr->follower->id }})"
                                            class="ms-auto me-0 py-1 px-2 text-sm rounded-lg bg-red-300 text-red-800">Remove</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user() == $user)
        <a href="{{ route('users.edit', $user->username) }}"
            class="rounded-md py-1 px-2 lg:px-4 h-fit bg-transparent border-2 border-primary text-primary hover:bg-opacity-75 text-xs lg:text-base">Edit
            Profile</a>
    @else
        <div class="flex items-start gap-2 lg:text-base text-[10px]">
            <button wire:click="followButton"
                class="rounded-md py-1 px-4 {{ $userHasFollowed ? 'bg-secondry' : 'bg-primary' }} hover:bg-opacity-75 text-white">{{ $userHasFollowed ? 'Unfollow' : 'Follow' }}</button>
        </div>
    @endif
</div>
