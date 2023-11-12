@extends('templates.client')

@section('content')
    <div class="grid lg:grid-cols-4 lg:grid-rows-2 h-auto lg:gap-6 gap-y-2">
        {{-- content --}}
        <div
            class="w-full h-[90vh] lg:col-span-3 lg:row-span-full p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
            @include('templates.partials.postForm')
            @foreach ($posts as $post)
                <hr class="bg-gray-200 h-[2px] rounded-sm w-full my-5">
                {{-- Isi Post --}}
                <div class="flex justify-between">
                    <div class="flex">
                        <img src="images/faiz.jpg" alt="profile" class="w-12 h-12 rounded-full border-primary border-2">
                        <p class="my-auto ml-4 text-xl">{{ $post->user->username }}</p>
                    </div>
                    <div class="mt-auto mx-8 my-auto" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 40 10"
                                fill="none">
                                <path
                                    d="M30 5C30 3.67392 30.5268 2.40215 31.4645 1.46447C32.4021 0.526785 33.6739 0 35 0C36.3261 0 37.5979 0.526785 38.5355 1.46447C39.4732 2.40215 40 3.67392 40 5C40 6.32608 39.4732 7.59785 38.5355 8.53553C37.5979 9.47322 36.3261 10 35 10C33.6739 10 32.4021 9.47322 31.4645 8.53553C30.5268 7.59785 30 6.32608 30 5ZM15 5C15 3.67392 15.5268 2.40215 16.4645 1.46447C17.4021 0.526785 18.6739 0 20 0C21.3261 0 22.5979 0.526785 23.5355 1.46447C24.4732 2.40215 25 3.67392 25 5C25 6.32608 24.4732 7.59785 23.5355 8.53553C22.5979 9.47322 21.3261 10 20 10C18.6739 10 17.4021 9.47322 16.4645 8.53553C15.5268 7.59785 15 6.32608 15 5ZM0 5C0 3.67392 0.526784 2.40215 1.46447 1.46447C2.40215 0.526785 3.67392 0 5 0C6.32608 0 7.59785 0.526785 8.53553 1.46447C9.47322 2.40215 10 3.67392 10 5C10 6.32608 9.47322 7.59785 8.53553 8.53553C7.59785 9.47322 6.32608 10 5 10C3.67392 10 2.40215 9.47322 1.46447 8.53553C0.526784 7.59785 0 6.32608 0 5Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div x-show="isOpen" class="">
                            <div x-show="isOpen"
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
                </div>
                <div class="w-full mt-3">
                    <p>{{ $post->caption }}</p>
                </div>
                @if ($post->media)
                    @php
                        $videoExtensions = ['mp4', 'mkv'];
                        $extension = pathinfo($post->media, PATHINFO_EXTENSION);
                    @endphp

                    @if (in_array($extension, $videoExtensions))
                        <video controls class="rounded-xl aspect-square object-cover lg:w-1/2 transition">
                            <source src="{{ asset('users/' . $post->user->id . '/posts/' . $post->media) }}"
                                type="video/{{ $extension }}">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset('users/' . $post->user->id . '/posts/' . $post->media) }}" onclick=""
                            class="rounded-xl aspect-square object-cover lg:w-1/2 transition" alt="post">
                    @endif
                @endif

                <p class="mb-3 text-sm text-neutral-500">{{ $post->created_at->diffForHumans() }}</p>
                <div x-data="{ showComments: false }">
                    <div class="flex gap-2">
                        <div x-data="{ count: 0 }">
                            <button @click="count++" class="bg-blue-500 rounded-lg text-white px-4 py-2">
                                Like <span x-text="count"></span>
                            </button>
                        </div>
                        <div x-data="{ count: 0 }">
                            <button @click="count++" class="bg-red-500 rounded-lg text-white px-4 py-2">
                                Dislike <span x-text="count"></span>
                            </button>
                        </div>
                        <button @click="showComments = !showComments" class="bg-green-500 rounded-lg text-white px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 32"
                                fill="none">
                                <path
                                    d="M18 0C8.1 0 0 6.36444 0 14.2222C0.09 18.0444 1.908 21.6356 4.95 24C4.95 25.0667 4.194 27.8578 0 32C4.266 31.8044 8.352 30.2222 11.646 27.5556C13.698 28.1422 15.858 28.4444 18 28.4444C27.9 28.4444 36 22.08 36 14.2222C36 6.36444 27.9 0 18 0ZM18 24.8889C10.044 24.8889 3.6 20.1067 3.6 14.2222C3.6 8.33778 10.044 3.55556 18 3.55556C25.956 3.55556 32.4 8.33778 32.4 14.2222C32.4 20.1067 25.956 24.8889 18 24.8889Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="showComments" class="mt-4">
                        <ul>
                            @foreach ($post->comments as $comment)
                                <li class="flex gap-2 mb-2">
                                    <img src="images/faiz.jpg" alt="profile"
                                        class="w-8 h-8 rounded-full border-primary border-2">
                                    <div class="flex flex-col">
                                        <div class="flex gap-2">
                                            <p>
                                                {{$comment->user->username}}
                                            </p>

                                            <p class="text-neutral-500 text-sm">
                                                {{$comment->created_at->diffForHumans()}}
                                            </p>
                                        </div>
                                        <p class="">
                                            <span class="font-sans font-normal">{{$comment->content}}</span>
                                        </p>
                                    </div>

                                </li>
                            @endforeach

                            <li class="flex gap-2 mb-2">
                                <img src="images/faiz.jpg" alt="profile"
                                    class="w-8 h-8 rounded-full border-primary border-2">
                                <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data"
                                    class="flex w-full gap-2">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="text" name="content" id=""
                                        class="w-full border-primary border-2 rounded-lg p-2"
                                        placeholder="Write your coment">
                                    <button type="submit" class="bg-primary px-4 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 100 100" fill="none">
                                            <path
                                                d="M49.9999 0.833252C56.4566 0.833252 62.85 2.10499 68.8152 4.57584C74.7804 7.0467 80.2005 10.6683 84.766 15.2338C89.3316 19.7994 92.9531 25.2195 95.424 31.1847C97.8949 37.1498 99.1666 43.5433 99.1666 49.9999C99.1666 63.0397 93.9865 75.5455 84.766 84.766C75.5455 93.9865 63.0397 99.1666 49.9999 99.1666C43.5433 99.1666 37.1498 97.8949 31.1847 95.424C25.2195 92.9531 19.7994 89.3316 15.2338 84.766C6.0133 75.5455 0.833252 63.0397 0.833252 49.9999C0.833252 36.9601 6.0133 24.4544 15.2338 15.2338C24.4544 6.0133 36.9601 0.833252 49.9999 0.833252ZM30.3333 28.9074V45.3291L65.4383 49.9999L30.3333 54.6708V71.0924L79.4999 49.9999L30.3333 28.9074Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
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
