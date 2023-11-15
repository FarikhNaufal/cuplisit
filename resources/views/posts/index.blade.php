@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-4 lg:grid-rows-2 h-auto lg:gap-6 gap-y-2">
        {{-- content --}}
        <div
            class="w-full h-[90vh] lg:col-span-3 lg:row-span-full p-7 md:p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
            @include('templates.partials.postForm')
            @foreach ($posts as $post)
                <hr class="bg-gray-200 h-[2px] rounded-sm w-full my-5">
                {{-- Isi Post --}}
                <div class="flex justify-between">
                    <div class="flex">
                        <img src="images/faiz.jpg" alt="profile" class="w-12 h-12 rounded-full border-primary border-2">
                        <div class="flex-col  ml-4">
                            <p class="my-auto text-xl">{{ $post->user->username }}</p>
                            <p class="mb-3 text-sm text-neutral-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
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
            @endforeach

        </div>

        {{-- AsideRight --}}
        <div class="w-full bg-white rounded-xl sm:hidden overflow-y-auto lg:flex">
            <div class="m-6 w-full">
                <p class="mb-4 text-lg">Following you</p>
                {{-- Isi --}}
                <div class="flex gap-9 mt-3">
                    <a href="" class="w-full">
                        <div class="flex gap-4 items-center">
                            <img src="images/faiz.jpg" alt="" class="border border-primary w-11 rounded-full">

                            <div class="flex flex-col">
                                <p class="text-md">Farikh Naufal</p>
                                <p class="text-xs">Alwayys You</p>
                            </div>
                        </div>
                    </a>
                    <button class="flex flex-col my-auto justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" class="self-center" width="21" height="21"
                            viewBox="0 0 21 21" fill="none">
                            <path
                                d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 19.1739C15.2905 19.1739 19.1739 15.2905 19.1739 10.5C19.1739 5.70952 15.2905 1.82608 10.5 1.82608C5.70954 1.82608 1.82608 5.70952 1.82608 10.5C1.83178 15.2882 5.71182 19.1682 10.4994 19.1739H10.5L10.5 19.1739ZM15.7317 11.413H5.26825V9.58697H15.7317V11.413ZM11.413 15.7317H9.58699V5.26825H11.413V15.7317Z"
                                fill="#176B87" />
                        </svg>
                        <p class="text-xs self-center">Follow</p>
                    </button>
                </div>

            </div>
        </div>


        {{-- AsideRightBottom --}}
        <div class="w-full bg-white rounded-xl sm:hidden overflow-y-auto lg:flex">
            <div class="m-6 w-full">
                <p class="mb-4 text-lg">People You Follow</p>
                {{-- Isi --}}
                <div class="flex gap-9 mt-3">
                    <a href="" class="w-full">
                        <div class="flex gap-4 items-center">
                            <img src="images/faiz.jpg" alt="" class="border border-primary w-11 rounded-full">

                            <div class="flex flex-col">
                                <p class="text-md">Farikh Naufal</p>
                                <p class="text-xs">Alwayys You</p>
                            </div>
                        </div>
                    </a>
                    <button class="flex flex-col my-auto justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" class="self-center" width="21" height="21"
                            viewBox="0 0 21 21" fill="none">
                            <path
                                d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 19.1739C15.2905 19.1739 19.1739 15.2905 19.1739 10.5C19.1739 5.70952 15.2905 1.82608 10.5 1.82608C5.70954 1.82608 1.82608 5.70952 1.82608 10.5C1.83178 15.2882 5.71182 19.1682 10.4994 19.1739H10.5L10.5 19.1739ZM15.7317 11.413H5.26825V9.58697H15.7317V11.413ZM11.413 15.7317H9.58699V5.26825H11.413V15.7317Z"
                                fill="#176B87" />
                        </svg>
                        <p class="text-xs self-center">Follow</p>
                    </button>
                </div>

            </div>

        </div>

    </div>
@endsection

