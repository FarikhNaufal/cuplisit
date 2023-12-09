@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-4 lg:grid-rows-2 h-auto lg:gap-6 gap-y-2">
        {{-- content --}}
        <div class="lg:col-span-3 lg:row-span-full w-full h-[90vh] overflow-scroll flex flex-col">
            <div class="bg-white rounded-lg w-full h-fit mb-6 flex flex-col">
                <div class="px-6 md:px-8 py-3 flex gap-3 items-center">
                    <img src="{{ Auth::user()->avatar ? asset('users/' . Auth::user()->id . '/' . Auth::user()->avatar) : asset('images/user.jpg') }}"
                        alt="profile" class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">
                    <h2 class="text-lg">Post something</h2>
                </div>
                <hr>
                <form action="{{ route('posts.store') }}" class="flex gap-3 px-6 md:px-8 py-4" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="relative hidden" id="media-parent">
                        <img id="media-preview" class="w-20 md:w-32 aspect-square object-cover rounded-lg hidden ">
                        <span id="delete-icon"
                            class="delete-icon absolute top-1 p-1 rounded-lg text-sm bg-red-500 bg-opacity-20 right-1 cursor-pointer hidden"
                            onclick="deleteMedia()">🗑️</span>
                    </div>
                    <div class="flex flex-col w-full gap-3">
                        <textarea name="caption" id="" cols="30" rows="3"
                            class="w-full bg-neutral-50 outline outline-1 focus:outline-2 outline-neutral-200 p-3 rounded-lg"
                            placeholder="What's on your mind ?"></textarea>
                        @error('caption')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                        @error('media')
                            <label class="text-red-600">{{ $message }}</label>
                        @enderror
                        <div class="flex gap-4 justify-end">
                            <input type="file" id="media-input" name="media" accept="image/*, video/*" class="hidden"
                                onchange="previewMedia(this)">
                            <button type="button" onclick="openPostInput()"
                                class="h-fit flex items-center text-neutral-400 gap-1 text-sm" id="add-media-btn">
                                Add media
                                <img src="{{ asset('svg/add-media.svg') }}" alt="" class="w-8 h-8">
                            </button>
                            <button type="submit"
                                class="px-5 py-2 text-sm bg-primary rounded-lg w-fit text-white hover:bg-opacity-80">Post</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="bg-white h-fit p-6 md:p-8 rounded-lg w-full">
                {{-- @include('templates.partials.postForm') --}}
                @foreach ($posts as $post)
                    {{-- Isi Post --}}
                    <div class="flex justify-between">
                        <a href="{{ route('users.show', $post->user->username) }}" class="flex">
                            <img src="{{ $post->user->avatar ? asset('users/' . $post->user->id . '/' . $post->user->avatar) : asset('images/user.jpg') }}"
                                alt="profile"
                                class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">
                            <div class="flex-col  ml-4">
                                <p class="my-auto text-xl">{{ $post->user->username }}</p>
                                <p class="mb-3 text-sm text-neutral-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                        <div class="mt-auto my-auto" x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 40 10"
                                    fill="none">
                                    <path
                                        d="M30 5C30 3.67392 30.5268 2.40215 31.4645 1.46447C32.4021 0.526785 33.6739 0 35 0C36.3261 0 37.5979 0.526785 38.5355 1.46447C39.4732 2.40215 40 3.67392 40 5C40 6.32608 39.4732 7.59785 38.5355 8.53553C37.5979 9.47322 36.3261 10 35 10C33.6739 10 32.4021 9.47322 31.4645 8.53553C30.5268 7.59785 30 6.32608 30 5ZM15 5C15 3.67392 15.5268 2.40215 16.4645 1.46447C17.4021 0.526785 18.6739 0 20 0C21.3261 0 22.5979 0.526785 23.5355 1.46447C24.4732 2.40215 25 3.67392 25 5C25 6.32608 24.4732 7.59785 23.5355 8.53553C22.5979 9.47322 21.3261 10 20 10C18.6739 10 17.4021 9.47322 16.4645 8.53553C15.5268 7.59785 15 6.32608 15 5ZM0 5C0 3.67392 0.526784 2.40215 1.46447 1.46447C2.40215 0.526785 3.67392 0 5 0C6.32608 0 7.59785 0.526785 8.53553 1.46447C9.47322 2.40215 10 3.67392 10 5C10 6.32608 9.47322 7.59785 8.53553 8.53553C7.59785 9.47322 6.32608 10 5 10C3.67392 10 2.40215 9.47322 1.46447 8.53553C0.526784 7.59785 0 6.32608 0 5Z"
                                        fill="black" />
                                </svg>
                            </button>
                            <div x-cloak x-show="isOpen"
                                class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-50"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-100">
                                <div class="bg-white p-8 rounded-lg lg:w-1/2 w-2/3"
                                    x-transition:enter="transition ease-out duration-300">
                                    <h2 class="text-2xl font-semibold mb-4">Setting Postingan</h2>
                                    <div class="flex gap-4">
                                        <a href=""
                                            class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">Report
                                            this post</a>
                                        <button @click="isOpen = false"
                                            class="bg-primary hover:bg-opacity-75 text-white font-light py-2 px-4 rounded">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 mb-1">
                        <p>{{ $post->caption }}</p>
                    </div>
                    @if ($post->media)
                        @php
                            $videoExtensions = ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm'];
                            $extension = pathinfo($post->media, PATHINFO_EXTENSION);
                        @endphp

                        @if (in_array($extension, $videoExtensions))
                            <video controls class="rounded-xl  object-cover lg:w-full transition">
                                <source src="{{ asset('users/' . $post->user->id . '/posts/' . $post->media) }}"
                                    type="video/{{ $extension }}">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('users/' . $post->user->id . '/posts/' . $post->media) }}" onclick=""
                                class="rounded-xl aspect-square object-cover lg:w-1/2 transition" alt="post">
                        @endif
                    @endif

                    @livewire('post-content', ['post' => $post])
                    <hr class="bg-gray-200 h-[2px] rounded-sm w-full my-5">
                @endforeach
            </div>
        </div>

        @include('templates.partials.rightContents')


    </div>
@endsection
@section('script')
    <script>
        function previewMedia(input) {
            const preview = document.getElementById('media-preview');
            const parent = document.getElementById('media-parent');
            const addMediaBtn = document.getElementById('add-media-btn')
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.classList.remove('hidden');
                parent.classList.remove('hidden')
                document.getElementById('delete-icon').classList.remove(
                    'hidden');
                addMediaBtn.classList.add('hidden')
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
                parent.classList.add('hidden');
                document.getElementById('delete-icon').classList.add(
                    'hidden');
                addMediaBtn.classList.remove('hidden')
            }
        }

        function deleteMedia() {
            // Fungsi ini akan dijalankan ketika ikon hapus diklik
            document.getElementById('media-preview').src = ''; // Menghapus gambar
            document.getElementById('media-preview').classList.add('hidden'); // Menyembunyikan gambar
            document.getElementById('delete-icon').classList.add('hidden'); // Menyembunyikan ikon hapus
            document.getElementById('media-parent').classList.add('hidden');
            document.getElementById('add-media-btn').classList.remove('hidden');
            document.getElementById('media-input').value = ''; // Mengosongkan nilai input file
        }

        function openPostInput() {
            document.getElementById('media-input').click();
        }
    </script>
@endsection
