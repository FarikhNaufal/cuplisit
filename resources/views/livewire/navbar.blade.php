<div>
    <header class="w-full items-center bg-white p-2 md:px-10 flex">
        <div x-data="{ isOpen: false }" class="relative flex justify-start lg:hidden">
            <button @click="isOpen = !isOpen" class="relative z-10 scale-50 overflow-hidden my-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                    <path
                        d="M7.75 15.5H54.25V20.6667H7.75V15.5ZM7.75 28.4167H54.25V33.5833H7.75V28.4167ZM7.75 41.3333H54.25V46.5H7.75V41.3333Z"
                        fill="black" />
                </svg>
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed cursor-default"></button>
            <div x-cloak x-show="isOpen" class="absolute bg-white mt-20 w-auto border shadow-md rounded-md">
                <div class="mx-3 my-4">
                    <div class="flex justify-center">
                        <h1 class="text-xl text-secondry">CUPLIST<span class="text-primary">.IT</span></h1>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="/" class="text-lg ">Following</a>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="" class="text-lg ">Explore</a>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="/setting" class="text-lg ">Setting</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mr-3 lg:hidden" x-data="{ isOpen: false }">
            <button @click="isOpen = true"
                class="bg-primary w-full hover:bg-opacity-80 rounded-lg px-4 py-1 text-white">
                <h1 class="text-xl">+Post</h1>
            </button>
            <div x-cloak x-show="isOpen" class="">
                <div x-show="isOpen"
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-50"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-100">
                    <div class="bg-white p-6 rounded-lg" x-transition:enter="transition ease-out duration-300">
                        <h2 class="text-2xl font-semibold mb-4">Uploud Post</h2>
                        @include('templates.partials.postForm')
                        <div class="mt-4">
                            <button @click="isOpen = false"
                                class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ isOpen: false, search: '' }" @click.away="isOpen = false" class="ms-auto w-max md:w-64 me-3 md:me-5">
            <input type="text" wire:model="search" x-model="search" wire:keydown="autocomplete"
                x-on:keydown="isOpen = true" x-on:input="isOpen = search.length > 0"
                class="border-2 border-primary rounded-xl w-max md:w-64 px-2 py-1" placeholder="Search users">

            <div x-cloak x-show="isOpen"
                class="absolute w-fit md:w-64 mt-2 px-2 lg:px-4 py-2 bg-white border rounded-xl shadow-lg">
                @if (count($usersearch) > 0)
                    <ul>
                        @foreach ($usersearch as $user)
                            <a href="{{route('users.show', $user->username)}}">
                                <li class="p-2 hover:bg-gray-200 flex gap-2 items-center rounded-lg line-clamp-1">
                                    <img src="{{$user->avatar ? asset('users/'.$user->id.'/'.$user->avatar) : asset('images/user.jpg')}}" alt="profile" class="w-8 h-8 aspect-square object-cover rounded-full border-primary border-2">
                                    {{ $user->username }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                @else
                    <p class="text-neutral-500">No matching users</p>
                @endif
            </div>
        </div>

        <div x-data="{ isOpen: false }" class="me-0">
            <button @click="isOpen = !isOpen"
                class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-primary hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="{{Auth::user()->avatar ? asset('users/'.Auth::user()->id.'/'.Auth::user()->avatar) : asset('images/user.jpg')}}">
            </button>
            {{-- <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button> --}}
            <div x-cloak x-show="isOpen"
                class="absolute w-auto right-3 bg-white rounded-lg shadow-lg py-4 px-3 mt-3 md:mt-5">
                <a href="{{route('users.show', Auth::user()->username)}}">
                    <p class="text-gray-700 ">{{ Auth::user()->username }}</p>
                    <p class="text-gray-700 ">{{ Auth::user()->email }}</p></a>
                <div class="bg-gray-700 w-full h-[1px] my-2"></div>
                <a href="{{route('users.edit', Auth::user()->username)}}" class="block  account-link hover:text-primary">Edit Profile</a>
                <form action="{{ route('logout') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <button class="block  account-link hover:text-primary">Logout</button>
                </form>
            </div>
        </div>

    </header>

</div>
