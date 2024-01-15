@extends('templates.client')

@section('content')
    <div class="w-full h-[90vh] p-7 md:p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
        <div class="flex  lg:justify-stretch gap-4 lg:gap-9">
            <img src="{{ $user->avatar ? asset("users/$user->id/$user->avatar") : asset('images/user.jpg') }}" alt="profile"
                class="rounded-full lg:w-40 lg:h-40 h-20 aspect-square object-cover">
            @livewire('profile', ['user' => $user])


        </div>

        <div x-data="{ activeTab: 1 }">
            <div class="my-6">
                <div class="bg-gray-300 w-full h-[1px]"></div>
                <div class="grid grid-cols-2 justify-items-center my-3 lg:my-5">
                    <button @click="activeTab = 1" :class="{ ' border-b-2 border-neutral-600': activeTab === 1 }"
                        class="w-1/2">Post</button>
                    <button @click="activeTab = 2" :class="{ 'border-b-2 border-neutral-600': activeTab === 2 }"
                        class="w-1/2">Liked</button>
                </div>
                <div class="bg-gray-300 w-full h-[1px]"></div>
            </div>
            {{-- Postingan --}}
            <div x-show="activeTab === 1" x-cloak>
                @if ($user->posts->isEmpty())
                    <div class="flex flex-col gap-3 justify-center items-center h-[15rem] lg:h-[20rem]">
                        <img src="{{ asset('svg/nopost.svg') }}" class="w-20 lg:w-28" alt="">
                        <h2 class="text-lg lg:text-xl text-neutral-500">
                            No posts yet.
                        </h2>
                    </div>
                @else
                    @foreach ($user->posts->sortByDesc('created_at') as $post)
                        {{-- Isi Post --}}
                        <div class="flex justify-between">
                            <div class="flex">
                                <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                                    alt="profile"
                                    class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">
                                <div class="flex-col ml-4">
                                    <p class="my-auto text-lg">{{ $user->username }}</p>
                                    <p class="mb-3 text-sm text-neutral-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="mt-auto my-auto" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10"
                                        viewBox="0 0 40 10" fill="none">
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
                                            @if ($post->user_id == auth()->id())
                                                <form action="{{ route('posts.destroy', $post) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">Delete
                                                        this post</button>
                                                </form>
                                            @else
                                                <form action="{{ route('posts.report', $post) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <button
                                                        class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">Report
                                                        this post</button>
                                                </form>
                                            @endif
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
                                <img src="{{ asset('users/' . $post->user->id . '/posts/' . $post->media) }}"
                                    onclick="" class="rounded-xl aspect-square object-cover lg:w-1/2 transition"
                                    alt="post">
                            @endif
                        @endif

                        @livewire('post-content', ['post' => $post])
                        <hr class="bg-gray-200 h-[1px] rounded-sm w-full my-5">
                    @endforeach
                @endif

            </div>
            {{-- Liked --}}
            <div x-show="activeTab === 2" x-cloak>
                @if ($user->likes->isEmpty())
                    <div class="flex flex-col gap-3 justify-center items-center h-[15rem] lg:h-[20rem]">
                        <img src="{{ asset('svg/nolikes.svg') }}" class="w-20 lg:w-28" alt="">
                        <h2 class="text-lg lg:text-xl text-neutral-500">
                            {{ $user->username }} hasn't liked any posts yet
                        </h2>
                    </div>
                @else
                    @foreach ($user->likes->sortByDesc('created_at') as $liked)
                        <div class="">
                            <div class="flex">
                                <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
                                    alt="profile"
                                    class="w-12 h-12 aspect-square object-cover rounded-full border-primary border-2">
                                <div class="flex-col ml-4">
                                    <div class="flex gap-3 items-center">
                                        <p class="my-auto text-lg">{{ $user->username }}</p>
                                        <p class="text-sm text-neutral-500">{{ $liked->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="text-sm text-neutral-600">Liked
                                        <a href="{{ route('users.show', $liked->post->user->username) }}"
                                            class="text-primary">{{ '@' }}{{ $liked->post->user->username }}</a>
                                        posts

                                    </p>

                                    <div class="px-3 py-2 border-2 border-neutral-200 rounded-lg w-full lg:w-80 mt-2">
                                        <div class="flex justify-between">
                                            <div class="flex">
                                                <img src="{{ $liked->post->user->avatar ? asset('users/' . $liked->post->user->id . '/' . $liked->post->user->avatar) : asset('images/user.jpg') }}"
                                                    alt="profile"
                                                    class="w-8 h-8 aspect-square object-cover rounded-full border-primary border-2">
                                                <div class="flex-col ml-2">
                                                    <div class="flex gap-2 items-center">
                                                        <p class="my-auto text-sm">{{ $liked->post->user->username }}</p>
                                                        <p class=" text-xs text-neutral-500">
                                                            {{ $liked->post->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <p class="text-sm mb-2 text-neutral-700">{{ $liked->post->caption }}
                                                    </p>

                                                    @if ($liked->post->media)
                                                        @php
                                                            $videoExtensions = ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm'];
                                                            $extension = pathinfo($liked->post->media, PATHINFO_EXTENSION);
                                                        @endphp

                                                        @if (in_array($extension, $videoExtensions))
                                                            <video controls
                                                                class="rounded-xl  object-cover lg:w-full transition">
                                                                <source
                                                                    src="{{ asset('users/' . $liked->post->user->id . '/posts/' . $liked->post->media) }}"
                                                                    type="video/{{ $extension }}">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <img src="{{ asset('users/' . $liked->post->user->id . '/posts/' . $liked->post->media) }}"
                                                                onclick=""
                                                                class="rounded-xl aspect-square object-cover w-64 transition"
                                                                alt="post">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <hr class="bg-gray-200 h-[1px] rounded-sm w-full my-5">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
