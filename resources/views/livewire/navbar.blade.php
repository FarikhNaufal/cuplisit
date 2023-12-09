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
                        <a href="/explore" class="text-lg ">Explore</a>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="{{ route('users.edit', Auth::user()->username) }}" class="text-lg ">Setting</a>
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
                    <div class="bg-white p-6 rounded-lg w-full mx-5" x-transition:enter="transition ease-out duration-300">
                        <div class="py-3 flex gap-3 items-center">
                            <img src="{{ Auth::user()->avatar ? asset('users/' . Auth::user()->id . '/' . Auth::user()->avatar) : asset('images/user.jpg') }}"
                                alt="profile"
                                class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">
                            <h2 class="text-lg">Post something</h2>
                        </div>
                        <hr class="mb-4">
                        <form action="{{ route('posts.store') }}" class="flex gap-3" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="relative hidden" id="media-parent2">
                                <img id="media-preview2"
                                    class="w-20 md:w-32 aspect-square object-cover rounded-lg hidden ">
                                <span id="delete-icon2"
                                    class="delete-icon2 absolute top-1 p-1 rounded-lg text-sm bg-red-500 bg-opacity-20 right-1 cursor-pointer hidden"
                                    onclick="deleteMediay()">🗑️</span>
                            </div>
                            <div class="flex flex-col w-full gap-3">
                                <textarea name="caption" cols="30" rows="3"
                                    class="w-full bg-neutral-50 outline outline-1 focus:outline-2 outline-neutral-200 p-3 rounded-lg"
                                    placeholder="What's on your mind ?"></textarea>
                                @error('caption')
                                    <label class="text-red-600">{{ $message }}</label>
                                @enderror
                                @error('media')
                                    <label class="text-red-600">{{ $message }}</label>
                                @enderror
                                <div class="flex gap-4 justify-end">
                                    <input type="file" id="media-input2" accept="image/*, video/*" name="media" class="hidden"
                                        onchange="previewMediay(this)">
                                    <button type="button" onclick="openPostInputy()"
                                        class="h-fit flex items-center text-neutral-400 gap-1 text-sm"
                                        id="add-media-btn2">
                                        Add media
                                        <img src="{{ asset('svg/add-media.svg') }}" alt="" class="w-8 h-8">
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-2 text-sm bg-primary rounded-lg w-fit text-white hover:bg-opacity-80">Post</button>
                                </div>
                            </div>

                        </form>
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
                            <a href="{{ route('users.show', $user->username) }}">
                                <li class="p-2 hover:bg-gray-200 flex gap-2 items-center rounded-lg line-clamp-1">
                                    <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                                        alt="profile"
                                        class="w-8 h-8 aspect-square object-cover rounded-full border-primary border-2">
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
                class="z-10 w-12 h-12 rounded-full object-cover aspect-square overflow-hidden border-4 border-primary hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img
                    src="{{ Auth::user()->avatar ? asset('users/' . Auth::user()->id . '/' . Auth::user()->avatar) : asset('images/user.jpg') }}">
            </button>
            {{-- <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button> --}}
            <div x-cloak x-show="isOpen"
                class="absolute w-auto right-3 bg-white rounded-lg shadow-lg py-4 px-3 mt-3 md:mt-5">
                <a href="{{ route('users.show', Auth::user()->username) }}">
                    <p class="text-gray-700 ">{{ Auth::user()->username }}</p>
                    <p class="text-gray-700 ">{{ Auth::user()->email }}</p>
                </a>
                <div class="bg-gray-700 w-full h-[1px] my-2"></div>
                <a href="{{ route('users.edit', Auth::user()->username) }}"
                    class="block  account-link hover:text-primary">Edit Profile</a>
                <div x-data="{ isCPOpen: false }">
                    <button @click="isCPOpen = true" class="w-fit text-base hover:text-primary">Change
                        Password</button>
                    <div x-cloak x-show="isCPOpen"
                        class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-60"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-100">
                        <div class="bg-white p-8 rounded-lg lg:w-1/3 mx-4"
                            x-transition:enter="transition ease-out duration-300">
                            @livewire('change-password', ['user' => Auth::user()])
                        </div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <button class="block  account-link hover:text-primary">Logout</button>
                </form>
            </div>
        </div>


    </header>

</div>
<script>
    function previewMediay(input) {
        const preview = document.getElementById('media-preview2');
        const parent = document.getElementById('media-parent2');
        const addMediaBtn = document.getElementById('add-media-btn2')
        const file = input.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            parent.classList.remove('hidden')
            document.getElementById('delete-icon2').classList.remove(
                'hidden');
            addMediaBtn.classList.add('hidden')
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
            parent.classList.add('hidden');
            document.getElementById('delete-icon2').classList.add(
                'hidden');
            addMediaBtn.classList.remove('hidden')
        }
    }

    function deleteMediay() {
        // Fungsi ini akan dijalankan ketika ikon hapus diklik
        document.getElementById('media-preview2').src = ''; // Menghapus gambar
        document.getElementById('media-preview2').classList.add('hidden'); // Menyembunyikan gambar
        document.getElementById('delete-icon2').classList.add('hidden'); // Menyembunyikan ikon hapus
        document.getElementById('media-parent2').classList.add('hidden');
        document.getElementById('add-media-btn2').classList.remove('hidden');
        document.getElementById('media-input2').value = ''; // Mengosongkan nilai input file
    }

    function openPostInputy() {
        document.getElementById('media-input2').click();
    }
</script>
